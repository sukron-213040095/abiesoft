<?php

namespace AbieSoft\Utilities;

class Hash
{
    public static function make($string, $salt = ''): string
    {
        return hash('sha256', $string . $salt);
    }

    public static function salt(): string
    {
        $charset = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!~^@#$%^&*";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -20);
    }

    public static function token(): string
    {
        $kode = substr(md5(microtime()), rand(0, 26), 5);
        $karakter = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789!@#$%^&*()');
        shuffle($karakter);
        $rand = '';
        foreach (array_rand($karakter, 5) as $k) {
            $kode .= $karakter[$k];
        }
        return $kode;
    }

    public static function unique(): string
    {
        return self::make(uniqid());
    }
}
