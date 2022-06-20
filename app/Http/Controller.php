<?php

namespace AbieSoft\Http;

use Latte\Engine;

class Controller
{

    public function view($page, $data = null)
    {
        $dir = __DIR__ . '/../../';
        $latte = new Engine;
        $latte->setTempDirectory($dir . 'temp');
        $latte->render($dir . 'templates/page/' . $page . '.php.latte', $data);
        $latte->setAutoRefresh(true);
    }
}
