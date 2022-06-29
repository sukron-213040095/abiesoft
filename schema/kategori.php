<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class kategori
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE kategori ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        DB::terhubung()->input('kategori', array(
            'nama' => 'Aneka Bolu',
            'slug' => 'aneka-bolu',
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Kue Pengantin',
            'slug' => 'kue-pengantin'
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Kue Khitan',
            'slug' => 'kue-khitan'
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Kue Ulang Tahun',
            'slug' => 'kue-ulang-tahun'
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Tumpeng',
            'slug' => '-tumpeng'
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Pudding',
            'slug' => '-pudding'
        ));
        DB::terhubung()->input('kategori', array(
            'nama' => 'Snack Box',
            'slug' => 'snack-box'
        ));
    }
}

$create = new kategori();
$create->buattabel();
