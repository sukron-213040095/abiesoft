<?php

namespace AbieSoft\Utilities;

class GetUri
{

    public static function currentPage()
    {
        return explode("/", $_SERVER['REQUEST_URI'])[1];
    }

    public static function slug()
    {
        return explode("/", $_SERVER['REQUEST_URI'])[2];
    }
}