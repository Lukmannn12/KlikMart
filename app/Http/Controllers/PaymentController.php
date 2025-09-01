<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function payment()
    {
         return view('dashboard.Payment.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,success,failed',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;

        if ($request->status === 'success') {
            $payment->paid_at = now();
        }

        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Status pembayaran berhasil diperbarui.');
    }


}
