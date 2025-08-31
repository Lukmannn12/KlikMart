<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function cart()
    {
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product')
            ->get();

            // Hitung subtotal setiap item dan total harga keseluruhan
        $cartItems->each(function ($item) {
            $item->subtotal = $item->quantity * ($item->product->price ?? 0);
        });
            
        $totalHarga = $cartItems->sum('subtotal'); // Hitung total harga

        return view('keranjang.index', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        $product = Product::findOrFail($request->product_id);

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}
