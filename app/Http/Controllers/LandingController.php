<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{

    public function cart()
    {
        return view('keranjang.index');
    }



    public function index()
    {
        $categories = Category::all();
        $product = Product::with('category')->get();
        return view('landingpage.index', compact('product', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('Landingpage.product-detail', compact('product'));
    }



    // public function addToCart(Request $request)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->back()->with('error', 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.');
    //     }

    //     $product = Product::findOrFail($request->product_id);

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //     } else {
    //         $cart[$product->id] = [
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'quantity' => 1,
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    // }
}
