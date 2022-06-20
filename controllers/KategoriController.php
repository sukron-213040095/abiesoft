<?php

namespace App\Controllers;

use AbieSoft\Http\Controller;
use AbieSoft\Utilities\GetUri;

class KategoriController extends Controller
{

    public function index()
    {
        $slug = GetUri::slug();
        $ce = count(explode("-", $slug));
        $nama = "";
        for ($i = 0; $i < $ce; $i++) {
            $nama .= ucfirst(explode("-", $slug)[$i]) . " ";
        }
        return $this->view(page: 'kategori/index', data: [
            'title' => 'Kategori',
            'nama' => $nama,
            'slug' => $slug,
            'authButton' => \App\Controllers\TemplateController::authButton()
        ]);
    }
}
