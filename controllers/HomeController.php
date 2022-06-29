<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Input;

class HomeController extends Controller
{
    public function index()
    {
        $nama = AuthController::getNama();
        $email = AuthController::getEmail();
        $palinglaku = DB::terhubung()->query("SELECT laku FROM produk WHERE laku != 0");
        if ($palinglaku->hitung() < 1) {
            $palinglaku = null;
        }
        $diskon = DB::terhubung()->query("SELECT diskon FROM produk WHERE diskon != 0");
        if ($diskon->hitung() < 1) {
            $diskon = null;
        }
        return $this->view(
            page: "home/index",
            data: [
                'title' => \AbieSoft\Utilities\Config::envReader('APP_TITLE'),
                'authButton' => \App\Controllers\TemplateController::authButton(),
                'nama' => $nama,
                'email' => $email,
                'palinglaku' => $palinglaku,
                'diskon' => $diskon
            ]
        );
    }
}
