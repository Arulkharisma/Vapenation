<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentPage($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('frontend.payment', compact('order'));
    }

    public function processPayment($order_id)
    {
        // proses update status order atau redirect ke payment gateway
        return redirect('/')->with('status', 'Payment successful!');
    }
}
