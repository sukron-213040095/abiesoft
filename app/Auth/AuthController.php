<?php

namespace AbieSoft\Auth;

use AbieSoft\Http\Controller;
use AbieSoft\Http\Lanjut;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Input;
use AbieSoft\Utilities\Cookies;
use AbieSoft\Utilities\Guard;
use AbieSoft\Utilities\Hash;
use AbieSoft\Utilities\Metafile;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{

    private static bool $_sessionLogin = false;
    protected static string | bool
        $_id = "-",
        $_nama = "-",
        $_tgllahir = "-",
        $_jeniskelamin = "-",
        $_photo = "-",
        $_cover = "-",
        $_email = "-",
        $_nohp = "-",
        $_pertanyaan = "-",
        $_grupid = "-",
        $_salt = "-",
        $_password = "-",
        $_logout = false;

    protected static function cariuser(string $email = null)
    {
        if ($email) {
            $data = DB::terhubung()->tampilkan('users', array('email', '=', $email));
            if ($data->hitung()) {
                return $data->awal();
            }
        }
        return false;
    }

    public function wellcome()
    {
        if (\AbieSoft\Utilities\Define::$showoffWellcome) {
            return $this->view(
                page: '../theme/auth/wellcome',
                data: [
                    'title' => 'Wellcome'
                ]
            );
        } else {
            Lanjut::ke("/login");
        }
    }

    public function syaratketentuan()
    {
        return $this->view(
            page: '../theme/auth/syaratketentuan',
            data: [
                'title' => 'Syarat dan Ketentuan'
            ]
        );
    }

    public function login()
    {
        if (self::isLogin()) {
            Lanjut::ke('/');
        } else {
            if (Cookies::ada('ABIESOFT-SCT')) {
                $jwt = Cookies::lihat('ABIESOFT-SCT');
                try {
                    $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                    $lockscreen = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->lockscreen;
                    if ($lockscreen == "on") {
                        $user = self::cariuser($email);
                        if ($user) {
                            if ($user->photo != null) {
                                if (file_exists(__DIR__ . "/../../public" . $user->photo)) {
                                    $pp = Config::envReader('BASEURL') . $user->photo;
                                } else {
                                    $pp = Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                                }
                            } else {
                                $pp = Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                            }
                            return $this->view(
                                page: '../theme/auth/lockscreen',
                                data: [
                                    'title' => 'Lockscreen',
                                    'nama' => $user->nama,
                                    'email' => $user->email,
                                    'photo' => $pp
                                ]
                            );
                        }
                        Cookies::hapus('ABIESOFT-SCT');
                        $message = "Silahkan login akun anda.";
                        return $this->view(
                            page: '../theme/auth/login',
                            data: [
                                'title' => 'Login',
                                'reset' => $message
                            ]
                        );
                    } else {
                        Cookies::hapus('ABIESOFT-SCT');
                        $message = "Silahkan login akun anda.";
                        return $this->view(
                            page: '../theme/auth/login',
                            data: [
                                'title' => 'Login',
                                'reset' => $message
                            ]
                        );
                    }
                } catch (Exception $e) {
                    Cookies::hapus('ABIESOFT-SCT');
                    $message = "Silahkan login akun anda.";
                    return $this->view(
                        page: '../theme/auth/login',
                        data: [
                            'title' => 'Login',
                            'reset' => $message
                        ]
                    );
                }
            } else {
                $reset = false;
                if (Cookies::ada('RESET')) {
                    $jwt = Cookies::lihat('RESET');
                    $reset = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->reset;
                }
                if ($reset == true) {
                    $message = "Silahkan login dengan password baru.";
                } else {
                    $message = "Silahkan login akun anda.";
                }
                Cookies::hapus('RESET');
                return $this->view(
                    page: '../theme/auth/login',
                    data: [
                        'title' => 'Login',
                        'reset' => $message
                    ]
                );
            }
        }
    }

    public function setLogin()
    {
        $lockscreen = Input::get('lockscreen');
        $email = Input::get('email');
        $password = Input::get('password');
        $token = Input::get('__token');
        if ($email == "lockscreen") {
            if (Cookies::ada('ABIESOFT-SCT')) {
                $jwt = Cookies::lihat('ABIESOFT-SCT');
                try {
                    $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                } catch (Exception $e) {
                    Lanjut::ke('/remove#removeLockscreen');
                }
            }
        } else {
            $email = $email;
        }
        $user = self::cariuser($email);
        if ($user) {
            if ($user->email === $email) {
                if (Guard::FormChecker($token)) {
                    if (Hash::make($password, $user->salt) == $user->password) {
                        $sessionid = substr(sha1(rand(1000, 9999) . date('YmdHis')), 5, 9);
                        DB::terhubung()->perbarui('users', $user->id, array(
                            'sessionid' => $sessionid,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        if ($lockscreen == "on") {
                            $statuslockscreen = "on";
                        } else {
                            $statuslockscreen = "off";
                        }
                        $payload = [
                            'email' => $email,
                            'sessionid' => $sessionid,
                            'lockscreen' => $statuslockscreen
                        ];
                        $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                        Cookies::simpan('ABIESOFT-SCT', $jwt);
                        echo "Berhasil";
                    } else {
                        if ($user->pertanyaan != null) {
                            $sha1date = sha1(date('YmdHis'));
                            $kode = substr($sha1date, 5, 9);
                            DB::terhubung()->perbarui('users', $user->id, array(
                                'recovery' => $kode,
                                'diupdate' => date('Y-m-d H:i:s')
                            ));
                            $koderecovery = self::cariuser($user->email);
                            $payload = [
                                'email' => $user->email,
                                'kode_recovery' => $koderecovery->recovery
                            ];
                            $rid = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                            echo $rid;
                        } else {
                            echo "Cancel";
                        }
                    }
                } else {
                    echo "Token Expire";
                }
            } else {
                echo "Cancel";
            }
        } else {
            echo "Cancel";
        }
    }

    public function konfirmasi()
    {
        $jwt = Input::get('rid');
        try {
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $recovery = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->kode_recovery;
            $user = self::cariuser($email);
            if ($user) {
                if ($user->recovery === $recovery) {
                    DB::terhubung()->perbarui('users', $user->id, array(
                        'recovery' => null,
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    return $this->view(
                        page: '../theme/auth/konfirmasi',
                        data: [
                            'title' => 'Konfirmasi Akun',
                            'pertanyaan' => $user->pertanyaan,
                            'rid' => $jwt
                        ]
                    );
                } else {
                    DB::terhubung()->perbarui('users', $user->id, array(
                        'recovery' => null,
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    Lanjut::ke('/');
                }
            } else {
                Lanjut::ke('/');
            }
        } catch (Exception $e) {
            Lanjut::ke('/');
        }
    }

    public function setKonfirmasi()
    {
        $jwt = Input::get('rid');
        $token = Input::get('__token');
        $jawaban = sha1(Input::get('jawaban'));
        try {
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user) {
                if (Guard::FormChecker($token)) {
                    if (DB::terhubung()->cekdata('users', array(
                        'email' => $user->email,
                        'jawaban' => $jawaban
                    ))) {
                        $kode = substr(sha1(date('YmdHis')), 5, 9);
                        DB::terhubung()->perbarui('users', $user->id, array(
                            'recovery' => $kode,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        $koderecovery = self::cariuser($user->email);
                        $payload = [
                            'email' => $user->email,
                            'kode_recovery' => $koderecovery->recovery
                        ];
                        $rid = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                        echo $rid;
                    } else {
                        echo "Cancel";
                    }
                } else {
                    echo "Cancel";
                }
            } else {
                echo "Cancel";
            }
        } catch (Exception $e) {
            echo "Cancel";
        }
    }

    public function reset()
    {
        $jwt = Input::get('rid');
        try {
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $recovery = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->kode_recovery;
            $user = self::cariuser($email);
            if ($user) {
                if ($user->recovery === $recovery) {
                    DB::terhubung()->perbarui('users', $user->id, array(
                        'recovery' => null,
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    return $this->view(
                        page: '../theme/auth/reset',
                        data: [
                            'title' => 'Reset Password',
                            'rid' => $jwt
                        ]
                    );
                } else {
                    DB::terhubung()->perbarui('users', $user->id, array(
                        'recovery' => null,
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    Lanjut::ke('/');
                }
            } else {
                Lanjut::ke('/');
            }
        } catch (Exception $e) {
            Lanjut::ke('/');
        }
    }

    public function setReset()
    {
        $jwt = Input::get('rid');
        $token = Input::get('__token');
        $newpassword = Input::get('password');
        $salt = Hash::salt();
        $password = Hash::make($newpassword, $salt);

        try {
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user) {
                if (Guard::FormChecker($token)) {
                    $perbarui = DB::terhubung()->perbarui("users", $user->id, array(
                        'password' => $password,
                        'salt' => $salt,
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    if ($perbarui) {
                        $payload = [
                            'reset' => true
                        ];
                        $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                        Cookies::simpan('RESET', $jwt);
                    } else {
                        echo "Cancel";
                    }
                } else {
                    echo "Cancel";
                }
            } else {
                echo "Cancel";
            }
        } catch (Exception $e) {
            echo "Cancel";
        }
    }

    public function registrasi()
    {
        if (\AbieSoft\Utilities\Define::$showoffRegistrasi) {
            return $this->view(
                page: '../theme/auth/registrasi',
                data: [
                    'title' => 'Registrasi'
                ]
            );
        } else {
            Lanjut::ke('/login');
        }
    }

    public function setRegistrasi()
    {
        $nama = Input::get("nama");
        $email = Input::get("email");
        $pass = Input::get("password");
        $token = Input::get("__token");
        if (Guard::FormChecker($token)) {
            $cek = DB::terhubung()->cekdata('users', array(
                'email' => $email
            ));
            if (!$cek) {
                $salt = Hash::salt();
                $password = Hash::make($pass, $salt);
                $input = DB::terhubung()->input('users', array(
                    'nama' => $nama,
                    'email' => $email,
                    'password' => $password,
                    'salt' => $salt,
                    'grupid' => 2

                ));
                if ($input) {
                    echo "Berhasil";
                } else {
                    echo "Cancel";
                }
            } else {
                echo "Email " . $email . " sudah terdaftar";
            }
        } else {
            echo "Cancel";
        }
    }

    public static function isLogin()
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            try {
                $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                $sessionid = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->sessionid;
                $lockscreen = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->lockscreen;
                $user = self::cariuser($email);
                if (!$user) {
                    Cookies::hapus('ABIESOFT-SCT');
                    self::$_sessionLogin = false;
                } else {
                    if ($sessionid === $user->sessionid) {
                        self::$_sessionLogin = true;
                    } else {
                        if ($lockscreen != "on") {
                            Cookies::hapus('ABIESOFT-SCT');
                        }
                        self::$_sessionLogin = false;
                    }
                }
            } catch (Exception $e) {
                Cookies::hapus('ABIESOFT-SCT');
                self::$_sessionLogin = false;
            }
        } else {
            self::$_sessionLogin = false;
        }
        return self::$_sessionLogin;
    }

    public function logout()
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            try {
                $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                $sessionid = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->sessionid;
                $lockscreen = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->lockscreen;
                $user = self::cariuser($email);
                if (!$user) {
                    Cookies::hapus('ABIESOFT-SCT');
                    Lanjut::ke('/');
                } else {
                    if ($sessionid === $user->sessionid) {
                        /*if ($user->pertanyaan != null) {*/
                        DB::terhubung()->perbarui('users', $user->id, array(
                            'sessionid' => null,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        if ($lockscreen != "on") {
                            Cookies::hapus('ABIESOFT-SCT');
                        }
                        Lanjut::ke('/');
                        /*} else {
                            $payload = [
                                'logout' => true
                            ];
                            $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                            Cookies::simpan('LOGOUT', $jwt);
                            Lanjut::ke('/profile');
                        }*/
                    } else {
                        DB::terhubung()->perbarui('users', $user->id, array(
                            'sessionid' => null,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        Cookies::hapus('ABIESOFT-SCT');
                        Lanjut::ke('/');
                    }
                }
            } catch (Exception $e) {
                Cookies::hapus('ABIESOFT-SCT');
                Lanjut::ke('/');
            }
        }
    }

    public function removeLockscreen()
    {
        Cookies::hapus('ABIESOFT-SCT');
        Lanjut::ke('/');
    }

    public static function getID(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->id != null) {
                self::$_id = $user->id;
            }
        }

        return self::$_id;
    }

    public static function getNama(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->nama != null) {
                self::$_nama = $user->nama;
            }
        }

        return self::$_nama;
    }

    public static function getTglLahir(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->tgllahir != null) {
                self::$_tgllahir = $user->tgllahir;
            }
        }

        return self::$_tgllahir;
    }

    public static function getJenisKelamin(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->jeniskelamin != null) {
                self::$_jeniskelamin = $user->jeniskelamin;
            }
        }

        return self::$_jeniskelamin;
    }

    public static function getPhoto(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->photo != null) {
                if (file_exists(__DIR__ . "/../../public" . $user->photo)) {
                    self::$_photo = Config::envReader('BASEURL') . $user->photo;
                } else {
                    self::$_photo = Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                }
            } else {
                self::$_photo = Config::envReader('BASEURL') . "/assets/media/photo/default.png";
            }
        }

        return self::$_photo;
    }

    public static function getCover(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->cover != null) {
                self::$_cover = $user->cover;
            } else {
                self::$_cover = Config::envReader('BASEURL') . "/assets/media/cover.jpg";
            }
        }

        return self::$_cover;
    }

    public static function getEmail(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->email != null) {
                self::$_email = $user->email;
            }
        }

        return self::$_email;
    }

    public static function getNoHp(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->nohp != null) {
                self::$_nohp = $user->nohp;
            }
        }

        return self::$_nohp;
    }

    public static function getPertanyaan(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->pertanyaan != null) {
                self::$_pertanyaan = $user->pertanyaan;
            }
        }

        return self::$_pertanyaan;
    }

    public static function getGrupId(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->grupid != null) {
                self::$_grupid = $user->grupid;
            }
        }

        return self::$_grupid;
    }

    public static function getSalt(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->salt != null) {
                self::$_salt = $user->salt;
            }
        }

        return self::$_salt;
    }

    public static function getPassword(): string
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            if ($user->password != null) {
                self::$_password = $user->password;
            }
        }

        return self::$_password;
    }

    public static function getLogout(): bool
    {
        if (Cookies::ada('LOGOUT')) {
            $jwt = Cookies::lihat('LOGOUT');
            $logout = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->logout;
            if ($logout) {
                self::$_logout = true;
            }
        }

        return self::$_logout;
    }

    public function detailProfile()
    {
        if (self::getLogout()) {
            $pesan = "<div class='alert alert-warning'>Hai " . self::getNama() . " user anda baru pertama kali login. Sebaiknya sebelum anda logout, buat pertanyaan terlebih dahulu, ini akan membantu anda saat anda lupa password untuk loginnya. Silahkan buka menu reset lalu isikan pertanyaan dan jawabannya</div>";
            $umum = "";
            $reset = "active";
            Cookies::hapus('LOGOUT');
        } else {
            $pesan = "";
            $umum = "active";
            $reset = "";
        }
        $seting = DB::terhubung()->query("SELECT * FROM seting")->hasil();
        return $this->view(
            page: '../theme/profile/detail',
            data: [
                'title' => 'Profile',
                'nama' => self::getNama(),
                'photo' => self::getPhoto(),
                'cover' => self::getCover(),
                'email' => self::getEmail(),
                'nohp' => self::getNoHp(),
                'pertanyaan' => self::getPertanyaan(),
                'pesan' => $pesan,
                'umum' => $umum,
                'reset' => $reset,
                'seting' => $seting
            ]
        );
    }

    public function setUpdateProfile()
    {
        if (Cookies::ada('ABIESOFT-SCT')) {
            $jwt = Cookies::lihat('ABIESOFT-SCT');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = self::cariuser($email);
            $token = Input::get('__token');
            if (Guard::FormChecker($token)) {
                if (Input::get('tab') == "umum") {
                    $perbarui = DB::terhubung()->perbarui('users', $user->id, array(
                        'nama' => Input::get('nama'),
                        'email' => Input::get('email'),
                        'nohp' => Input::get('nohp'),
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    if ($perbarui) {
                        echo "Berhasil";
                    } else {
                        echo "Cancel";
                    }
                } else if (Input::get('tab') == "secure") {
                    $perbarui = DB::terhubung()->perbarui('users', $user->id, array(
                        'pertanyaan' => Input::get('pertanyaan'),
                        'jawaban' => sha1(Input::get('jawaban')),
                        'diupdate' => date('Y-m-d H:i:s')
                    ));
                    if ($perbarui) {
                        echo "Berhasil";
                    } else {
                        echo "Cancel";
                    }
                } else if (Input::get('tab') == "password") {
                    if (Hash::make(Input::get('lama'), $user->salt) == $user->password) {
                        $salt = Hash::salt();
                        $perbarui = DB::terhubung()->perbarui('users', $user->id, array(
                            'password' => Hash::make(Input::get('baru'), $salt),
                            'salt' => $salt,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        if ($perbarui) {
                            echo "Berhasil";
                        } else {
                            echo "Cancel";
                        }
                    } else {
                        echo "Cancel";
                    }
                } else {
                    $folder = $user->id;
                    $dir = __DIR__ . "/../../public/assets/media/photo/" . $folder . "/";
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                    $tmp_name = Input::file('photo', 'tmp_name');
                    $nama = Input::file('photo', 'name');
                    $ukuran = Input::file('photo', 'ukuran');
                    $target = $dir . basename(substr(sha1(date('YmdHis')), 5, 9) . "_" . $nama);

                    if (Metafile::approver('photo', $nama, $ukuran) == "diijinkan") {
                        if (move_uploaded_file($tmp_name, $target)) {
                            DB::terhubung()->perbarui('users', $user->id, array(
                                'photo' => "/assets" . explode("assets", $target)[1],
                                'diupdate' => date('Y-m-d H:i:s')
                            ));
                            echo Config::envReader('BASEURL') . "/assets" . explode("assets", $target)[1];
                        } else {
                            echo "Cancel";
                        }
                    } else {
                        echo Metafile::approver('photo', $nama, $ukuran);
                    }
                }
            } else {
                echo "Token Expire";
            }
        }
        return false;
    }

    public static function switchOpsi()
    {
        if (self::getGrupId() == 1) {
            $id = Input::get("ID");
            $cekseting = DB::terhubung()->query("SELECT * FROM seting WHERE id = '" . $id . "' ");
            if ($cekseting->hitung()) {
                foreach ($cekseting->hasil() as $cs) {
                    if ($cs->opsi == null) {
                        DB::terhubung()->perbarui('seting', $cs->id, array(
                            'opsi' => 'checked',
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        echo $cs->nama . " diaktifkan";
                    } else {
                        DB::terhubung()->perbarui('seting', $cs->id, array(
                            'opsi' => null,
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        echo $cs->nama . " dimatikan";
                    }
                }
            }
            return false;
        } else {
            Lanjut::ke('/');
        }
    }
}