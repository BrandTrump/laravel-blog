<?php


namespace App\Billing;


class PaymentGateway
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }


    public function charge($amount)
    {
        $currency = $this->currency;
        $discount = $this->discount;

        return ['$' . ($amount - $this->discount), $currency, '$'. $discount];
    }
}