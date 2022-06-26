<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class keranjang { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE keranjang ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            catatan TEXT NULL, 
            invoice_id INT NOT NULL, 
            jumlah INT NOT NULL, 
            produk_id INT NOT NULL, 
            total INT NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('keranjang', array(
            'catatan' => null, 
            'dibuat' => '2022-06-26 13:22:59', 
            'diupdate' => null, 
            'id' => '115', 
            'invoice_id' => '4', 
            'jumlah' => '1', 
            'produk_id' => '7', 
            'total' => '285000', 
        ));  
 
    }
 
} 
 
$create = new keranjang(); 
$create->buattabel();