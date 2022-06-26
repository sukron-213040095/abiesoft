<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class alamat { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE alamat ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            alamat TEXT NOT NULL, 
            nama VARCHAR(255) NOT NULL, 
            nohp VARCHAR(13) NOT NULL, 
            users_id INT NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        //DB::terhubung()->input('alamat', array(
            // Input data disini 
        //));  
 
    }
 
} 
 
$create = new alamat(); 
$create->buattabel();