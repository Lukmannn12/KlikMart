<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'total_amount' => 'required|numeric|min:1',
            'selected_items' => 'required|array',
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
                Order_Item::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // hapus dari cart
                $item->delete();
            }


            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $request->total_amount,
                'status' => 'pending',
            ]);

            Shipment::create([
                'order_id' => $order->id,
                'courier' => $request->courier,
                'status' => 'processing',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat order: ' . $e->getMessage());
        }
    }
}
