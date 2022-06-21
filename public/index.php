<?php
date_default_timezone_set("Asia/Bangkok");

use AbieSoft\AbieSoftAppSystem;
use AbieSoft\Http\Route;
use AbieSoft\Auth\AuthController;
use AbieSoft\Utilities\Define;
use App\Controllers\HomeController;
use App\Controllers\KategoriController;
use App\Controllers\WebserviceController;

require_once __DIR__ . "/../vendor/autoload.php";


require_once __DIR__ . "/../vendor/PHPQRCode/qrlib.php";
require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/Exception.php";
require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/SMTP.php";

new Define;
$app = new AbieSoftAppSystem;

use App\Controllers\OrderController;
use App\Controllers\ProdukController;
use App\Controllers\ProfileController;

/*  
    Simpan setingan kamu disini 
    Route::get('/contoh', [ContohController::class, 'index']); jika method get
    Route::get('/contoh{:id}', [ContohController::class, 'index']); jika method get dan terdapat properti pada url contoh?id=...
    Route::post('/contoh', [ContohController::class, 'index']); jika method post
*/

Route::get('/profile', [ProfileController::class, 'detail']);
Route::get('/kategori/{:nama}', [KategoriController::class, 'index']);
Route::post('/produk/new', [ProdukController::class, 'new']);
Route::post('/produk/update', [ProdukController::class, 'update']);


/*
    Setingan Bawaan
    berisi halaman default
    yang disetiakan sistem
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/order/checkout', [OrderController::class, 'checkout']);
Route::sistem(AuthController::class);
Route::get('/webservice/user{:apikey}{:opsi}', [WebserviceController::class, 'profile']);
Route::get('/webservice/user{:apikey}{:tab}', [WebserviceController::class, 'tab']);
Route::get('/webservice/user{:apikey}{:list}', [WebserviceController::class, 'list']);
Route::get('/webservice/user{:apikey}{:list}{:slug}', [WebserviceController::class, 'list']);
Route::post('/webservice/profile/update', [WebserviceController::class, 'act']);
Route::post('/webservice/profile/upload', [WebserviceController::class, 'upload']);
Route::get('/webservice/formater{:tgl}', [WebserviceController::class, 'formater']);
Route::get('/webservice/produk{:apikey}{:id}{:do}', [WebserviceController::class, 'doProduk']);
$app->start();
