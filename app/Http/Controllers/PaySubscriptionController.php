<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Orders\OrderDetails;


class PaySubscriptionController extends Controller
{

    public function store(OrderDetails $orderDetails, PaymentGateway $paymentGateway)
    {
        $order = $orderDetails->redeem();

        $sub = $paymentGateway->charge(20);

        return view('billing',['sub' => $sub]);
    }
}
