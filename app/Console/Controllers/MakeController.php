<?php

namespace AbieSoft\Console\Controllers;

use AbieSoft\Console\Command;

class MakeController extends Command
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
        if (!is_dir("./Controllers")) {
            mkdir("./Controllers", 0700);
            return self::create($namafile);
        } else {
            if (!file_exists("./Controllers/" . ucfirst($namafile) . ".php")) {
                return self::create($namafile);
            } else {
                echo "\e[39mFile controller \e[96m" . $namafile . "\e[39m sudah ada, \e[39mapakah ingin menimpanya dengan yang baru? \e[93mYa [\e[39mKetik \e[96mYa\e[93m] / Tidak [\e[39mEnter\e[93m] \e[39m : ";
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
        $createTabel = fopen("./Controllers/" . ucfirst($namafile) . ".php", "w") or die("Tidak dapat membuka file!");
        $isiDefault = "<?php \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "namespace App\Controllers; \n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "use AbieSoft\Http\Controller; \n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "use AbieSoft\Models\\" . explode('Controller', $namafile)[0] . ";\n\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "class " . ucfirst($namafile) . " extends Controller\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "{\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function index()\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            file index sebuah controller\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk mengarahkan ke template gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return $" . "" . "this->view(page: '" . strtolower(explode("Controller", $namafile)[0]) . "/index', data: []);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function tabel()\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            function ini digunakan untuk memanggil data tabel\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            data ini digunakan jika menggunakan tabel dari DataTabel Via ajax\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            Outputnya berupa json\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function konfirmasi($" . "" . "id)\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            function ini digunakan untuk memanggil identitas data\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            identitas ini digunakan untuk function delete\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            Outputnya berupa string\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function baru()\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            digunakan untuk membuat halaman input data\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            atau halaman tambah data\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return $" . "" . "this->view(page: '" . strtolower(explode("Controller", $namafile)[0]) . "/baru', data: []);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function edit($" . "" . "id)\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            digunakan untuk membuat halaman edit data\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk mengirim data di sebuah template gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return $" . "" . "this->view(page: '" . strtolower(explode("Controller", $namafile)[0]) . "/edit', data: []);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function detail($" . "" . "id)\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            digunakan untuk membuat halaman detail sebuah data\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk mengirim data di sebuah template gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return $" . "" . "this->view(page: '" . strtolower(explode("Controller", $namafile)[0]) . "/detail', data: []);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function postCreate()\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            landing method post baru yang dikirim dari template\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk menghubungkan method ke model gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return " . explode("Controller", $namafile)[0] . "::post();\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function postUpdate($" . "" . "id)\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            landing method post update yang dikirim dari template\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk menghubungkan method ke model gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return " . explode("Controller", $namafile)[0] . "::update($" . "" . "id);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "    public function postDelete($" . "" . "id)\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    {\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        /*\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            landing method post delete yang dikirim dari template\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            untuk menghubungkan method ke model gunakan script berikut\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "            return " . explode("Controller", $namafile)[0] . "::delete($" . "" . "id);\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "        */\n";
        fwrite($createTabel, $isiDefault);
        $isiDefault = "    }\n";
        fwrite($createTabel, $isiDefault);

        $isiDefault = "}\n\n";
        fwrite($createTabel, $isiDefault);
        fclose($createTabel);
        echo "\e[32m" . $namafile . " telah dibuat.\e[39m\n";
    }
}
