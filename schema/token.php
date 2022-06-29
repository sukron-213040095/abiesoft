<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class token
{

    public static function buattabel()
    {

        $sql = 'CREATE TABLE token ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            generate_token TEXT NOT NULL,
            ip VARCHAR(255) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {

        //DB::terhubung()->input('token', array(
        // Input data disini 
        //));  

    }
}

$create = new token();
$create->buattabel();
