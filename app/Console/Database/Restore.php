<?php

namespace AbieSoft\Console\Database;

use AbieSoft\Console\Command;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;

class Restore extends Command
{

    public static function action()
    {
        if (Config::envReader('WEB_STATUS') == 'production') {
            echo "\e[31mAwass!! Status aplikasi anda sudah running online,\n\e[39mApakah ingin tetap melanjutkannya? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                return self::remove();
            } else {
                echo "\e[31mdibatalkan!\e[39m";
            }
        } else {
            return self::remove();
        }
    }

    protected static function remove()
    {
        $hitung = 0;
        $cektabel = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::envReader('DB_NAME') . "'");
        $jl = $cektabel->hitung();
        foreach ($cektabel->hasil() as $t) {
            $hitung++;
            DB::terhubung()->query("DROP TABLE {$t->TABLE_NAME}");
        }
        if ($jl ==  $hitung) {
            return self::semua();
        }
    }

    protected static function semua()
    {
        $statusimport = "";
        $total = 0;
        $cektabelmigrasi = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::envReader('DB_NAME') . "' AND table_name = 'migrasi'");

        if ($cektabelmigrasi->hitung()) {
            $totalfile = count(scandir("./backup")) - 2;
            foreach (scandir("./backup") as $fs => $file) {
                if ($fs != 0 and $fs != 1 and $file != "migrasi.php" and $file != "grup.php") {
                    $cekmigrasi = DB::terhubung()->query("SELECT * FROM migrasi WHERE tabel = '" . explode('.', $file)[0] . "' ");
                    if (!$cekmigrasi->hitung()) {
                        $input = DB::terhubung()->input("migrasi", array(
                            "tabel" => explode('.', $file)[0]
                        ));
                        if ($input) {
                            include "./backup/" . $file;
                            $total++;
                            if ($fs == count(scandir("./backup")) - 1) {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah direstore. \n";
                                $statusimport =  "Total restore " . $total;
                            } else {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah direstore. \n";
                            }
                        }
                    } else {
                        if ($total === 0) {
                            $statusimport =  "Semua tabel sudah direstore";
                        } else {
                            $statusimport =  "Total restore " . $total;
                        }
                    }
                }
            }
            echo $statusimport;
        } else {
            include "./backup/migrasi.php";
            include "./backup/grup.php";
            return self::semua();
        }
    }
}
