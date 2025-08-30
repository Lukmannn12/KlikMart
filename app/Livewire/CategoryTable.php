<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(5);

        return view('livewire.category-table', [
            'categories' => $categories
        ]);
    }
}
