<?php

namespace AbieSoft\Utilities;

class Cookies
{
    public static function ada(string $nama): bool
    {
        return isset($_COOKIE[$nama]) ? true : false;
    }

    public static function simpan(string $nama, string $value): string
    {
        return setcookie($nama, $value);
    }

    public static function lihat(string $nama): string
    {
        return $_COOKIE[$nama];
    }

    public static function hapus(string $nama)
    {
        if (self::ada($nama)) {
            unset($_COOKIE[$nama]);
            setcookie($nama, null);
        }
    }
}
