<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $payments = Payment::with('order.user')
            ->when($this->search, function ($query) {
                $query->whereHas('order.user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.payment-table', compact('payments'));
    }
}
