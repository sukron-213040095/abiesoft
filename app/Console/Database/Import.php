<?php

namespace AbieSoft\Console\Database;

use AbieSoft\Console\Command;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;

class Import extends Command
{

    public static function action()
    {
        if (Config::envReader('WEB_STATUS') == 'production') {
            echo "\e[31mAwass!! Status aplikasi anda sudah running online,\n\e[39mApakah ingin menimpanya dengan yang baru? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                return self::semua();
            } else {
                echo "\e[31mdibatalkan!\e[39m";
            }
        } else {
            return self::semua();
        }
    }

    protected static function semua()
    {
        $statusimport = "";
        $total = 0;
        $cektabelmigrasi = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::envReader('DB_NAME') . "' AND table_name = 'migrasi'");

        if ($cektabelmigrasi->hitung()) {
            $totalfile = count(scandir("./schema")) - 2;
            foreach (scandir("./schema") as $fs => $file) {
                if ($fs != 0 and $fs != 1 and $file != "migrasi.php" and $file != "grup.php") {
                    $cekmigrasi = DB::terhubung()->query("SELECT * FROM migrasi WHERE tabel = '" . explode('.', $file)[0] . "' ");
                    if (!$cekmigrasi->hitung()) {
                        $input = DB::terhubung()->input("migrasi", array(
                            "tabel" => explode('.', $file)[0]
                        ));
                        if ($input) {
                            include "./schema/" . $file;
                            $total++;
                            if ($fs == count(scandir("./schema")) - 1) {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah diimport. \n";
                                $statusimport =  "Total import " . $total;
                            } else {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah diimport. \n";
                            }
                        }
                    } else {
                        if ($total === 0) {
                            $statusimport =  "Semua tabel sudah diimport";
                        } else {
                            $statusimport =  "Total import " . $total;
                        }
                    }
                }
            }
            echo $statusimport;
        } else {
            include "./schema/migrasi.php";
            include "./schema/grup.php";
            return self::semua();
        }
    }
}
