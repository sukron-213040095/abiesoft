<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class seting { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE seting ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            keterangan TEXT NULL, 
            nama VARCHAR(255) NOT NULL, 
            opsi VARCHAR(10) NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('seting', array(
            'dibuat' => '2022-06-22 11:39:14', 
            'diupdate' => null, 
            'id' => '1', 
            'keterangan' => 'Menampilkan dan menyembunyikan menu registrasi di halaman login.', 
            'nama' => 'Menu Registrasi', 
            'opsi' => 'checked', 
        ));  
 
        DB::terhubung()->input('seting', array(
            'dibuat' => '2022-06-22 11:39:14', 
            'diupdate' => null, 
            'id' => '2', 
            'keterangan' => 'Halaman Wellcome sebagai halaman utama saat aplikasi diakses', 
            'nama' => 'Halaman Wellcome', 
            'opsi' => null, 
        ));  
 
    }
 
} 
 
$create = new seting(); 
$create->buattabel();