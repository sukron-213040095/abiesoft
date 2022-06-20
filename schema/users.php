<?php

namespace Database\Schema;

use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Hash;

class users
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE users ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            email VARCHAR(40) NOT NULL UNIQUE, 
            password VARCHAR(64) NOT NULL, 
            salt VARCHAR(4) NOT NULL,
            nama VARCHAR(40) NOT NULL, 
            tgllahir DATETIME DEFAULT NULL, 
            jeniskelamin VARCHAR(9) DEFAULT NULL, 
            photo TEXT DEFAULT NULL, 
            cover TEXT DEFAULT NULL,
            nohp VARCHAR(13) DEFAULT NULL, 
            grupid INT(6) NOT NULL,
            pertanyaan VARCHAR(100) NULL,
            jawaban VARCHAR(64) NULL,
            recovery VARCHAR(9) NULL UNIQUE,
            sessionid VARCHAR(64) NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        $nama = "Admin";
        $email = "email@email.com";
        $salt = Hash::salt();
        $password = Hash::make("12345", $salt);
        DB::terhubung()->input('users', array(
            "email" => $email,
            "password" => $password,
            "salt" => $salt,
            "nama" => $nama,
            "grupid" => 1
        ));
    }
}

$create = new users();
$create->buattabel();
