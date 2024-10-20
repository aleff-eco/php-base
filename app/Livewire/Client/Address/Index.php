<?php

namespace App\Livewire\Client\Address;

use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class Index extends Component
{
    use WithPagination;
    public $modalOpen = false;
     // cambiar a false

    public $search;
    
    public function render()
    {
        $address = $this->searchElement();
        return view('livewire.client.address.index',['address'=>$address]);
    }

    public function boot()
    {
        Paginator::useTailwind();
    }
    
    public function searchElement()
    {
        return Address::where('zip_code','like', '%' . $this->search . '%')
        ->where([
            ['user_id','=',auth()->user()->id],
            ['status_id','=','21']
        ])->paginate(3);
    }

    public function deleteAddress($address_id){
        // info($address_id);
        $address = Address::find($address_id);
        if (!is_null($address)) {
            $address->update(['status_id'=>22]);
            $this->modalOpen = false;
        }
    }

    public function openModal(){
        $this->modalOpen = true;
    }
    public function closeModal()
    {
        $this->modalOpen = false;
    }
}