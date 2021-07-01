<?php


namespace App\Orders;


use App\Billing\PaymentGateway;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function redeem()
    {
        $this->paymentGateway->setDiscount(0);
    }

}