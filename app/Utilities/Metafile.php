<?php

namespace AbieSoft\Utilities;

use AbieSoft\Magic\Reader;
use AbieSoft\Utilities\Config;

class Metafile
{
    public static function approver($kolom, $nama, $ukuran): string
    {
        $result = "";
        $extension = explode(".", $nama)[1];
        $cekext = self::cekextension($kolom, $extension);
        if ($cekext) {
            $cekukuran = self::cekukuran($kolom, $ukuran);
            if ($cekukuran) {
                $result = "diijinkan";
            } else {
                if ($kolom == "photo" or $kolom == "image" or $kolom == "images" or $kolom == "gambar" or $kolom == "foto") {
                    $ukuranapprove = Config::envReader("FILE_SIZE_IMAGE");
                    $result = "Ukuran lebih dari " . Reader::unitdata($ukuranapprove);
                } else {
                    $ukuranapprove = Config::envReader("FILE_SIZE_DOKUMEN");
                    $result = "Ukuran lebih dari " . Reader::unitdata($ukuranapprove);
                }
            }
        } else {
            $result = "Tipe file " . $extension . " tidak diijinkan";
        }

        return $result;
    }

    protected static function cekextension($kolom, $extention): bool
    {
        $result = false;
        $extupload = $extention;
        $extapprove = explode(",", Config::envReader("FIlE_EXT"));
        foreach ($extapprove as $tipe) {
            if ($tipe == $extupload) {
                if ($kolom == "photo" or $kolom == "image" or $kolom == "images" or $kolom == "gambar" or $kolom == "foto") {
                    if ($tipe == "jpeg" or $tipe == "jpg" or $tipe == "png" or $tipe == "gif") {
                        $result = true;
                    } else {
                        $result = false;
                    }
                } else {
                    $result = true;
                }
            }
        }
        return $result;
    }

    protected static function cekukuran($kolom, $ukuran)
    {
        if ($kolom == "photo" or $kolom == "image" or $kolom == "images" or $kolom == "gambar" or $kolom == "foto") {
            $ukuranapprove = Config::envReader("FILE_SIZE_IMAGE");
            if ($ukuran <= $ukuranapprove) {
                return true;
            } else {
                return false;
            }
        } else {
            $ukuranapprove = Config::envReader("FILE_SIZE_DOKUMEN");
            if ($ukuran <= $ukuranapprove) {
                return true;
            } else {
                return false;
            }
        }
    }
}
