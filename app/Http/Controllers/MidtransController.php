<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
     public function callback(Request $request)
    {
        // Data dari Midtrans
        $orderId = $request->order_id; // ini biasanya sama dengan payment->midtrans_order_id
        $status = $request->transaction_status; // "settlement", "pending", "expire", "cancel"

        $payment = Payment::where('midtrans_order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        if ($status === 'settlement') {
            $payment->status = 'success';
            $payment->paid_at = now();
        } elseif ($status === 'pending') {
            $payment->status = 'pending';
        } else {
            $payment->status = 'failed';
        }

        $payment->save();

        return response()->json(['message' => 'Payment status updated']);
    }
}
