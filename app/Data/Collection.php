<?php

namespace AbieSoft\Data;

trait Collection
{
    protected static function settabel($tabel)
    {
        if ($tabel != null) {
            return $tabel;
        } else {
            $tabel = "Default";
            return $tabel;
        }
    }

    public static function getAll($tabel = null)
    {
        /*
            Fungsi untuk memanggil semua data
            yang ada pada tabel tertentu
        */
        $tabel = self::settabel($tabel);
    }

    public static function only($tabel = null)
    {
        /*
            Fungsi untuk memanggil salah satu data
            yang ada pada tabel tertentu
        */
        $tabel = self::settabel($tabel);
    }

    public static function post($tabel = null)
    {
        /*
            Fungsi untuk menyimpan data
            yang ada pada tabel tertentu
        */
        $tabel = self::settabel($tabel);
    }

    public static function update($tabel = null)
    {
        /*
            Fungsi untuk mengupdate data
            yang ada pada tabel tertentu
        */
        $tabel = self::settabel($tabel);
    }

    public static function delete($tabel = null)
    {
        /*
            Fungsi untuk menghapus data
            yang ada pada tabel tertentu
        */
        $tabel = self::settabel($tabel);
    }
}
