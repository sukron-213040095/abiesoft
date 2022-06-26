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
            'dibuat' => '2022-06-22 11:39:33', 
            'diupdate' => '2022-06-26 13:22:42', 
            'generate_token' => '8a841cae6', 
            'id' => '1', 
            'ip' => '127.0.0.1', 
        ));  
 
    }
 
} 
 
$create = new token(); 
$create->buattabel();