<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class kategori { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE kategori ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('kategori', array(
            'id' => '1', 
            'nama' => 'Aneka Kue', 
            'dibuat' => '2022-06-21 02:25:20', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '2', 
            'nama' => 'Kue Pengantin', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '3', 
            'nama' => 'Kue Khitan', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '4', 
            'nama' => 'Kue Ulang Tahun', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '5', 
            'nama' => 'Tumpeng', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '6', 
            'nama' => 'Puding', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('kategori', array(
            'id' => '7', 
            'nama' => 'Snack Box', 
            'dibuat' => '2022-06-21 02:25:21', 
            'diupdate' => null, 
        ));  
 
    }
 
} 
 
$create = new kategori(); 
$create->buattabel();