<?php

namespace App\Controllers;

use AbieSoft\Http\Controller;
use AbieSoft\Models\Keranjang;
use AbieSoft\Mysql\DB;
use AbieSoft\Utilities\Format;
use AbieSoft\Utilities\Input;

class KeranjangController extends Controller
{

    public function new()
    {
        $idproduk = Input::get('idproduk');
        $hargaitem = Input::get('hargaitem');

        $cekdiskon = DB::terhubung()->query("SELECT id,diskon FROM produk WHERE id = '" . $idproduk . "' AND diskon = 0  ");
        if ($cekdiskon->hitung()) {
            $hargaasli = Input::get('hargaasli');
        } else {
            $hargaasli = 0;
        }


        $qty = Input::get('qty');
        $total = 0;
        if ($hargaasli == 0) {
            $total = $qty * $hargaitem;
        } else {
            $total = $qty * $hargaasli;
        }

        $data = "";


        $cekinvoice = DB::terhubung()->query("SELECT users_id FROM invoice WHERE users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ");

        if (!$cekinvoice->hitung()) {

            $noinvoice = "INV-" . substr(sha1(date('YmdHis')), 4, 9);

            $input = DB::terhubung()->input('invoice', array(
                'no_invoice' => $noinvoice,
                'users_id' => \AbieSoft\Auth\AuthController::getID()
            ));

            if ($input) {

                $selectinvoice = DB::terhubung()->query("SELECT id, users_id FROM invoice WHERE users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ");
                foreach ($selectinvoice->hasil() as $i) {
                    $invoiceid = $i->id;
                }
                $inputkeranjang = DB::terhubung()->input('keranjang', array(
                    'invoice_id' => $invoiceid,
                    'produk_id' => $idproduk,
                    'jumlah' => $qty,
                    'total' => $total
                ));
                if ($inputkeranjang) {
                    $data = [
                        [
                            'message' => 'Item ditambahkan'
                        ]
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        [
                            'message' => 'Cancel'
                        ]
                    ];
                    echo json_encode($data);
                }
            } else {
                $data = [
                    [
                        'message' => 'Cancel'
                    ]
                ];
                echo json_encode($data);
            }
        } else {

            $selectinvoice = DB::terhubung()->query("SELECT id, users_id FROM invoice WHERE users_id = '" . \AbieSoft\Auth\AuthController::getID() . "' ");
            foreach ($selectinvoice->hasil() as $i) {
                $invoiceid = $i->id;
            }

            $cekitem = DB::terhubung()->query("SELECT * FROM keranjang WHERE invoice_id = '" . $invoiceid . "' AND produk_id ='" . $idproduk . "' ");
            if ($cekitem->hitung()) {
                foreach ($cekitem->hasil() as $ci) {
                    $idkeranjang = $ci->id;
                }

                $perbarui = DB::terhubung()->perbarui('keranjang', $idkeranjang, array(
                    'produk_id' => $idproduk,
                    'jumlah' => $qty,
                    'total' => $total
                ));

                if ($perbarui) {
                    $data = [
                        [
                            'message' => 'Item diperbarui'
                        ]
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        [
                            'message' => 'Cancel'
                        ]
                    ];
                    echo json_encode($data);
                }
            } else {
                $inputkeranjang = DB::terhubung()->input('keranjang', array(
                    'invoice_id' => $invoiceid,
                    'produk_id' => $idproduk,
                    'jumlah' => $qty,
                    'total' => $total
                ));
                if ($inputkeranjang) {
                    $data = [
                        [
                            'message' => 'Item ditambahkan'
                        ]
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        [
                            'message' => 'Cancel'
                        ]
                    ];
                    echo json_encode($data);
                }
            }
        }
    }

    public static function cart()
    {
        $selectinvoice = DB::terhubung()->query("SELECT id, users_id FROM invoice WHERE users_id ='" . \AbieSoft\Auth\AuthController::getID() . "' ");
        if ($selectinvoice->hitung()) {
            foreach ($selectinvoice->hasil() as $i) {
                $idinvoice = $i->id;
                $cekitiem = DB::terhubung()->query("SELECT * FROM keranjang WHERE invoice_id = '" . $idinvoice . "' ");
                if ($cekitiem->hitung()) {
                    $harga = [];
                    $item = [];
                    foreach ($cekitiem->hasil() as $h) {
                        $harga[] = $h->total;
                        $item[] = $h->jumlah;
                    }

                    $data = [
                        [
                            'message' => 'Cancel',
                            'total' => array_sum($harga),
                            'item' => array_sum($item)
                        ]
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        [
                            'message' => 'Cancel'
                        ]
                    ];
                    echo json_encode($data);
                }
            }
        } else {
            $data = [
                [
                    'message' => 'Cancel'
                ]
            ];
            echo json_encode($data);
        }
    }
}
