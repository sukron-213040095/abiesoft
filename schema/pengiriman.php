<?php

namespace App\Schema;

use AbieSoft\Mysql\DB;

class pengiriman
{

    public static function buattabel()
    {
        $sql = 'CREATE TABLE pengiriman ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            no_resi VARCHAR(255) NOT NULL UNIQUE,
            invoice_id VARCHAR(255) NOT NULL,
            alamat_id INT(6) NOT NULL,
            kurir_id INT(6) NOT NULL,
            status_pengiriman INT(6) NOT NULL,
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, 
            diupdate DATETIME NULL 
        )';

        /*
            Status pengiriman diisi angka
            0 Pesanan diterima (Status jika pembelian sudah dilakukan namun belum dibayar)
            1 Pesanan sedang dibuat (Jika status invoicenya sudah dibayar) -- Status diperbarui oleh penjual
            2 Pesanan dikirim -- Status diperbarui penjual
            3 Pesanan diterima/ Selesai -- Status diperbarui oleh pembeli atau jika tidak ada konfirmasi dari pembeli status akan berubah secara otomatis dalam waktu seminggu.
        */

        DB::terhubung()->query($sql);
        self::buatdata();
    }

    public static function buatdata()
    {
        /*
            DB::terhubung()->input('pengiriman', array(
                
            ));
        */
    }
}

$create = new pengiriman();
$create->buattabel();
