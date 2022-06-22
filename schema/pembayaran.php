<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class pembayaran
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE pembayaran ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(255) NOT NULL,
            icon TEXT NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('pembayaran', array(
        // Input data disini 
        //));  

    }
}

$create = new pembayaran();
$create->buattabel();
