<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class kurir
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE kurir ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL,
            telp VARCHAR(13) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('kurir', array(
        // Input data disini 
        //));  

    }
}

$create = new kurir();
$create->buattabel();
