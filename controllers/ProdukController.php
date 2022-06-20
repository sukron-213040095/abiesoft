<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Input;
use AbieSoft\Utilities\Metafile;

class ProdukController extends Controller
{

    public static function new()
    {
        $uid = AuthController::getID();
        $folder = __DIR__ . "/../public/assets/storage/images/" . $uid . "/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777);
        }
        $tmp_name = Input::file('gambar', 'tmp_name');
        $nama = Input::file('gambar', 'name');
        $ukuran = Input::file('gambar', 'ukuran');
        $target = $folder . basename(substr(sha1(date('YmdHis')), 5, 9) . "_" . $nama);

        $namaproduk = Input::get('nama');
        $keterangan = Input::get('keterangan');
        $harga = Input::get('harga');
        $stok = Input::get('stok');
        $kategori_id = Input::get('kategori_id');

        if (Metafile::approver('gambar', $nama, $ukuran) == "diijinkan") {
            if (move_uploaded_file($tmp_name, $target)) {

                $input = DB::terhubung()->input('produk', array(
                    'nama' => $namaproduk,
                    'keterangan' => $keterangan,
                    'harga' => $harga,
                    'stok' => $stok,
                    'kategori_id' => $kategori_id,
                    'gambar' => "/assets" . explode("assets", $target)[1]
                ));
                if ($input) {
                    return self::tab();
                } else {
                    $data = [
                        [
                            'status' => 'Cancel'
                        ]
                    ];
                }
            } else {
                $data = [
                    [
                        'status' => 'Cancel'
                    ]
                ];
            }
        } else {
            $data = [
                [
                    'status' => Metafile::approver('photo', $nama, $ukuran)
                ]
            ];
        }
        echo json_encode($data);
    }

    public static function tab()
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk ORDER BY id DESC");

        $list = [];
        foreach ($produk->hasil() as $p) {
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = $p->nama;
            $items->gambar = $p->gambar;
            $items->keterangan = $p->keterangan;
            $items->harga = $p->harga;
            $items->stok = $p->stok;
            $items->laku = $p->laku;
            $items->dilihat = $p->dilihat;
            $items->disukai = $p->disukai;
            $items->publik = $p->publik;
            $list[] = $items;
        }
        echo json_encode($list);
    }
}
