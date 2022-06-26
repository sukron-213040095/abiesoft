<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class suka { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE suka ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            produk_id INT NOT NULL, 
            users_id INT NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:15:45', 
            'diupdate' => null, 
            'id' => '18', 
            'produk_id' => '6', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:27:01', 
            'diupdate' => null, 
            'id' => '32', 
            'produk_id' => '15', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:32:04', 
            'diupdate' => null, 
            'id' => '44', 
            'produk_id' => '8', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:32:59', 
            'diupdate' => null, 
            'id' => '48', 
            'produk_id' => '9', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:34:57', 
            'diupdate' => null, 
            'id' => '50', 
            'produk_id' => '10', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:50:26', 
            'diupdate' => null, 
            'id' => '55', 
            'produk_id' => '1', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:51:31', 
            'diupdate' => null, 
            'id' => '57', 
            'produk_id' => '17', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-23 22:55:01', 
            'diupdate' => null, 
            'id' => '58', 
            'produk_id' => '5', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-24 08:46:20', 
            'diupdate' => null, 
            'id' => '62', 
            'produk_id' => '12', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-24 08:46:25', 
            'diupdate' => null, 
            'id' => '64', 
            'produk_id' => '19', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-24 08:46:34', 
            'diupdate' => null, 
            'id' => '65', 
            'produk_id' => '18', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('suka', array(
            'dibuat' => '2022-06-24 11:09:42', 
            'diupdate' => null, 
            'id' => '67', 
            'produk_id' => '13', 
            'users_id' => '2', 
        ));  
 
    }
 
} 
 
$create = new suka(); 
$create->buattabel();