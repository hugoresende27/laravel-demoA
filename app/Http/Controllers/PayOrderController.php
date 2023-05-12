<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    /**
     * @param PaymentGatewayContract $paymentGateway
     * @return void
     * PaymentGateway need a parameter(currency), defined on AppServiceProvider (EUR)
     */
    public function storeExampleID(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {

//        $paymentGateway = new PaymentGateway();//instead of new(), inject dependency

        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }

    public function storeOld()
    {

        $paymentGateway = new BankPaymentGateway("EUR");

        dd($paymentGateway->charge(2500));
    }
}
