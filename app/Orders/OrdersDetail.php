<?php
namespace App\Orders;
use App\Billing\PaymentGateway;  


class OrdersDetail{

      private $PaymentGateway;

      public function __construct(PaymentGateway $PaymentGateway){

        $this->PaymentGateway = $PaymentGateway;
     } 

     public function all(){

        $this->PaymentGateway->setDiscount('500'); 
        return [
            'name' => 'Arslan',
            'address' => 'Lahre',
        ];

     }

}