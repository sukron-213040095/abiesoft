<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Http\Lanjut;
use Nette\Utils\Html;

class ProfileController extends Controller
{

    public function detail()
    {
        if (AuthController::isLogin()) {

            $nama = AuthController::getNama();
            $email = AuthController::getEmail();

            return $this->view(
                page: "profile/detail",
                data: [
                    'title' => 'Profile',
                    'authButton' => \App\Controllers\TemplateController::authButton(),
                    'nama' => $nama,
                    'email' => $email
                ]
            );
        } else {
            Lanjut::ke('/');
        }
    }
}
