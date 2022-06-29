<?php

namespace  AbieSoft\Package;

use AbieSoft\Utilities\Config;
use QRcode;

class QRCodeGenerate
{
    public static function make(string $nama, string $value)
    {
        $PNG_TEMP_DIR = __DIR__ . '/../../' . \AbieSoft\Utilities\Config::envReader('PUBLIC_FOLDER') . '/assets/storage/barcode/';
        $PNG_WEB_DIR = __DIR__ . '/../../' . \AbieSoft\Utilities\Config::envReader('PUBLIC_FOLDER') . '/assets/storage/barcode/';
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        $filename = $PNG_TEMP_DIR . $nama . '.png';
        $errorCorrectionLevel = Config::envReader('QR_LEVEL');
        $matrixPointSize = Config::envReader('QR_SIZE');
        QRcode::png($value, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}
