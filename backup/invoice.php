<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class invoice { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE invoice ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            no_invoice VARCHAR(13) NOT NULL, 
            pembayaran_id INT NULL, 
            status INT NULL, 
            total VARCHAR(6) NULL, 
            transaksi TEXT NULL, 
            users_id INT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('invoice', array(
            'dibuat' => '2022-06-23 03:46:47', 
            'diupdate' => null, 
            'id' => '3', 
            'no_invoice' => 'INV-93564d3b7', 
            'pembayaran_id' => null, 
            'status' => null, 
            'total' => null, 
            'transaksi' => null, 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('invoice', array(
            'dibuat' => '2022-06-23 13:20:25', 
            'diupdate' => null, 
            'id' => '4', 
            'no_invoice' => 'INV-07b16cf0d', 
            'pembayaran_id' => null, 
            'status' => null, 
            'total' => null, 
            'transaksi' => null, 
            'users_id' => '1', 
        ));  
 
    }
 
} 
 
$create = new invoice(); 
$create->buattabel();