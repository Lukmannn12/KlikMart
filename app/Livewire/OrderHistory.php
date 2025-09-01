<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderHistory extends Component
{
    public $statusFilter = 'all'; // default semua

    public function setStatus($status)
    {
        $this->statusFilter = $status;
    }

    public function render()
    {
        $query = Order::with(['items.product', 'payment', 'shipment'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');

        if ($this->statusFilter != 'all') {
            $query->whereHas('shipment', function ($q) {
                $q->where('status', $this->statusFilter);
            });
        }

        $orders = $query->get();

        return view('livewire.order-history', compact('orders'));
    }
}
