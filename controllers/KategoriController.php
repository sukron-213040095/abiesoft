<?php

namespace App\Controllers;

use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
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

    public static function items($slug)
    {

        $idKategori =
            $IdBySlug = DB::terhubung()->query("SELECT id,slug FROM kategori WHERE slug = '" . $slug . "' ");

        if ($IdBySlug->hitung()) {
            foreach ($IdBySlug->hasil() as $slg) {
                $idKategori = $slg->id;
            }
        }

        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE kategori_id = '" . $idKategori . "' ORDER BY id DESC");
        $list = [];
        foreach ($produk->hasil() as $p) {
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = $p->nama;
            $items->gambar = $p->gambar;
            $items->keterangan = $p->keterangan;
            $items->harga = $p->harga;
            $items->publik = $p->publik;
            $items->slug = \AbieSoft\Utilities\Config::envReader('BASEURL') . "/produk/" . $p->slug;
            $list[] = $items;
        }
        echo json_encode($list);
    }

    public function list()
    {
        echo "<option>Item</option>";
    }
}
