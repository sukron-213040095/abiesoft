<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class produk
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE produk ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL,
            gambar TEXT NOT NULL,
            keterangan TEXT NOT NULL,
            harga INT(11) NOT NULL,
            stok INT(6) NOT NULL,
            laku INT(6) DEFAULT NULL,
            diskon INT(6) DEFAULT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('produk', array(
        // Input data disini 
        //));  

    }
}

$create = new produk();
$create->buattabel();
