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
            email VARCHAR(255) NOT NULL UNIQUE, 
            password VARCHAR(64) NOT NULL, 
            salt VARCHAR(4) NOT NULL,
            nama VARCHAR(40) NOT NULL, 
            tgllahir DATETIME DEFAULT NULL, 
            jeniskelamin VARCHAR(9) DEFAULT NULL, 
            photo TEXT DEFAULT NULL, 
            cover TEXT DEFAULT NULL,
            nohp VARCHAR(13) DEFAULT NULL, 
            grupid INT(6) NOT NULL,
            pertanyaan VARCHAR(255) NULL,
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
        DB::terhubung()->input('users', array(
            'cover' => null,
            'dibuat' => '2022-06-22 11:39:14',
            'diupdate' => '2022-06-26 13:22:50',
            'email' => 'email@email.com',
            'grupid' => '1',
            'id' => '1',
            'jawaban' => null,
            'jeniskelamin' => null,
            'nama' => 'UmieAli Admin',
            'nohp' => null,
            'password' => '5c06a99a62a6e27150a4ede2630308f33efaf2e074d5fc516608ed9d58a37352',
            'pertanyaan' => null,
            'photo' => '/assets/storage/photo/1/421677ff0_umieali.png',
            'recovery' => null,
            'salt' => 'imIa',
            'sessionid' => 'fb2cfdd41',
            'tgllahir' => null,
        ));

        DB::terhubung()->input('users', array(
            'cover' => null,
            'dibuat' => '2022-06-23 01:01:10',
            'diupdate' => '2022-06-24 23:40:31',
            'email' => 'sabbayroad@gmail.com',
            'grupid' => '2',
            'id' => '2',
            'jawaban' => null,
            'jeniskelamin' => null,
            'nama' => 'Sukron',
            'nohp' => null,
            'password' => '96a59134a10c45bbcb88ca4efab27b522a0e18ebb2c147c9aff8c8a3055a2f36',
            'pertanyaan' => null,
            'photo' => '/assets/storage/photo/2/42644b5ad_my.jpg',
            'recovery' => null,
            'salt' => 'ibC&',
            'sessionid' => '63827b1f9',
            'tgllahir' => null,
        ));
    }
}

$create = new users();
$create->buattabel();
