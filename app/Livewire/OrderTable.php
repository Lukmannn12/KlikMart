<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderTable extends Component
{
    public function render()
    {
        $query = Order::with(['orderItems.product', 'payment', 'shipment'])
            ->orderBy('created_at', 'desc');
       $orders = $query->get();

        return view('livewire.order-table', compact('orders'));
    }
}
