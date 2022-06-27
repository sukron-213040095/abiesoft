<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Lanjut;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Cookies;
use AbieSoft\Utilities\Hash;
use AbieSoft\Utilities\Input;
use Firebase\JWT\JWT;
use Google_Client;
use Google_Service_Oauth2;

class GoogleLoginController extends AuthController
{

    public function registrasiByGoogle()
    {

        $payload = [
            'registrasi_google' => true
        ];
        $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
        Cookies::simpan('ABIESOFT-REGISTRASI', $jwt);

        $client = new Google_Client();
        $client->setClientId(\AbieSoft\Utilities\Config::envReader('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(\AbieSoft\Utilities\Config::envReader('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(\AbieSoft\Utilities\Config::envReader('GOOGLE_REDIRECT_URL'));
        $client->addScope('email');
        $client->addScope('profile');

        Lanjut::ke($client->createAuthUrl());
    }

    public function login()
    {
        $client = new Google_Client();
        $client->setClientId(\AbieSoft\Utilities\Config::envReader('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(\AbieSoft\Utilities\Config::envReader('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(\AbieSoft\Utilities\Config::envReader('GOOGLE_REDIRECT_URL'));
        $client->addScope('email');
        $client->addScope('profile');
        if (Input::get('code')) {
            $token = $client->fetchAccessTokenWithAuthCode(Input::get('code'));
            $client->setAccessToken($token['access_token']);
            $google_auth = new Google_Service_Oauth2($client);
            $google_account_info = $google_auth->userinfo->get();
            $email = $google_account_info['email'];
            $nama = $google_account_info['given_name'];
            $photo = $google_account_info['picture'];
            $salt = 'ibC&';
            $pass = '12345';
            $user = parent::cariuser($email);
            $password = Hash::make($pass, $salt);

            if (Cookies::ada('ABIESOFT-REGISTRASI')) {
                Lanjut::ke('/registrasi?nama=' . $nama . '&email=' . $email);
            } else {
                if ($user) {
                    return self::setLoginByGoogle($user->email, $user->password);
                } else {
                    DB::terhubung()->input('users', array(
                        'email' => $email,
                        'grupid' => '2',
                        'nama' => $nama,
                        'photo' => $photo,
                        'password' => $password,
                        'salt' => $salt,
                    ));
                    return self::setLoginByGoogle($email, $password);
                }
            }
        }
    }

    public function registrasi()
    {
    }

    public static function setLoginByGoogle($email, $pass)
    {
        $user = self::cariuser($email);
        if ($user) {
            if ($user->password == $pass) {
                $sessionid = substr(sha1(rand(1000, 9999) . date('YmdHis')), 5, 9);
                DB::terhubung()->perbarui('users', $user->id, array(
                    'sessionid' => $sessionid,
                    'diupdate' => date('Y-m-d H:i:s')
                ));
                $payload = [
                    'email' => $email,
                    'sessionid' => $sessionid,
                    'lockscreen' => 'off'
                ];
                $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                Cookies::simpan('ABIESOFT-SCT', $jwt);
                Lanjut::ke(Config::envReader('BASEURL'));
            } else {
                echo "Token Expire";
            }
        } else {
            echo "Token Expire";
        }
    }
}
