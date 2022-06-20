<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class grup
{

    public static function buattabel()
    {

        $sql = 'CREATE TABLE grup ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(33) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {

        DB::terhubung()->input('grup', array(
            "nama" => "Administrator",
        ));

        DB::terhubung()->input('grup', array(
            "nama" => "Pembeli",
        ));
    }
}

$create = new grup();
$create->buattabel();
