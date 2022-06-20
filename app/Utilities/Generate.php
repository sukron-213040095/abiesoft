<?php

namespace AbieSoft\Utilities;

use AbieSoft\Magic\Reader;
use AbieSoft\Mysql\DB;

class Generate
{

    public static function token(): bool
    {
        $token =  substr(bin2hex(openssl_random_pseudo_bytes(16)), 5, 9);
        $cektoken = DB::terhubung()->query("SELECT * FROM token WHERE ip = '" . Reader::ip() . "' ");
        if ($cektoken->hitung()) {
            foreach ($cektoken->hasil() as $ct) {
                $settoken = DB::terhubung()->perbarui("token", $ct->id, array(
                    'generate_token' => $token,
                    'diupdate' => date('Y-m-d H:i:s')
                ));
            }
        } else {
            $settoken = DB::terhubung()->input("token", array(
                'generate_token' => $token,
                'ip' => Reader::ip()
            ));
        }
        return false;
    }
}
