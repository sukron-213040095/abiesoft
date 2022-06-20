<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Models\Template;
use Nette\Utils\Html;

class TemplateController extends Controller
{

    public static function authButton()
    {
        $photo = AuthController::getPhoto();
        if (AuthController::isLogin()) {
            $Button = Html::el('div')->addHtml('
                <div class="w-[50px] h-[50px] rounded-[50%] overflow-hidden cursor-pointer" onClick="return showProfileOption()">
                    <img id="pp1" src="' . $photo . '" class="w-[50px] h-[50px] object-cover">
                </div>
            ');
        } else {
            $Button = Html::el('div')->addHtml('<a href="/login" class="bg-sky-800 hover:bg-sky-700 text-white px-6 py-2 rounded-md font-semibold text-[10pt]">LOGIN</a> <span class="ml-2 font-semibold"
                >|</span> <a href="/registrasi" class="ml-2 font-semibold hover:underline hover:text-gray-500">Registrasi</a>');
        }

        return $Button;
    }
}
