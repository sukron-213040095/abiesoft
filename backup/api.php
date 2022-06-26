<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class api { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE api ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            apikey VARCHAR(64) NULL, 
            request INT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('api', array(
            'apikey' => '9c206677bb4ff1c3ee7592e55196bb6cee8bcb73', 
            'dibuat' => '2022-06-22 11:39:17', 
            'diupdate' => null, 
            'id' => '1', 
            'request' => null, 
        ));  
 
    }
 
} 
 
$create = new api(); 
$create->buattabel();