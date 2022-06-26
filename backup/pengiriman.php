<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class pengiriman { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE pengiriman ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            alamat_id INT NOT NULL, 
            invoice_id VARCHAR(10) NOT NULL, 
            kurir_id INT NOT NULL, 
            no_resi VARCHAR(13) NOT NULL, 
            status_pengiriman INT NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        //DB::terhubung()->input('pengiriman', array(
            // Input data disini 
        //));  
 
    }
 
} 
 
$create = new pengiriman(); 
$create->buattabel();