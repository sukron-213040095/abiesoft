<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class suka
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE suka ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            produk_id INT(6) NOT NULL,
            users_id INT(6) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('suka', array(
        // Input data disini 
        //));  

    }
}

$create = new suka();
$create->buattabel();
