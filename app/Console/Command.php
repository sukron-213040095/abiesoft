<?php

namespace AbieSoft\Console;

use AbieSoft\Console\Controllers\DropController;
use AbieSoft\Console\Controllers\MakeController;
use AbieSoft\Console\Database\Backup;
use AbieSoft\Console\Database\Import;
use AbieSoft\Console\Database\Refresh;
use AbieSoft\Console\Database\Restore;
use AbieSoft\Console\Models\DropModel;
use AbieSoft\Console\Models\MakeModel;
use AbieSoft\Console\Schema\DropSchema;
use AbieSoft\Console\Schema\MakeSchema;
use AbieSoft\Console\Templates\DropTemplate;
use AbieSoft\Console\Templates\MakeTemplate;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Config;

class Command
{
    public function __construct($command)
    {
        unset($command[0]);
        return match ($command[1]) {
            'start' => $this->start(),
            'help'  => self::help(),
            'generate:api'  => self::generate('api'),
            // ----- Schema
            'make:schema' => $this->schema('make', $command[2]),
            'drop.sch:schema' => $this->schema('drop.sch', $command[2]),
            'drop.db:schema' => $this->schema('drop.db', $command[2]),
            'drop.all:schema' => $this->schema('drop.all', $command[2]),
            // ----- Database
            'db:import' => $this->database(do: 'import'),
            'db:refresh' => $this->database(do: 'refresh'),
            'db:backup' => $this->database(do: 'backup'),
            'db:restore' => $this->database(do: 'restore'),
            // ----- Model
            'make:model' => $this->model('make', $command[2]),
            'drop:model' => $this->model('drop', $command[2]),
            // ----- Controller
            'make:controller' => $this->controller('make', $command[2]),
            'drop:controller' => $this->controller('drop', $command[2]),
            // ----- Template
            'make:template' => $this->template('make', $command[2]),
            'drop:template' => $this->template('drop', $command[2]),

            'default:package' => $this->package($command[2]),
            default => self::help()
        };
    }

    protected function start()
    {
        chdir('public');
        if (Config::envReader('WEB_SSL') == true) {
            $ssl = "https://";
        } else {
            $ssl = "http://";
        }
        $WebUrl = $ssl . Config::envReader('WEB_DOMAIN');
        $serverWeb = str_replace($ssl, "", $WebUrl);
        $output = null;
        $retrive = null;
        exec("php -S " . $serverWeb, $output, $retrive);
    }

    public static function help()
    {
        echo "\n";
        echo "\e[39m=======================  Abiesoft Help  ======================= \n \n";
        echo "  Perintah yang tersedia adalah :\n \n";
        echo "     Menjalankan Aplikasi \n";
        echo "          \e[32mstart\e[39m\n\n";
        echo "     Bantuan\n";
        echo "          \e[32mhelp\e[39m\n\n";
        echo "     Schema dan Database\n";
        echo "          \e[32m make:schema nama_tabel \e[39m\n";
        echo "          \e[32m drop.sch:schema nama_tabel \e[39m\n";
        echo "          \e[32m drop.db:schema nama_tabel \e[39m\n";
        echo "          \e[32m drop.all:schema nama_tabel \e[39m\n";
        echo "          \e[32m db:import \e[39m\n";
        echo "          \e[32m db:refresh \e[39m\n";
        echo "          \e[32m db:backup \e[39m\n";
        echo "          \e[32m db:restore \e[39m\n\n";
        echo "     Models\n";
        echo "          \e[32m make:model nama_model \e[39m\n";
        echo "          \e[32m drop:model nama_model \e[39m\n\n";
        echo "     Controllers\n";
        echo "          \e[32m make:controller NamaController \e[39m\n";
        echo "          \e[32m drop:controller NamaController \e[39m\n\n";
        echo "     Template\n";
        echo "          \e[32m make:template nama_folder:index \e[39m\n";
        echo "          \e[32m make:template nama_folder:baru \e[39m\n";
        echo "          \e[32m make:template nama_folder:edit \e[39m\n";
        echo "          \e[32m make:template nama_folder:detail \e[39m\n";
        echo "          \e[32m make:template nama_folder:default \e[39m\n\n";
        echo "          \e[32m drop:template nama_folder:index \e[39m\n";
        echo "          \e[32m drop:template nama_folder:baru \e[39m\n";
        echo "          \e[32m drop:template nama_folder:edit \e[39m\n";
        echo "          \e[32m drop:template nama_folder:detail \e[39m\n";
        echo "          \e[32m drop:template nama_folder:default \e[39m\n\n";
        echo "     Generate Apikey\n";
        echo "          \e[32m generate:api \e[39m\n\n";
        echo "     Default Package\n";
        echo "          \e[39m Perintah ini membantu kita membuatkan paket untuk sebuah halaman\n";
        echo "          \e[39m dari Controller, Model, Template dan Schema.\n\n";
        echo "          \e[32m default:package namapage \e[39m\n\n";
        echo "\n\e[39m=============================================================== \n \n";
    }

    public function schema($do, $command = null)
    {
        return match ($do) {
            'make' => MakeSchema::action($command),
            'drop.sch' => DropSchema::action('sch', $command),
            'drop.db' => DropSchema::action('db', $command),
            'drop.all' => DropSchema::action('all', $command),
        };
    }

    public function database($do)
    {
        return match ($do) {
            'import' => Import::action(),
            'refresh' => Refresh::action(),
            'backup' => Backup::action(),
            'restore' => Restore::action(),
        };
    }

    public function model($do, $command = null)
    {
        return match ($do) {
            'make' => MakeModel::action($command),
            'drop' => DropModel::action($command)
        };
    }

    public function controller($do, $command = null)
    {
        return match ($do) {
            'make' => MakeController::action($command),
            'drop' => DropController::action($command)
        };
    }

    public function template($do, $command = null)
    {
        return match ($do) {
            'make' => MakeTemplate::action($command),
            'drop' => DropTemplate::action($command)
        };
    }

    public function generate($model)
    {
        return match ($model) {
            'api' => $this->apikey()
        };
    }

    public function apikey()
    {
        $apikey = sha1(date('Y-m-d H:i:s'));
        $create = DB::terhubung()->input('api', array(
            'apikey' => $apikey
        ));
        if ($create) {
            echo "\e[39mApikey kamu \e[32m" . $apikey . "\e[39m";
        } else {
            echo "\e[35mGagal membuat apikey\e[39m";
        }
    }

    public function package($command)
    {
        $this->schema('make', $command);
        $this->model('make', $command);
        $this->controller('make', ucfirst($command) . "Controller");
        $this->template('make', $command . ":default");
    }
}
