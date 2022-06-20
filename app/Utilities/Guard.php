<?php

namespace AbieSoft\Utilities;

use AbieSoft\Magic\Reader;
use AbieSoft\Mysql\DB;

class Guard
{

    public static function FormChecker($token): bool
    {
        $cektoken = DB::terhubung()->query("SELECT generate_token, ip FROM token WHERE ip = '" . Reader::ip() . "' ");

        if ($cektoken->hitung()) {
            foreach ($cektoken->hasil() as $t) {
                if ($t->generate_token === $token) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }
}
