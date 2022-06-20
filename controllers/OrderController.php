<?php

namespace App\Controllers;

use AbieSoft\Auth\AuthController;
use AbieSoft\Http\Controller;
use AbieSoft\Models\Order;
use Nette\Utils\Html;

class OrderController extends Controller
{

    public function checkout()
    {;
        return $this->view(page: 'order/checkout', data: [
            'title' => 'Checkout Order',
            'authButton' => \App\Controllers\TemplateController::authButton()
        ]);
    }
}
