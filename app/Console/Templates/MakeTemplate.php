<?php

namespace AbieSoft\Console\Templates;

use AbieSoft\Console\Command;

class MakeTemplate extends Command
{

    public static function action($command)
    {
        $namafolder = explode(":", $command)[0];
        $namafile = explode(":", $command)[1];

        return match ($namafile) {
            "default" => self::default($namafolder, $namafile),
            "index" => self::checker($namafolder, $namafile),
            "baru" => self::checker($namafolder, $namafile),
            "edit" => self::checker($namafolder, $namafile),
            "detail" => self::checker($namafolder, $namafile),
            default => parent::help()
        };
    }

    protected static function checker($namafolder, $namafile)
    {
        if (!is_dir("./templates/" . $namafolder)) {
            mkdir("./templates/" . $namafolder, 0700);
            return self::create($namafolder, $namafile);
        } else {
            if (!file_exists("./templates/"  . $namafolder . "/" . ucfirst($namafile) . ".php")) {
                return self::create($namafolder, $namafile);
            } else {
                echo "\e[39mFile file \e[96m" . $namafile . "\e[39m sudah ada di folder template " . $namafolder . ", \e[39mapakah ingin menimpanya dengan yang baru? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if ($jawab == "Ya" || $jawab == "ya" || $jawab == "y" || $jawab == "Y") {
                    return self::create($namafolder, $namafile);
                } else {
                    echo "\e[31mdibatalkan!\e[39m";
                }
            }
        }
    }

    protected static function default($namafolder, $namafile)
    {
        if (!is_dir("./templates/" . $namafolder)) {
            mkdir("./templates/" . $namafolder, 0700);
            self::default($namafolder, $namafile);
        } else {

            $file = ['index', 'baru', 'edit', 'detail'];
            $ke = [];
            foreach ($file as $f) {
                if (!file_exists("./templates/"  . $namafolder . "/" . $f . ".php")) {
                    return self::multicreate($namafolder, $f);
                    $ke[] = 1;
                }
            }
            echo "\e[32mFile templates default untuk folder " . $namafolder . " telah dibuat.\e[39m\n";
        }
    }

    protected static function multicreate($namafolder, $namafile)
    {
        $createTabel = fopen("./templates/" . $namafolder . "/" . $namafile . ".php", "w") or die("Tidak dapat membuka file!");
        $isiDefault = "<div class='flex justify-center items-center' style='height: 74vh;'>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    <div class='text-center'>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='w-full flex justify-center'><img src='<?php echo BASEURL; ?>assets/media/images/build.svg'></div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='text-2xl p-4 font-bold'>Halaman Template</div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='py-2 px-8 bg-white rounded-full shadow-md'><span class='mr-4 font-semibold'>Edit halaman ini di : </span>templates/" . $namafolder . "/" . $namafile . ".php</div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    </div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "</div>\n";
        fwrite($createTabel, $isiDefault);
        fclose($createTabel);
        return self::default($namafolder, $namafile);
    }


    protected static function create($namafolder, $namafile)
    {
        $createTabel = fopen("./templates/" . $namafolder . "/" . $namafile . ".php", "w") or die("Tidak dapat membuka file!");
        $isiDefault = "<div class='flex justify-center items-center' style='height: 74vh;'>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    <div class='text-center'>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='w-full flex justify-center'><img src='<?php echo BASEURL; ?>assets/media/images/build.svg'></div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='text-2xl p-4 font-bold'>Halaman Template</div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        <div class='py-2 px-8 bg-white rounded-full shadow-md'><span class='mr-4 font-semibold'>Edit halaman ini di : </span>templates/" . $namafolder . "/" . $namafile . ".php</div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    </div>\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "</div>\n";
        fwrite($createTabel, $isiDefault);
        fclose($createTabel);
        echo "\e[32mFile templates " . $namafile . ".php di folder " . $namafolder . " telah dibuat.\e[39m";
    }
}
