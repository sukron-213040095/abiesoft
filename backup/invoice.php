<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class invoice { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE invoice ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            no_invoice VARCHAR(13) NOT NULL, 
            transaksi TEXT NOT NULL, 
            total VARCHAR(6) NOT NULL, 
            status INT(6) NULL, 
            pembayaran_id INT(6) NOT NULL, 
            users_id INT(6) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        //DB::terhubung()->input('invoice', array(
            // Input data disini 
        //));  
 
    }
 
} 
 
$create = new invoice(); 
$create->buattabel();