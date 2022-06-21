<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class users { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE users ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            email VARCHAR(40) NOT NULL, 
            password VARCHAR(64) NOT NULL, 
            salt VARCHAR(4) NOT NULL, 
            nama VARCHAR(40) NOT NULL, 
            tgllahir DATETIME NULL, 
            jeniskelamin VARCHAR(9) NULL, 
            photo TEXT NULL, 
            cover TEXT NULL, 
            nohp VARCHAR(13) NULL, 
            grupid INT(6) NOT NULL, 
            pertanyaan VARCHAR(100) NULL, 
            jawaban VARCHAR(64) NULL, 
            recovery VARCHAR(9) NULL, 
            sessionid VARCHAR(64) NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('users', array(
            'id' => '1', 
            'email' => 'email@email.com', 
            'password' => '88e0c0d841fbc389ca267dccdf68738041e70d3ff8eafea609535264b5682032', 
            'salt' => 'i5x0', 
            'nama' => 'Sukron', 
            'tgllahir' => null, 
            'jeniskelamin' => null, 
            'photo' => '/assets/storage/photo/1/babf67d99_my.jpg', 
            'cover' => null, 
            'nohp' => null, 
            'grupid' => '1', 
            'pertanyaan' => null, 
            'jawaban' => null, 
            'recovery' => null, 
            'sessionid' => '54ae6d764', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => '2022-06-21 03:26:19', 
        ));  
 
    }
 
} 
 
$create = new users(); 
$create->buattabel();