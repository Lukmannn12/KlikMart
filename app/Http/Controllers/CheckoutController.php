<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showQris(Payment $payment)
    {
    $payment->load('order.user', 'order.items.product');
    return view('checkout.qris', compact('payment'));
    }
}
