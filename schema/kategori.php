<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class kategori
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE kategori ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        //DB::terhubung()->input('kategori', array(
        // Input data disini 
        //));  

    }
}

$create = new kategori();
$create->buattabel();
