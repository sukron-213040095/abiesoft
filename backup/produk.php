<?php 
namespace App\Backup; 
 
use AbieSoft\Mysql\DB; 
 
class produk { 
 
    public static function buattabel(){ 
 
        $sql = 'CREATE TABLE produk ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(30) NOT NULL, 
            gambar TEXT NOT NULL, 
            keterangan TEXT NOT NULL, 
            harga INT(11) NOT NULL, 
            stok INT(6) NOT NULL, 
            laku INT(6) NULL, 
            diskon INT(6) NULL, 
            publik VARCHAR(30) NULL, 
            dilihat INT(6) NULL, 
            disukai INT(6) NULL, 
            kategori_id INT(6) NOT NULL, 
            users_id INT(6) NOT NULL, 
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )'; 
 
        DB::terhubung()->query($sql); 
        self::buatdata(); 
 
    } 
 
    public static function buatdata(){

        DB::terhubung()->input('produk', array(
            'id' => '1', 
            'nama' => 'Kue Pengantin Red Velvet', 
            'gambar' => '/assets/storage/images/1/6da29c0e2_kue (9).jpeg', 
            'keterangan' => 'Kue pengantin dengan bahan utama red velvet', 
            'harga' => '150000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '2', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 02:48:17', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '2', 
            'nama' => 'Nasi Tumpeng Agustusan', 
            'gambar' => '/assets/storage/images/1/b3384600a_kue (1).jpeg', 
            'keterangan' => 'Nasi Tumpeng', 
            'harga' => '500000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => '10', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '5', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 02:55:03', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '3', 
            'nama' => 'Kue Ulang Tahun 2 Tingkat Rain', 
            'gambar' => '/assets/storage/images/1/603b58c93_kue (17).jpeg', 
            'keterangan' => 'Kue Ulang Tahun dengan 2 tingkat kue rainbow,
bonus topper dan lilin ulang tahun', 
            'harga' => '185000', 
            'stok' => '1', 
            'laku' => '1', 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 02:58:51', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '4', 
            'nama' => 'Nasi Tumpeng Syukuran', 
            'gambar' => '/assets/storage/images/1/5583d0419_kue (3).jpeg', 
            'keterangan' => 'Nasi Tumpeng dengan Isian Ayam Goreng, Telor Balado, Abon, dll', 
            'harga' => '500000', 
            'stok' => '1', 
            'laku' => '1', 
            'diskon' => '10', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '5', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:06:20', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '5', 
            'nama' => 'Kue Putu', 
            'gambar' => '/assets/storage/images/1/2bdd906ef_kue (5).jpeg', 
            'keterangan' => 'Kue Putu untuk snackbox atau bijian', 
            'harga' => '2000', 
            'stok' => '50', 
            'laku' => null, 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '7', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:09:10', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '6', 
            'nama' => 'Kue Rainbow Per Potong', 
            'gambar' => '/assets/storage/images/1/6f206eacb_kue (7).jpeg', 
            'keterangan' => 'Kue Rainbow Ketengan', 
            'harga' => '2000', 
            'stok' => '50', 
            'laku' => null, 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '7', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:10:23', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '7', 
            'nama' => 'Kue Ulang Tahun Redvelvet', 
            'gambar' => '/assets/storage/images/1/d8a38f055_kue (4).jpeg', 
            'keterangan' => 'Kue Ulang Tahun Redvelvet, Dengan desain sederhana tapi menarik.', 
            'harga' => '145000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => '5', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:11:17', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '8', 
            'nama' => 'Kue Ulang Tahun Buah', 
            'gambar' => '/assets/storage/images/1/23551e7ad_kue (10).jpeg', 
            'keterangan' => 'Kue Ulang Tahun bertabur buah di atasnya', 
            'harga' => '145000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => '5', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:12:12', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '9', 
            'nama' => 'Kue Ulang Tahun Love', 
            'gambar' => '/assets/storage/images/1/fc1b48534_kue (15).jpeg', 
            'keterangan' => 'Redvelvet Love', 
            'harga' => '155000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:12:55', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '10', 
            'nama' => 'Kue Ulang Tahun Bola', 
            'gambar' => '/assets/storage/images/1/6a4ce7124_kue (19).jpeg', 
            'keterangan' => 'Kue ulang tahun dengan desain labangan bola', 
            'harga' => '170000', 
            'stok' => '1', 
            'laku' => null, 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:14:31', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '11', 
            'nama' => 'Kue Ulang Tahun Blackforest  L', 
            'gambar' => '/assets/storage/images/1/ab45280eb_kue (16).jpeg', 
            'keterangan' => 'Kue Ulang Tahun Blackforest dengan coklat putih berbentuk love', 
            'harga' => '150000', 
            'stok' => '1', 
            'laku' => '1', 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:15:32', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '12', 
            'nama' => 'Ayam Bakak', 
            'gambar' => '/assets/storage/images/1/49286e768_kue (26).jpeg', 
            'keterangan' => 'Ayam bekak, cocok untuk kado sunatan atau syukuran', 
            'harga' => '110000', 
            'stok' => '1', 
            'laku' => '1', 
            'diskon' => '15', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '5', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:16:23', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '13', 
            'nama' => 'Puting Mozaik', 
            'gambar' => '/assets/storage/images/1/4463fcded_kue (24).jpeg', 
            'keterangan' => 'Puding Mozaik dengan butiran agar-agar yang dibalut dengan warna dasar putih bener-bener bikin puding terlihat cantik', 
            'harga' => '85000', 
            'stok' => '1', 
            'laku' => '6', 
            'diskon' => null, 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '6', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:17:38', 
            'diupdate' => null, 
        ));  
 
        DB::terhubung()->input('produk', array(
            'id' => '14', 
            'nama' => 'Kue Ulang Tahun 3 Hello Kity', 
            'gambar' => '/assets/storage/images/1/1771d3ef7_kue (32).jpeg', 
            'keterangan' => 'Kue Ulang Tahun 3 tumpuk Hello Kiti', 
            'harga' => '235000', 
            'stok' => '1', 
            'laku' => '3', 
            'diskon' => '10', 
            'publik' => 'draf', 
            'dilihat' => null, 
            'disukai' => null, 
            'kategori_id' => '4', 
            'users_id' => null, 
            'dibuat' => '2022-06-21 03:18:47', 
            'diupdate' => null, 
        ));  
 
    }
 
} 
 
$create = new produk(); 
$create->buattabel();