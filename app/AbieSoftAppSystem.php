<?php

namespace AbieSoft;

use AbieSoft\Http\Route;

class AbieSoftAppSystem
{

    public function start()
    {
        $route = new Route;
        $route->setCurrentPage();
    }
}