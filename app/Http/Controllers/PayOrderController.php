<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGateway;  
use App\Orders\OrdersDetail;  


class PayOrderController extends Controller
{
    public function store(OrdersDetail $OrdersDetail, PaymentGateway $PaymentGateway){
        
             $order = $OrdersDetail->all();
             dd($PaymentGateway->charge('2500'));  
    }
}
