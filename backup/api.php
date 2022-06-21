<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class api { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE api ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            apikey VARCHAR(64) NULL, 
            request INT(11) NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('api', array(
            'id' => '1', 
            'apikey' => 'dfe622d5a1b01ad6c9c0187716ffc9c308719eb1', 
            'request' => null, 
            'dibuat' => '2022-06-21 02:25:24', 
            'diupdate' => null, 
        ));  
 
    }
 
} 
 
$create = new api(); 
$create->buattabel();