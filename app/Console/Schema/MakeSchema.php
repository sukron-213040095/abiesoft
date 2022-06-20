<?php

namespace AbieSoft\Console\Schema;

use AbieSoft\Console\Command;

class MakeSchema extends Command
{

    public static function action($command)
    {
        return match ($command) {
            "default" => parent::help(),
            default => self::checker($command)
        };
    }

    protected static function checker($command)
    {
        $namafile = $command;
        if (!is_dir("./schema")) {
            mkdir("./schema", 0700);
            return self::create($namafile);
        } else {
            if (!file_exists("./schema/" . $namafile . ".php")) {
                return self::create($namafile);
            } else {
                echo "\e[39mFile Schema \e[96m" . $namafile . "\e[39m sudah ada, \e[39mapakah ingin menimpanya dengan yang baru? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                    return self::create($namafile);
                } else {
                    echo "\e[31mdibatalkan!\e[39m";
                }
            }
        }
    }

    protected static function create($namafile)
    {

        $createTabel = fopen("./schema/" . $namafile . ".php", "w") or die("Tidak dapat membuka file!");
        $isiDefault = "<?php \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "namespace App\Schema; \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "use AbieSoft\Mysql\DB; \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "class " . $namafile . "\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "{\n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    public static function buattabel() \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        $" . "" . "sql = 'CREATE TABLE " . $namafile . " ( \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            /* isi format tabel anda disini */ \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP, \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            diupdate DATETIME NULL \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        )'; \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        DB::terhubung()->query($" . "" . "sql); \n ";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "       self::buatdata(); \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    } \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    public static function buatdata()\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        //DB::terhubung()->input('" . $namafile . "', array(\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        // Input data disini \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        //));  \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "} \n \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "$" . "" . "create = new " . $namafile . "(); \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "$" . "" . "create->buattabel();";
        fwrite($createTabel, $isiDefault);
        fclose($createTabel);
        echo "\e[32mSchema tabel " . $namafile . " telah dibuat.\e[39m\n";
    }
}
