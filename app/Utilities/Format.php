<?php

namespace AbieSoft\Utilities;

class Format
{
    public static function uang(int $angka)
    {
        return number_format($angka, 0, '', '.');
    }

    public static function simpel(string $text, int $max)
    {
        if (strlen($text) < $max) {
            return substr($text, 0, $max);
        } else {
            return substr($text, 0, $max - 3) . "...";
        }
    }
}
