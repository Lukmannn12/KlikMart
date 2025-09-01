<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function pesanandetail()
    {

        return view('history.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'total_amount'   => 'required|numeric|min:1',
            'selected_items' => 'required|array',
            'payment_method' => 'required|in:qris,bank_transfer',
            'courier'        => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            // 1. Buat order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $request->total_amount,
                'status' => 'pending',
            ]);

            // 2. Ambil item yang dicentang dari cart
            $cartItems = CartItem::where('user_id', Auth::id())
                ->whereIn('id', $request->selected_items)
                ->with('product')
                ->get();

            // 3. Masukkan ke order_items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // hapus dari cart
                $item->delete();
            }

            // 4. Buat Payment sesuai metode
            $paymentData = [
                'order_id'         => $order->id,
                'payment_method'   => $request->payment_method,
                'amount'           => $request->total_amount,
                'provider'         => 'midtrans',
                'status'           => 'pending',
            ];

            if ($request->payment_method === 'qris') {
                // Call Midtrans CoreAPI
                \Midtrans\Config::$serverKey    = config('midtrans.server_key');
                \Midtrans\Config::$isProduction = config('midtrans.is_production');
                \Midtrans\Config::$isSanitized  = true;

                $params = [
                    "payment_type" => "qris",
                    "transaction_details" => [
                        "order_id"      => "ORDER-" . time(),
                        "gross_amount"  => $request->total_amount,
                    ],
                    "customer_details" => [
                        "first_name" => Auth::user()->name ?? 'Guest',
                        "email"      => Auth::user()->email ?? 'guest@example.com',
                    ]
                ];

                $response = \Midtrans\CoreApi::charge($params);

                $paymentData['transaction_id']    = $response->transaction_id ?? null;
                $paymentData['midtrans_order_id'] = $response->order_id ?? null;

                // cari qris_url dari actions
                $qrisUrl = null;
                if (!empty($response->actions)) {
                    foreach ($response->actions as $action) {
                        if ($action->name === 'generate-qr-code') {
                            $qrisUrl = $action->url;
                            break;
                        }
                    }
                }
                $paymentData['qris_url'] = $qrisUrl;
            }

            $payment = Payment::create($paymentData);


            Shipment::create([
                'order_id' => $order->id,
                'courier' => $request->courier,
                'status' => 'processing',
                'tracking_number' => $this->generateTrackingNumber(10),
            ]);

            DB::commit();

            // Kalau QRIS → arahkan ke halaman pembayaran QRIS
            if ($request->payment_method === 'qris') {
                return redirect()->route('checkout.qris', $payment->id);
            }

            return redirect()->back()->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat order: ' . $e->getMessage());
        }
    }

    private function generateTrackingNumber($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $trackingNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $trackingNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $trackingNumber;
    }

    public function order()
    {
        return view('dashboard.Order.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,cancelled',
        ]);

        $order = order::findOrFail($id);

        $order->status = $request->status;


        $order->save();

        return redirect()->route('order.index')->with('success', 'Status pengiriman berhasil diperbarui.');
    }
}
