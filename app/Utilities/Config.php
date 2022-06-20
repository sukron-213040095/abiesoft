<?php

namespace AbieSoft\Utilities;

class Config
{

    public static function envReader($envRequest = null): string
    {
        $env = parse_ini_file(__DIR__ . "/../../.env");
        return $env[$envRequest];
    }
}
