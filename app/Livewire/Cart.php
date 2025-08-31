<?php

namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $selectedItems = []; // item yang dipilih user

    public function render()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // ambil hanya item yang dipilih
       $selectedCartItems = $cartItems->whereIn('id', $this->selectedItems);

        // hitung total
        $total = $selectedCartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('livewire.cart', [
            'cartItems' => $cartItems,
            'selectedCartItems' => $selectedCartItems,
            'total' => $total,
        ]);
    }
}
