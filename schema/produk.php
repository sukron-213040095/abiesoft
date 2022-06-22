<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class produk
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE produk ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(255) NOT NULL,
            gambar TEXT NOT NULL,
            keterangan TEXT NOT NULL,
            harga INT(11) NOT NULL,
            stok INT(6) DEFAULT 0,
            laku INT(6) DEFAULT 0,
            diskon INT(6) DEFAULT 0,
            publik VARCHAR(30) DEFAULT "draf",
            dilihat INT(6) DEFAULT 0,
            disukai INT(6) DEFAULT 0,
            kategori_id INT(6) NOT NULL,
            users_id INT(6) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
    }
}

$create = new produk();
$create->buattabel();
