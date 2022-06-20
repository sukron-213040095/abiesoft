<?php

namespace AbieSoft\Http;

class Lanjut
{

    public static function ke($location = null)
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'templates/theme/error/404.php.latte';
                        exit();
                }
            }
            header('location:' . $location);
            exit();
        }
    }
}
