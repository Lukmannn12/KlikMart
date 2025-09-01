<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Component;
use Livewire\WithPagination;

class ShipmentTable extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
       $shipments = Shipment::with('order.user')
            ->when($this->search, function ($query) {
                $query->whereHas('order.user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);


        return view('livewire.shipment-table', compact('shipments'));
    }
}
