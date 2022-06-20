<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class alamat
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE alamat ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL,
            alamat TEXT NOT NULL,
            nohp VARCHAR(13) NOT NULL,
            users_id INT(6) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('alamat', array(
        // Input data disini 
        //));  

    }
}

$create = new alamat();
$create->buattabel();
