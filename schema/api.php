<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class api
{

    public static function buattabel()
    {

        $sql = 'CREATE TABLE api ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            apikey VARCHAR(255) NULL UNIQUE,
            request INT(11) NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {

        //DB::terhubung()->input('api', array(
        // Input data disini 
        //));  

    }
}

$create = new api();
$create->buattabel();
