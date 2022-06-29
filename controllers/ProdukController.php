<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Format;
use AbieSoft\Utilities\GetUri;
use AbieSoft\Utilities\Input;
use AbieSoft\Utilities\Metafile;

class ProdukController extends Controller
{
    public function detail()
    {
        $slug = GetUri::slug();
        $ce = count(explode("-", $slug));
        $nama = "";
        for ($i = 0; $i < $ce; $i++) {
            $nama .= ucfirst(explode("-", $slug)[$i]) . " ";
        }
        $id = "";
        $cekId = DB::terhubung()->query("SELECT * FROM produk WHERE slug='" . $slug . "' ");
        foreach ($cekId->hasil() as $c) {
            $id = $c->id;
        }
        return $this->view(page: 'produk/detail', data: [
            'title' => 'Detail Produk',
            'id' => $id,
            'nama' => $nama,
            'slug' => $slug,
            'authButton' => \App\Controllers\TemplateController::authButton()
        ]);
    }

    public static function new()
    {
        $uid = AuthController::getID();
        $folder = __DIR__ . "/../" . \AbieSoft\Utilities\Config::envReader('PUBLIC_FOLDER') . "/assets/storage/images/" . $uid . "/";
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

                $finalSlug = "";
                $slug = "";
                $expNama = explode(" ", $namaproduk);
                $no = 1;
                for ($i = 0; $i < count($expNama); $i++) {
                    if (count($expNama) == $no) {
                        if (count($expNama) == 1) {
                            $slug .= "-" . strtolower($expNama[$i]);
                        } else {
                            $slug .= strtolower($expNama[$i]);
                        }
                    } else {
                        $slug .= strtolower($expNama[$i]) . "-";
                    }
                    $no++;
                }

                $cekslug = DB::terhubung()->query("SELECT slug FROM produk WHERE slug = '" . $slug . "' ");
                if ($cekslug->hitung()) {
                    if (substr($slug, 0, 1) == "-") {
                        $slug = substr($slug, 1, strlen($slug));
                    }
                    $finalSlug =  $slug . "-" . date('YmdHis');
                } else {
                    $finalSlug = $slug;
                }

                $input = DB::terhubung()->input('produk', array(
                    'nama' => $namaproduk,
                    'keterangan' => $keterangan,
                    'harga' => $harga,
                    'stok' => $stok,
                    'kategori_id' => $kategori_id,
                    'gambar' => "/assets" . explode("assets", $target)[1],
                    'slug' => $finalSlug,
                    'users_id' => AuthController::getID()
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
                        'status' => 'Disini'
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
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ORDER BY id DESC");
        $list = [];
        foreach ($produk->hasil() as $p) {
            if ($p->diskon == null) {
                $diskon = 0;
            } else {
                $diskon = $p->diskon;
            }

            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = Format::simpel($p->nama, 30);
            $items->gambar = $p->gambar;
            $items->keterangan = Format::simpel($p->keterangan, 50);
            $items->harga = Format::uang($p->harga);
            $items->stok = $p->stok;
            $items->laku = $p->laku;
            $items->dilihat = $p->dilihat;
            $items->disukai = $p->disukai;
            $items->diskon = $diskon;
            $items->kategori_id = $p->kategori_id;
            $items->publik = $p->publik;
            $items->slug = $p->slug;
            $items->users_id = $p->users_id;
            $list[] = $items;
        }
        echo json_encode($list);
    }

    public static function read($id)
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE id = '" . $id . "' AND users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ");
        $list = [];
        foreach ($produk->hasil() as $p) {
            if ($p->diskon == null) {
                $diskon = 0;
            } else {
                $diskon = $p->diskon;
            }
            $kategori = DB::terhubung()->query("SELECT id, nama FROM kategori WHERE id = '" . $p->kategori_id . "' ");
            foreach ($kategori->hasil() as $k) {
                $klabel = $k->nama;
            }
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = $p->nama;
            $items->gambar = Config::envReader('BASEURL') . $p->gambar;
            $items->keterangan = $p->keterangan;
            $items->harga = $p->harga;
            $items->stok = $p->stok;
            $items->laku = $p->laku;
            $items->dilihat = $p->dilihat;
            $items->disukai = $p->disukai;
            $items->diskon = $diskon;
            $items->kid_value = $p->kategori_id;
            $items->kid_label = $klabel;
            $items->publik_value = $p->publik;
            $items->publik_label = ucfirst($p->publik);
            $items->slug = $p->slug;
            $items->users_id = $p->users_id;
            $list[] = $items;
        }
        echo json_encode($list);
    }

    public static function only($id)
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE id = '" . $id . "' ");
        $list = [];
        foreach ($produk->hasil() as $p) {
            if ($p->diskon == null) {
                $diskon = 0;
            } else {
                $diskon = $p->diskon;
            }
            $puser = "";
            $nuser = "";
            $sessionid = "offline";
            $user = DB::terhubung()->query("SELECT id,nama,photo,sessionid FROM users WHERE id = '" . $p->users_id . "' ");
            if ($user->hitung()) {
                foreach ($user->hasil() as $u) {
                    $filephoto = __DIR__ . "/../public";
                    $pp = "";

                    if ($u->photo) {
                        if (file_exists($filephoto . $u->photo)) {
                            $pp = \AbieSoft\Utilities\Config::envReader('BASEURL') . $u->photo;
                        } else {
                            $pp = \AbieSoft\Utilities\Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                        }
                    } else {
                        $pp = \AbieSoft\Utilities\Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                    }

                    if ($u->sessionid != NULL) {
                        $sessionid = "online";
                    } else {
                        $sessionid = "offline";
                    }

                    $puser = $pp;
                    $nuser = $u->nama;
                }
            } else {
                $puser = \AbieSoft\Utilities\Config::envReader('BASEURL') . "/assets/media/photo/default.png";
                $nuser = "Default User";
            }
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = $p->nama;
            $items->gambar = Config::envReader('BASEURL') . $p->gambar;
            $items->keterangan = $p->keterangan;
            $items->harga = $p->harga;
            $items->laku = $p->laku;
            $items->suka = $p->disukai;
            $items->stok = $p->stok;
            $items->diskon = $diskon;
            $items->photouser = $puser;
            $items->namauser = $nuser;
            $items->status = $sessionid;
            $list[] = $items;
        }
        echo json_encode($list);
    }

    public static function search($keyword)
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE nama LIKE '%" . $keyword . "%' AND users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ");
        $list = [];
        foreach ($produk->hasil() as $p) {
            if ($p->diskon == null) {
                $diskon = 0;
            } else {
                $diskon = $p->diskon;
            }
            $kategori = DB::terhubung()->query("SELECT id, nama FROM kategori WHERE id = '" . $p->kategori_id . "' ");
            foreach ($kategori->hasil() as $k) {
                $klabel = $k->nama;
            }
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = Format::simpel($p->nama, 30);
            $items->gambar = $p->gambar;
            $items->keterangan = Format::simpel($p->keterangan, 50);
            $items->harga = Format::uang($p->harga);
            $items->stok = $p->stok;
            $items->laku = $p->laku;
            $items->dilihat = $p->dilihat;
            $items->disukai = $p->disukai;
            $items->diskon = $diskon;
            $items->kategori_id = $p->kategori_id;
            $items->publik = $p->publik;
            $items->slug = $p->slug;
            $items->users_id = $p->users_id;
            $list[] = $items;
        }
        echo json_encode($list);
    }

    public static function update($id)
    {
        $id = Input::get('id');
        $slug = Input::get('slug');
        $cekslug = DB::terhubung()->query("SELECT slug FROM produk WHERE slug = '" . $slug . "' AND id != '" . $id . "'  ");
        if ($cekslug->hitung()) {
            $result = [
                [
                    'message' => 'Slug sudah digunakan'
                ]
            ];
        } else {

            if (Input::file('gambar', 'tmp_name')) {

                $uid = AuthController::getID();
                $folder = __DIR__ . "/../" . \AbieSoft\Utilities\Config::envReader('PUBLIC_FOLDER') . "/assets/storage/images/" . $uid . "/";
                if (!is_dir($folder)) {
                    mkdir($folder, 0777);
                }
                $tmp_name = Input::file('gambar', 'tmp_name');
                $nama = Input::file('gambar', 'name');
                $ukuran = Input::file('gambar', 'ukuran');
                $target = $folder . basename(substr(sha1(date('YmdHis')), 5, 9) . "_" . $nama);

                if (Metafile::approver('gambar', $nama, $ukuran) == "diijinkan") {
                    if (move_uploaded_file($tmp_name, $target)) {
                        $perbarui = DB::terhubung()->perbarui('produk', $id, array(
                            'nama' => Input::get('nama'),
                            'keterangan' => Input::get('keterangan'),
                            'harga' => Input::get('harga'),
                            'stok' => Input::get('stok'),
                            'kategori_id' => Input::get('kategori_id'),
                            'diskon' => Input::get('diskon'),
                            'publik' => Input::get('publik'),
                            'slug' => Input::get('slug'),
                            'gambar' => "/assets" . explode("assets", $target)[1],
                            'diupdate' => date('Y-m-d H:i:s')
                        ));
                        if ($perbarui) {
                            $result = [
                                [
                                    'message' => "Sukses"
                                ]
                            ];
                        } else {
                            $result = [
                                [
                                    'message' => "Cancel"
                                ]
                            ];
                        }
                    } else {
                        $result = [
                            [
                                'message' => "Cancel"
                            ]
                        ];
                    }
                } else {
                    $data = [
                        [
                            'message' => Metafile::approver('photo', $nama, $ukuran)
                        ]
                    ];
                }
            } else {
                $perbarui = DB::terhubung()->perbarui('produk', $id, array(
                    'nama' => Input::get('nama'),
                    'keterangan' => Input::get('keterangan'),
                    'harga' => Input::get('harga'),
                    'stok' => Input::get('stok'),
                    'kategori_id' => Input::get('kategori_id'),
                    'diskon' => Input::get('diskon'),
                    'publik' => Input::get('publik'),
                    'slug' => Input::get('slug'),
                    'diupdate' => date('Y-m-d H:i:s')
                ));
                if ($perbarui) {
                    $result = [
                        [
                            'message' => "Sukses"
                        ]
                    ];
                } else {
                    $result = [
                        [
                            'message' => "Cancel"
                        ]
                    ];
                }
            }
        }
        echo json_encode($result);
    }

    public static function delete($id)
    {
        $cekuser = DB::terhubung()->query("SELECT id, users_id FROM produk WHERE id='" . $id . "' AND users_id = '" . AuthController::getID() . "' ");
        if ($cekuser->hitung()) {
            $hapus = DB::terhubung()->hapus('produk', array('id', '=', $id));
            if ($hapus) {
                $result = [
                    [
                        'message' => 'Berhasil'
                    ]
                ];
                echo json_encode($result);
            } else {
                $result = [
                    [
                        'message' => 'Token Expire'
                    ]
                ];
                echo json_encode($result);
            }
        } else {
            $result = [
                [
                    'message' => 'Token Expire'
                ]
            ];
            echo json_encode($result);
        }
    }

    public static function item($id)
    {
        $uid = \AbieSoft\Auth\AuthController::getID();
        $data = [
            [
                'total' => null,
                'jumlah' => null,
                'harga' => null,
                'catatan' => null,
                'nama' => null,
            ]
        ];
        $cekitem = DB::terhubung()->query("SELECT 
                keranjang.total,
                keranjang.jumlah,
                keranjang.catatan,
                produk.harga,
                produk.nama,
                produk.diskon
             FROM 
                keranjang, 
                invoice, 
                produk
            WHERE 
                invoice.id = keranjang.invoice_id
                AND invoice.users_id = '{$uid}'
                AND produk.id = keranjang.produk_id
                AND produk.id = {$id}
            ");
        if ($cekitem->hitung()) {
            foreach ($cekitem->hasil() as $ci) {
                if ($ci->diskon != 0) {
                    $harga = $ci->harga * $ci->jumlah;
                } else {
                    $harga = 0;
                }

                $data = [
                    [
                        'total' => $ci->total,
                        'jumlah' => $ci->jumlah,
                        'harga' => $harga,
                        'catatan' => $ci->catatan,
                        'nama' => $ci->nama,
                    ]
                ];
            }
        }
        echo json_encode($data);
    }

    public static function hapusitem($id)
    {
        $hapus = DB::terhubung()->hapus('keranjang', array('produk_id', '=', $id));
        if ($hapus) {
            $data = [
                [
                    'message' => 'Berhasil'
                ]
            ];
        } else {
            $data = [
                [
                    'message' => 'Gagal'
                ]
            ];
        }
        echo json_encode($data);
    }

    public static function suka($id)
    {
        preg_match_all('/\d+/', $id, $matches);
        $idjadi = $matches[0][0];
        $uid = AuthController::getID();
        $cek = DB::terhubung()->query("SELECT produk_id, users_id FROM suka WHERE produk_id ='" . $idjadi . "' AND users_id ='" . $uid . "' ");
        if ($cek->hitung()) {
            DB::terhubung()->query("
                DELETE FROM suka WHERE
                produk_id ='" . $idjadi . "'
                AND users_id = '" . $uid . "'
            ");
            $data = [
                [
                    'message' => 'Dibatalkan'
                ]
            ];
        } else {
            DB::terhubung()->input('suka', array(
                'produk_id' => $idjadi,
                'users_id' => $uid
            ));
            $data = [
                [
                    'message' => 'Disukai'
                ]
            ];
        }
        echo json_encode($data);
    }
}
