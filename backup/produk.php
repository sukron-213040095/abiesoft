<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class produk { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE produk ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            dilihat INT NULL, 
            diskon INT NULL, 
            disukai INT NULL, 
            gambar TEXT NOT NULL, 
            harga INT NOT NULL, 
            kategori_id INT NOT NULL, 
            keterangan TEXT NOT NULL, 
            laku INT NULL, 
            nama VARCHAR(255) NOT NULL, 
            publik VARCHAR(30) NULL, 
            slug VARCHAR(255) NOT NULL, 
            stok INT NULL, 
            users_id INT NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-22 11:52:16', 
            'dilihat' => null, 
            'diskon' => '12', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:32:45', 
            'gambar' => '/assets/storage/images/1/ee045de25_kue (1).jpeg', 
            'harga' => '300000', 
            'id' => '1', 
            'kategori_id' => '5', 
            'keterangan' => 'Tumpeng Nasi Kuning dengan Ayam Goreng, Telor dan Lalaban', 
            'laku' => null, 
            'nama' => 'Tumpeng Agustusan', 
            'publik' => 'publik', 
            'slug' => 'tumpeng-agustusan', 
            'stok' => '11', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-22 23:27:57', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:30:40', 
            'gambar' => '/assets/storage/images/1/147697f1e_kue (15).jpeg', 
            'harga' => '105000', 
            'id' => '5', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue ulang tahun menggunakan kue redvelvet, ukuran kuenya 18 cm,
bonus topper dan lilin ulang tahun', 
            'laku' => null, 
            'nama' => 'Kue Ulang Tahun Redvelvet 18', 
            'publik' => 'publik', 
            'slug' => 'kue-ulang-tahun-redvelvet', 
            'stok' => '5', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-22 23:31:07', 
            'dilihat' => null, 
            'diskon' => '5', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:33:30', 
            'gambar' => '/assets/storage/images/1/3cd7c5bd8_kue (9).jpeg', 
            'harga' => '360000', 
            'id' => '6', 
            'kategori_id' => '2', 
            'keterangan' => 'Kue pengantin dengan 3 tingkat kue Redvelvet', 
            'laku' => null, 
            'nama' => 'Kue pengantin', 
            'publik' => 'publik', 
            'slug' => 'kue-pengantin', 
            'stok' => '4', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-22 23:39:38', 
            'dilihat' => null, 
            'diskon' => '5', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:12:20', 
            'gambar' => '/assets/storage/images/1/0f0e5d6d4_kue (3).jpeg', 
            'harga' => '300000', 
            'id' => '7', 
            'kategori_id' => '5', 
            'keterangan' => 'Nasi kuning, ayam goreng, telor balado, lalaban dan lain-lain', 
            'laku' => null, 
            'nama' => 'Nasi Tumpeng Ulang Tahun', 
            'publik' => 'publik', 
            'slug' => 'nasi-tumpeng-ulang-tahun', 
            'stok' => '5', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 01:27:04', 
            'dilihat' => null, 
            'diskon' => '5', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:14:35', 
            'gambar' => '/assets/storage/images/2/0e3ad126b_kue (10).jpeg', 
            'harga' => '200000', 
            'id' => '8', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue Ulang Tahun dengan toping aneka buah dan di kelilingi coklat. Ukuran 20 cm', 
            'laku' => null, 
            'nama' => 'Kue Ulang Tahun Buah 20', 
            'publik' => 'publik', 
            'slug' => 'kue-ulang-tahun-buah', 
            'stok' => '7', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:32:00', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:33:00', 
            'gambar' => '/assets/storage/images/1/c7f398b9a_kue (15).jpeg', 
            'harga' => '150000', 
            'id' => '9', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue ulang tahun ukuran 20,
Kue redvelvet,
bonus topper dan lilin', 
            'laku' => null, 
            'nama' => 'Kue Ulang Tahun Redvelvet 20', 
            'publik' => 'publik', 
            'slug' => 'kue-ulang-tahun-redvelvet-20', 
            'stok' => '5', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:42:00', 
            'dilihat' => null, 
            'diskon' => '10', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:47:31', 
            'gambar' => '/assets/storage/images/2/eece20394_kue (2).jpeg', 
            'harga' => '175000', 
            'id' => '10', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue ulang tahun yang disusun dari kumpulan kue basah, terdiri dari Risol, Kue Sus, Dadar Gulung dan buah buahan', 
            'laku' => '1', 
            'nama' => 'Kue Basah Spesial Ulang Tahun', 
            'publik' => 'publik', 
            'slug' => 'kue-basah-spesial-ulang-tahun', 
            'stok' => '3', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:44:22', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:51:14', 
            'gambar' => '/assets/storage/images/2/943fdb725_kue (4).jpeg', 
            'harga' => '120000', 
            'id' => '11', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue ulang tahun dengan kombinasi buah, marsmellow, biskuit dan redvelvet. ', 
            'laku' => null, 
            'nama' => 'Kue Ulang Tahun Kombinasi 18', 
            'publik' => 'publik', 
            'slug' => 'kue-ulang-tahun-kombinasi-18', 
            'stok' => '3', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:45:28', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:51:25', 
            'gambar' => '/assets/storage/images/2/a667b91a5_kue (22).jpeg', 
            'harga' => '65000', 
            'id' => '12', 
            'kategori_id' => '6', 
            'keterangan' => 'Pudding coklat dengan toping aneka buah', 
            'laku' => '3', 
            'nama' => 'Puding Coklat dan Aneka Buah', 
            'publik' => 'publik', 
            'slug' => 'puding-coklat-dan-aneka-buah', 
            'stok' => '2', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:49:07', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:49:18', 
            'gambar' => '/assets/storage/images/2/8345bcd40_kue (26).jpeg', 
            'harga' => '130000', 
            'id' => '13', 
            'kategori_id' => '5', 
            'keterangan' => 'Bakak Ayam, Cocok buat syukuran', 
            'laku' => '1', 
            'nama' => 'Bakak Ayam', 
            'publik' => 'publik', 
            'slug' => 'bakak-ayam', 
            'stok' => '1', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 16:53:39', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 16:53:48', 
            'gambar' => '/assets/storage/images/2/d02917eb2_kue (23).jpeg', 
            'harga' => '185000', 
            'id' => '14', 
            'kategori_id' => '4', 
            'keterangan' => 'Kue ulang tahun bertabur coklat blackforest, dan beberapa buah strawberry', 
            'laku' => '2', 
            'nama' => 'Kue Ulang Tahun Blackforest', 
            'publik' => 'publik', 
            'slug' => 'kue-ulang-tahun-blackforest', 
            'stok' => '2', 
            'users_id' => '2', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 17:07:09', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:07:17', 
            'gambar' => '/assets/storage/images/1/7f6726743_kue (35).jpeg', 
            'harga' => '30000', 
            'id' => '15', 
            'kategori_id' => '1', 
            'keterangan' => 'Bolu Biasa Ukuran 20 cm', 
            'laku' => '1', 
            'nama' => 'Bolu Biasa', 
            'publik' => 'publik', 
            'slug' => 'bolu-biasa', 
            'stok' => '10', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 17:07:52', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:07:58', 
            'gambar' => '/assets/storage/images/1/07b449115_kue (36).jpeg', 
            'harga' => '35000', 
            'id' => '16', 
            'kategori_id' => '1', 
            'keterangan' => 'Bolu biasa toping pisang', 
            'laku' => null, 
            'nama' => 'Bolu Pisang', 
            'publik' => 'publik', 
            'slug' => 'bolu-pisang', 
            'stok' => '6', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 17:08:45', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:08:52', 
            'gambar' => '/assets/storage/images/1/06bc5267e_kue (37).jpeg', 
            'harga' => '1000', 
            'id' => '17', 
            'kategori_id' => '1', 
            'keterangan' => 'Kue Sus', 
            'laku' => '1', 
            'nama' => 'Kue Sus', 
            'publik' => 'publik', 
            'slug' => 'kue-sus', 
            'stok' => '50', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 17:09:30', 
            'dilihat' => null, 
            'diskon' => null, 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:09:39', 
            'gambar' => '/assets/storage/images/1/00655f3b7_kue (39).jpeg', 
            'harga' => '1000', 
            'id' => '18', 
            'kategori_id' => '1', 
            'keterangan' => 'Bolu pelangi potong', 
            'laku' => null, 
            'nama' => 'Bolu Pelangi Potong', 
            'publik' => 'publik', 
            'slug' => 'bolu-pelangi-potong', 
            'stok' => '80', 
            'users_id' => '1', 
        ));  
 
        DB::terhubung()->input('produk', array(
            'dibuat' => '2022-06-23 17:11:07', 
            'dilihat' => null, 
            'diskon' => '5', 
            'disukai' => null, 
            'diupdate' => '2022-06-23 17:12:35', 
            'gambar' => '/assets/storage/images/1/2f90ef858_kue (24).jpeg', 
            'harga' => '40000', 
            'id' => '19', 
            'kategori_id' => '6', 
            'keterangan' => 'Puding mozaik dengan agar warna warni', 
            'laku' => null, 
            'nama' => 'Puding Mozaik', 
            'publik' => 'publik', 
            'slug' => 'puding-mozaik', 
            'stok' => '3', 
            'users_id' => '1', 
        ));  
 
    }
 
} 
 
$create = new produk(); 
$create->buattabel();