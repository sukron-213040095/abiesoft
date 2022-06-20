<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;
use AbieSoft\Utilities\Hash;
use AbieSoft\Utilities\Input;
use AbieSoft\Utilities\Tanggal;
use Google\Service\CloudSearch\Id;

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
                'alamat' => $this->alamat(),
                'pembayaran' => $this->pembayaran()
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

    protected function alamat()
    {
        echo "Alamat";
    }

    protected function pembayaran()
    {
        echo "Pembayaran";
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
            'upload' => $this->upload($_FILES),
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

    protected function upload($file)
    {
        print_r($file);
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
        $data = [
            [
                'id' => 1,
                'nama' => 'Kue Ulang Tahun Redvelvet 1',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-1',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ]
        ];
        echo json_encode($data);
    }

    protected function palinglaku()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Kue Ulang Tahun Redvelvet 1',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-1',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ]
        ];
        echo json_encode($data);
    }

    protected function promo()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Kue Ulang Tahun Redvelvet 1',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-1',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '10%',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '15%',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '15%',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '20%',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '10%',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'diskon' => '10%',
                'harga' => 130000
            ]
        ];
        echo json_encode($data);
    }

    protected function terbaru()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Kue Ulang Tahun Redvelvet 1',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-1',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 2,
                'nama' => 'Kue Ulang Tahun Redvelvet 2',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-2',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 3,
                'nama' => 'Kue Ulang Tahun Redvelvet 3',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-3',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 4,
                'nama' => 'Kue Ulang Tahun Redvelvet 4',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-4',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 5,
                'nama' => 'Kue Ulang Tahun Redvelvet 5',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-5',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ],
            [
                'id' => 6,
                'nama' => 'Kue Ulang Tahun Redvelvet 6',
                'slug' => 'Kue-Ulang-Tahun-Redvelvet-6',
                'gambar' => Config::envReader('BASEURL') . '/assets/storage/images/ultah_4.jpg',
                'keterangan' => 'Basic Kue Redvelvet, Toping, Bonus topper, pisau plastik dan..',
                'harga' => 130000
            ]
        ];
        echo json_encode($data);
    }
}
