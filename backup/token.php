<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class token { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE token ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            generate_token TEXT NOT NULL, 
            ip VARCHAR(25) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('token', array(
            'id' => '1', 
            'generate_token' => '9ec7aa328', 
            'ip' => '127.0.0.1', 
            'dibuat' => '2022-06-21 02:25:44', 
            'diupdate' => null, 
        ));  
 
    }
 
} 
 
$create = new token(); 
$create->buattabel();