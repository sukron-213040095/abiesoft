<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class kategori { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE kategori ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL, 
            slug VARCHAR(50) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '1', 
            'nama' => 'Aneka Bolu', 
            'slug' => 'aneka-bolu', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '2', 
            'nama' => 'Kue Pengantin', 
            'slug' => 'kue-pengantin', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '3', 
            'nama' => 'Kue Khitan', 
            'slug' => 'kue-khitan', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '4', 
            'nama' => 'Kue Ulang Tahun', 
            'slug' => 'kue-ulang-tahun', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '5', 
            'nama' => 'Tumpeng', 
            'slug' => '-tumpeng', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '6', 
            'nama' => 'Pudding', 
            'slug' => '-pudding', 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'dibuat' => '2022-06-22 11:39:13', 
            'diupdate' => null, 
            'id' => '7', 
            'nama' => 'Snack Box', 
            'slug' => 'snack-box', 
        ));  
 
    }
 
} 
 
$create = new kategori(); 
$create->buattabel();