<?php

namespace AbieSoft\Utilities;

class Tanggal
{

    public static function standar($tgl)
    {
        if (count(explode("-", $tgl)) > 2) {
            $tahun = explode("-", $tgl)[0];
            $bulan = self::mToString(ltrim(explode("-", $tgl)[1], 0));
            $tanggal = ltrim(explode(" ", explode("-", $tgl)[2])[0], 0);
            $result = $tanggal . " " . $bulan . " " . $tahun;
        } else {
            $result = "-";
        }

        return $result;
    }

    public static function edit($tgl)
    {
        if (count(explode("-", $tgl)) > 2) {
            $tahun = explode("-", $tgl)[0];
            $bulan = explode("-", $tgl)[1];
            $tanggal = explode(" ", explode("-", $tgl)[2])[0];
            $result = $tahun . "-" . $bulan . "-" . $tanggal;
        } else {
            $result = "-";
        }
        return $result;
    }

    protected static function mToString($bln)
    {
        if ($bln == 1) {
            $string = "Januari";
        } else if ($bln == 2) {
            $string = "Februari";
        } else if ($bln == 3) {
            $string = "Maret";
        } else if ($bln == 4) {
            $string = "April";
        } else if ($bln == 5) {
            $string = "Mei";
        } else if ($bln == 6) {
            $string = "Juni";
        } else if ($bln == 7) {
            $string = "Juli";
        } else if ($bln == 8) {
            $string = "Agustus";
        } else if ($bln == 9) {
            $string = "September";
        } else if ($bln == 10) {
            $string = "Oktober";
        } else if ($bln == 11) {
            $string = "November";
        } else {
            $string = "Desember";
        }
        return $string;
    }
}
