<?php

namespace AbieSoft\Console\Controllers;

use AbieSoft\Console\Command;

class DropController extends Command
{

    public static function action($command = null)
    {
        return match ($command) {
            "default" => parent::help(),
            default => self::check($command)
        };
    }

    protected static function check($command)
    {
        if (file_exists("./Controllers/" . ucfirst($command) . ".php")) {
            echo "\e[39mYakin mau menghapus file controllers \e[32m" . ucfirst($command) . ".php\e[39m? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                unlink("./Controllers/" . $command . ".php");
                echo "File \e[32m" . $command . ".php \e[31mdihapus\e[39m dari folder controllers ";
            } else {
                echo "\e[31mdibatalkan!\e[39m";
            }
        } else {
            echo "File \e[32m" . ucfirst($command) . ".php \e[31mtidak ada\e[39m di folder controllers ";
        }
    }
}