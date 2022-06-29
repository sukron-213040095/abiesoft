<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Cookies;
use AbieSoft\Utilities\Hash;
use AbieSoft\Utilities\Input;
use AbieSoft\Utilities\Metafile;
use AbieSoft\Utilities\Tanggal;
use AbieSoft\Utilities\Format;
use Firebase\JWT\JWT;

class WebserviceController extends Controller
{

    protected function apicheck($api): bool
    {
        return DB::terhubung()->cekdata('api', array(
            'apikey' => $api
        ));
    }

    public function profile()
    {
        $api = Input::get('apikey');
        if ($this->apicheck($api)) {
            $data = AuthController::getNama() . "|" . AuthController::getEmail() . "|" . AuthController::getPhoto();
            echo $data;
        } else {
            echo "Token Expire";
        }
    }

    public function tab()
    {
        $api = Input::get('apikey');
        if ($this->apicheck($api)) {
            return match (Input::get('tab')) {
                'biodata' => $this->biodata(),
                'alamat' => AlamatController::tab(),
                'pembayaran' => PembayaranController::tab(),
                'produk' => ProdukController::tab()
            };
        } else {
            echo "Token Expire";
        }
    }

    protected function biodata()
    {
        $data = AuthController::getNama() . "|" . Tanggal::standar(AuthController::getTglLahir()) . "|" . AuthController::getJenisKelamin() . "|" . AuthController::getEmail() . "|" . AuthController::getPhoto() . "|" .  AuthController::getNoHp() . "|" . AuthController::getPertanyaan() . "|" . Tanggal::edit(AuthController::getTglLahir());
        echo $data;
    }


    public function act()
    {
        $model = Input::get('model');
        return match ($model) {
            'nama' => $this->ubahnama(Input::get('nama')),
            'tgllahir' => $this->tgllahir(Input::get('tgllahir')),
            'jeniskelamin' => $this->jeniskelamin(Input::get('jeniskelamin')),
            'email' => $this->email(Input::get('email')),
            'nohp' => $this->nohp(Input::get('nohp')),
            'pertanyaan' => $this->pertanyaan(Input::get('pertanyaan'), Input::get('jawaban')),
            'password' => $this->password(Input::get('password')),
            'hapus' => $this->hapus(Input::get('password')),
            default => $this->error()
        };
    }

    public function formater()
    {
        echo Tanggal::standar(Input::get('tgl'));
    }

    protected function error()
    {
        echo "Token Expire";
    }

    protected function ubahnama($nama)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('nama' => $nama));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Nama gagal diubah";
        }
    }

    protected function tgllahir($tgllahir)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('tgllahir' => $tgllahir));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function jeniskelamin($jeniskelamin)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('jeniskelamin' => $jeniskelamin));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function email($email)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('email' => $email));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function nohp($nohp)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('nohp' => $nohp));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function pertanyaan($pertanyaan, $jawaban)
    {
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('pertanyaan' => $pertanyaan, 'jawaban' => sha1($jawaban)));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function password($password)
    {
        $salt = Hash::salt();
        $newpassword = Hash::make($password, $salt);
        $perbarui = DB::terhubung()->perbarui('users', AuthController::getID(), array('password' => $newpassword, 'salt' => $salt));
        if ($perbarui) {
            echo "Berhasil";
        } else {
            echo "Tanggal lahir gagal diubah";
        }
    }

    protected function hapus($password)
    {
        if (AuthController::getPassword() == Hash::make($password, AuthController::getSalt())) {
            $hapus = DB::terhubung()->hapus('users', array('id', '=', AuthController::getID()));
            if ($hapus) {
                echo "Berhasil";
            } else {
                echo "Gagal menghapus akun";
            }
        } else {
            echo "Gagal menghapus akun";
        }
    }

    public function upload()
    {

        $uid = AuthController::getID();
        $folder = __DIR__ . "/../" . \AbieSoft\Utilities\Config::envReader('PUBLIC_FOLDER') . "/assets/storage/photo/" . $uid . "/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777);
        }
        $tmp_name = Input::file('photo', 'tmp_name');
        $nama = Input::file('photo', 'name');
        $ukuran = Input::file('photo', 'ukuran');
        $target = $folder . basename(substr(sha1(date('YmdHis')), 5, 9) . "_" . $nama);

        if (Metafile::approver('photo', $nama, $ukuran) == "diijinkan") {
            if (move_uploaded_file($tmp_name, $target)) {
                DB::terhubung()->perbarui('users', $uid, array(
                    'photo' => "/assets" . explode("assets", $target)[1],
                    'diupdate' => date('Y-m-d H:i:s')
                ));
                $data = [
                    [
                        'photo' => AuthController::getPhoto(),
                        'status' => 'Sukses'
                    ]
                ];
            } else {
                $data = [
                    [
                        'photo' => AuthController::getPhoto(),
                        'gagal' => 'Cancel'
                    ]
                ];
            }
        } else {
            $data = [
                [
                    'photo' => AuthController::getPhoto(),
                    'gagal' => Metafile::approver('photo', $nama, $ukuran)
                ]
            ];
        }
        echo json_encode($data);
    }


    public function list()
    {
        $api = Input::get('apikey');
        if ($this->apicheck($api)) {
            $model = Input::get('list');
            return match ($model) {
                'kategori' => $this->listkategori(Input::get('slug')),
                'palinglaku' => $this->palinglaku(),
                'promo' => $this->promo(),
                'terbaru' => $this->terbaru(),
                default => $this->error()
            };
        } else {
            return $this->error();
        }
    }

    protected function listkategori($slug)
    {
        return KategoriController::items($slug);
    }

    public function doProduk()
    {
        $whatToDo = Input::get('do');
        $id = Input::get('id');
        $keyword = Input::get('keyword');
        if (AuthController::isLogin()) {
            return match ($whatToDo) {
                'delete' => ProdukController::delete($id),
                'read' => ProdukController::read($id),
                'search' => ProdukController::search($keyword),
                'only' => ProdukController::only($id),
                'item' => ProdukController::item($id),
                'hapusitem' => ProdukController::hapusitem($id),
                'suka' => ProdukController::suka($id),
                default => $this->error()
            };
        } else {
            return match ($whatToDo) {
                'only' => ProdukController::only($id),
                default => $this->error()
            };
        }
    }

    protected function palinglaku()
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE laku != 0 AND publik = 'publik' ORDER BY laku DESC LIMIT 6");

        $list = [];
        foreach ($produk->hasil() as $p) {
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = Format::simpel($p->nama, 18);
            $items->slug = $p->slug;
            $items->gambar = $p->gambar;
            $items->keterangan = Format::simpel($p->keterangan, 53);
            $items->harga = Format::uang($p->harga);
            $items->diskon = $p->diskon . "%";
            $list[] = $items;
        }
        echo json_encode($list);
    }

    protected function promo()
    {
        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE diskon != 0 AND publik = 'publik' ORDER BY id DESC LIMIT 6");

        $list = [];
        foreach ($produk->hasil() as $p) {
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = Format::simpel($p->nama, 18);
            $items->slug = $p->slug;
            $items->gambar = $p->gambar;
            $items->keterangan = Format::simpel($p->keterangan, 53);
            $items->harga = Format::uang($p->harga);
            $items->diskon = $p->diskon . "%";
            $list[] = $items;
        }
        echo json_encode($list);
    }

    protected function terbaru()
    {

        $produk = DB::terhubung()->query("SELECT * FROM produk WHERE  publik = 'publik' ORDER BY id DESC");

        $list = [];
        foreach ($produk->hasil() as $p) {
            $items = new ProdukController();
            $items->id = $p->id;
            $items->nama = Format::simpel($p->nama, 20);
            $items->slug = $p->slug;
            $items->gambar = $p->gambar;
            $items->diskon = $p->diskon . "%";
            $items->keterangan = Format::simpel($p->keterangan, 55);
            $items->harga = Format::uang($p->harga);
            $list[] = $items;
        }
        echo json_encode($list);
    }
}
