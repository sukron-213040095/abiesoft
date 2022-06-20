<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class invoice
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE invoice ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            no_invoice VARCHAR(13) NOT NULL UNIQUE,
            transaksi TEXT NOT NULL,
            total VARCHAR(6) NOT NULL,
            status INT(6) DEFAULT 0, 
            pembayaran_id INT(6) NOT NULL,
            users_id INT(6) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        /* 
            Transaksi diisi array produk yang tercatat di keranjang
            Status Invoice diisi angka 
            0 Untuk menunggu pembayaran, dan
            1 Untuk sudah dibayar
            2 Untuk dibatalkan
        */

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('invoice', array(
        // Input data disini 
        //));  

    }
}

$create = new invoice();
$create->buattabel();
