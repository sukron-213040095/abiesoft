<?php

namespace AbieSoft\Utilities;

class GetUri
{

    public static function currentPage()
    {
        if (explode("/", $_SERVER['REQUEST_URI'])[1] == "") {
            return "/";
        } else {
            return explode("/", $_SERVER['REQUEST_URI'])[1];
        }
    }

    public static function slug()
    {
        return explode("/", $_SERVER['REQUEST_URI'])[2];
    }

    public static function cekSlug($page)
    {
        $page = "/" . $page;
        if ($page == explode("?", $_SERVER['REQUEST_URI'])[0]) {
            return ltrim($_SERVER['REQUEST_URI'], '/');
        }
    }
}
