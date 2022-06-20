<?php

namespace AbieSoft\Magic;

use AbieSoft\Mysql\DB;

class Reader
{

    public static function ip(): string
    {
        $ip = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ip = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'Ip Tidak Dikenali';
        }
        return $ip;
    }

    public static function token()
    {
        $cektoken = DB::terhubung()->query("SELECT * FROM token WHERE ip = '" . self::ip() . "' ");
        if ($cektoken->hitung()) {
            foreach ($cektoken->hasil() as $token) {
                return $token->generate_token;
            }
        }
    }

    public static function unitdata($ukuran)
    {
        $satuan = "";
        $nilai = "";
        if (strlen($ukuran) == "4") {
            $satuan = "KB";
            $nilai = substr($ukuran, 0, 1);
        } else if (strlen($ukuran) == "5") {
            $satuan = "KB";
            $nilai = substr($ukuran, 0, 2);
        } else if (strlen($ukuran) == "6") {
            $satuan = "KB";
            $nilai = substr($ukuran, 0, 3);
        } else if (strlen($ukuran) == "7") {
            $satuan = "MB";
            $nilai = substr($ukuran, 0, 1);
        } else if (strlen($ukuran) == "8") {
            $satuan = "MB";
            $nilai = substr($ukuran, 0, 2);
        } else if (strlen($ukuran) == "9") {
            $satuan = "MB";
            $nilai = substr($ukuran, 0, 3);
        } else if (strlen($ukuran) == "10") {
            $satuan = "TB";
            $nilai = substr($ukuran, 0, 1);
        } else if (strlen($ukuran) == "11") {
            $satuan = "TB";
            $nilai = substr($ukuran, 0, 2);
        } else if (strlen($ukuran) == "12") {
            $satuan = "TB";
            $nilai = substr($ukuran, 0, 3);
        } else {
            $satuan = "B";
            $nilai = $ukuran;
        }

        return $nilai . $satuan;
    }
}
