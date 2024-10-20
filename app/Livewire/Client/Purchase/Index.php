<?php

namespace App\Livewire\Client\Purchase;

use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class Index extends Component
{    use WithPagination;
    public $search;
    
    public function boot()
    {
        Paginator::useTailwind();
    }
    public function render()
    {
        $purchase = $this->searchElement();
        return view('livewire.client.purchase.index',['purchase'=>$purchase]);
    }

    public function searchElement()
    {
        return Purchase::orderBy('created_at', 'desc')->select('*')->paginate(6);
    }
}