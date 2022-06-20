<?php

namespace AbieSoft\Console\Database;

use AbieSoft\Console\Command;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;

class Backup extends Command
{
    public static function action()
    {
        return self::checker();
    }

    /*
        Mengecek tabel apasaja yang tersedia di database
        lalu membuatkan salinan schema dan salinan file
        ke Folder Backup
    */
    protected static function checker()
    {
        $cektabel = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::envReader('DB_NAME') . "' ");
        if ($cektabel->hitung()) {
            if (!is_dir("./backup")) {
                mkdir("./backup", 0700);
            }
            foreach ($cektabel->hasil() as $tabel) {
                $namafile = $tabel->TABLE_NAME;
                $cekschema = DB::terhubung()->query("SELECT * FROM information_schema.columns WHERE table_schema = '" . Config::envReader('DB_NAME') . "' AND table_name = '{$namafile}' ");



                $createTabel = fopen("./backup/" . $namafile . ".php", "w") or die("Tidak dapat membuka file!");
                $isiDefault = "<?php \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "namespace App\Backup; \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "use AbieSoft\Mysql\DB; \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "class " . $namafile . " { \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "    public static function buattabel(){ \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "        $" . "" . "sql = 'CREATE TABLE " . $namafile . " ( \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, \n";
                fwrite($createTabel, $isiDefault);

                foreach ($cekschema->hasil() as $colom) {
                    $nama = $colom->COLUMN_NAME;
                    $tipe = strtoupper($colom->COLUMN_TYPE);
                    $null = $colom->IS_NULLABLE;
                    if ($null == 'YES') {
                        $null = "NULL";
                    } else {
                        $null = "NOT NULL";
                    }
                    if ($nama != 'id' and $nama != 'dibuat' and $nama != 'diupdate') {
                        $isiDefault = "            {$colom->COLUMN_NAME} {$tipe} {$null}, \n";
                        fwrite($createTabel, $isiDefault);
                    }
                }
                $isiDefault = "            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "            diupdate DATETIME NULL \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "        )'; \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "        DB::terhubung()->query($" . "" . "sql); \n ";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "       self::buatdata(); \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "    } \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "    public static function buatdata(){\n\n";
                fwrite($createTabel, $isiDefault);

                $cekdata = DB::terhubung()->query("SELECT * FROM {$namafile}");
                if ($cekdata->hitung()) {
                    if ($namafile != "migrasi") {
                        foreach ($cekdata->hasil() as $v) {
                            $isiDefault = "        DB::terhubung()->input('" . $namafile . "', array(\n";
                            fwrite($createTabel, $isiDefault);
                            foreach ($cekschema->hasil() as $colom) {
                                $nama = $colom->COLUMN_NAME;
                                if ($v->$nama) {
                                    $val = "'" . $v->$nama . "'";
                                } else {
                                    $val = 'null';
                                }
                                $isiDefault = "            '{$nama}' => {$val}, \n";
                                fwrite($createTabel, $isiDefault);
                            }
                            $isiDefault = "        ));  \n \n";
                            fwrite($createTabel, $isiDefault);
                        }
                    } else {
                        $isiDefault = "        //DB::terhubung()->input('" . $namafile . "', array(\n";
                        fwrite($createTabel, $isiDefault);
                        $isiDefault = "            // Input data disini \n";
                        fwrite($createTabel, $isiDefault);
                        $isiDefault = "        //));  \n \n";
                        fwrite($createTabel, $isiDefault);
                    }
                } else {
                    $isiDefault = "        //DB::terhubung()->input('" . $namafile . "', array(\n";
                    fwrite($createTabel, $isiDefault);
                    $isiDefault = "            // Input data disini \n";
                    fwrite($createTabel, $isiDefault);
                    $isiDefault = "        //));  \n \n";
                    fwrite($createTabel, $isiDefault);
                }


                $isiDefault = "    }\n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "} \n \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "$" . "" . "create = new " . $namafile . "(); \n";
                fwrite($createTabel, $isiDefault);
                $isiDefault = "$" . "" . "create->buattabel();";
                fwrite($createTabel, $isiDefault);
                fclose($createTabel);
                echo "\e[39m--- Backup tabel \e[32m" . $namafile . "\e[39m telah dibuat.\e[39m\n";
            }
        } else {
            echo "Tidak ada tabel di database " . Config::envReader('DB_NAME');
        }
    }
}
