<?php

namespace AbieSoft\Console\Models;

use AbieSoft\Console\Command;

class MakeModel extends Command
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
        if (!is_dir("./Models")) {
            mkdir("./Models", 0700);
            return self::create($namafile);
        } else {
            if (!file_exists("./Models/" . ucfirst($namafile) . ".php")) {
                return self::create($namafile);
            } else {
                echo "\e[39mFile model \e[96m" . $namafile . "\e[39m sudah ada, \e[39mapakah ingin menimpanya dengan yang baru? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
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
        $createTabel = fopen("./Models/" . ucfirst($namafile) . ".php", "w") or die("Tidak dapat membuka file!");
        $isiDefault = "<?php \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "namespace App\Models; \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "use AbieSoft\Data\Collection; \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "class " . ucfirst($namafile) . "\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "{\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "     use Collection;\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "}\n";
        fwrite($createTabel, $isiDefault);
        fclose($createTabel);
        echo "\e[32mModel " . $namafile . " telah dibuat.\e[39m\n";
    }
}
