<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use Nette\Utils\Html;

class HomeController extends Controller
{
    public function index()
    {
        $nama = AuthController::getNama();
        $email = AuthController::getEmail();

        return $this->view(
            page: "home/index",
            data: [
                'title' => 'AbieSoft',
                'authButton' => \App\Controllers\TemplateController::authButton(),
                'nama' => $nama,
                'email' => $email
            ]
        );
    }
}
