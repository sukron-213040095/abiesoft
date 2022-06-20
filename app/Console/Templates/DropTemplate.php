<?php

namespace AbieSoft\Console\Templates;

use AbieSoft\Console\Command;

class DropTemplate extends Command
{

    public static function action($command = null)
    {
        $namafolder = explode(":", $command)[0];
        $namafile = explode(":", $command)[1];

        return match ($namafile) {
            "default" => self::default($namafolder),
            "index" => self::checker($namafolder, $namafile),
            "baru" => self::checker($namafolder, $namafile),
            "edit" => self::checker($namafolder, $namafile),
            "detail" => self::checker($namafolder, $namafile),
            default => parent::help()
        };
    }

    protected static function checker($namafolder, $namafile)
    {
        if (file_exists("./templates/"  . $namafolder . "/" . $namafile . ".php")) {
            echo "\e[39mYakin mau menghapus file template \e[32m" . $namafolder . "/" . $namafile . ".php\e[39m? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                unlink("./templates/"  . $namafolder . "/" . $namafile . ".php");
                echo "File \e[32m" . $namafile . ".php \e[31mdihapus\e[39m dari folder " . $namafolder;
            } else {
                echo "\e[31mdibatalkan!\e[39m";
            }
        } else {
            echo "\e[39mFile \e[32m" . $namafile . "\e[39m di folder \e[32m" . $namafolder . "\e[39m tidak ada\e[39m";
        }
    }

    protected static function default($namafolder)
    {
        if (is_dir("./templates/" . $namafolder)) {
            echo "\e[39mYakin mau menghapus folder \e[32m" . $namafolder . "\e[39m ini\e[39m? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                foreach (scandir("./templates/" . $namafolder) as $f) {
                    if (explode(".", $f)[1] == "php") {
                        unlink("./templates/" . $namafolder . "/" . $f);
                    }
                }
                rmdir("./templates/" . $namafolder);
                echo "Folder \e[32m" . $namafolder . "\e[39m berserta isi sudah dihapus\e[39m";
            } else {
                echo "\e[31mdibatalkan!\e[39m";
            }
        } else {
            echo "\e[39mFolder \e[32m" . $namafolder . "\e[39m tidak ada\e[39m";
        }
    }
}
