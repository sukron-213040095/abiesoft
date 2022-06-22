<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class seting
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE seting ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(255) NOT NULL,
            keterangan TEXT NULL,
            opsi VARCHAR(10) NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        DB::terhubung()->input('seting', array(
            'nama' => 'Menu Registrasi',
            'keterangan' => 'Menampilkan dan menyembunyikan menu registrasi di halaman login.',
            'opsi' => 'checked'
        ));

        DB::terhubung()->input('seting', array(
            'nama' => 'Halaman Wellcome',
            'keterangan' => 'Halaman Wellcome sebagai halaman utama saat aplikasi diakses',
            'opsi' => null
        ));
    }
}

$create = new seting();
$create->buattabel();
