<?php

namespace AbieSoft\Utilities;

use AbieSoft\Mysql\DB;

class Define
{

    public static bool
        $showoffRegistrasi = false,
        $showoffWellcome = false;

    public function __construct()
    {
        $cekRegistrasi = DB::terhubung()->query("SELECT * FROM seting WHERE opsi = 'checked' AND id = '1' ");
        if ($cekRegistrasi->hitung()) {
            self::$showoffRegistrasi = true;
        }

        $cekWellcome = DB::terhubung()->query("SELECT * FROM seting WHERE opsi = 'checked' AND id = '2' ");
        if ($cekWellcome->hitung()) {
            self::$showoffWellcome = true;
        }
    }
}
