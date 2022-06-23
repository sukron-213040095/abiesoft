<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class keranjang
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE keranjang ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            invoice_id INT(6) NOT NULL,
            produk_id INT(6) NOT NULL,
            jumlah INT(6) NOT NULL,
            total INT(11) NOT NULL,
            catatan TEXT DEFAULT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('keranjang', array(
        // Input data disini 
        //));  

    }
}

$create = new keranjang();
$create->buattabel();
