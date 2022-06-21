<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class grup { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE grup ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(33) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('grup', array(
            'id' => '1', 
            'nama' => 'Administrator', 
            'dibuat' => '2022-06-21 02:25:20', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('grup', array(
            'id' => '2', 
            'nama' => 'Pembeli', 
            'dibuat' => '2022-06-21 02:25:20', 
            'diupdate' => null, 
        ));  
 
    }
 
} 
 
$create = new grup(); 
$create->buattabel();