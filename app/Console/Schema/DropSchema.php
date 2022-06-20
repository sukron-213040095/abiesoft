<?php

namespace AbieSoft\Console\Schema;

use AbieSoft\Console\Command;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;

class DropSchema extends Command
{

    public static function action($pfd, $command = null)
    {
        return match ($command) {
            "default" => parent::help(),
            default => self::check($pfd, $command)
        };
    }

    protected static function check($pfd, $command)
    {
        if (file_exists("./schema/" . $command . ".php")) {
            if (Config::envReader('WEB_STATUS') == 'production') {
                echo "\e[35mAwass!! Status aplikasi anda sudah running online,  \e[39mapakah ingin tetap melanjutkannya? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                    if ($pfd == "sch") {
                        unlink("./schema/" . $command . ".php");
                        echo "File \e[32m" . $command . ".php \e[31mdihapus\e[39m dari folder schema ";
                    } else if ($pfd == "db") {
                        DB::terhubung()->query("DELETE FROM migrasi WHERE tabel = '" . $command . "' ");
                        DB::terhubung()->query("DROP TABLE {$command}");
                        echo "Database \e[32m" . $command . " \e[31mdihapus\e[39m dari server ";
                    } else {
                        DB::terhubung()->query("DELETE FROM migrasi WHERE tabel = '" . $command . "' ");
                        DB::terhubung()->query("DROP TABLE {$command}");
                        unlink("./schema/" . $command . ".php");
                        echo "File dan tabel \e[32m" . $command . " \e[31mdihapus\e[39m dari folder schema dan server";
                    }
                } else {
                    echo "\e[31mdibatalkan!\e[39m";
                }
            } else {
                echo "\e[39mYakin mau menghapus file schema \e[32m" . $command . ".php\e[39m? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                    if ($pfd == "sch") {
                        unlink("./schema/" . $command . ".php");
                        echo "File \e[32m" . $command . ".php \e[31mdihapus\e[39m dari folder schema ";
                    } else if ($pfd == "db") {
                        DB::terhubung()->query("DELETE FROM migrasi WHERE tabel = '" . $command . "' ");
                        DB::terhubung()->query("DROP TABLE {$command}");
                        echo "Database \e[32m" . $command . " \e[31mdihapus\e[39m dari server ";
                    } else {
                        DB::terhubung()->query("DELETE FROM migrasi WHERE tabel = '" . $command . "' ");
                        DB::terhubung()->query("DROP TABLE {$command}");
                        unlink("./schema/" . $command . ".php");
                        echo "File dan tabel \e[32m" . $command . " \e[31mdihapus\e[39m dari folder schema dan server";
                    }
                } else {
                    echo "\e[31mdibatalkan!\e[39m";
                }
            }
        } else {
            echo "File \e[32m" . $command . ".php \e[31mtidak ada\e[39m di folder schema ";
        }
    }
}
