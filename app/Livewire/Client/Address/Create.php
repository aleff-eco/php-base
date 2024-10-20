<?php

namespace App\Livewire\Client\Address;

use App\Models\Address;
use App\Rules\ZipRule;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $main_street, $between_streets, $zip_code, $reference, $neighborhood;

    public function render()
    {
        return view('livewire.client.address.create');
    }

    public function save()
    {
        $this->validate([
            'main_street' => 'required|string|max:200',
            'between_streets' => 'required|string|max:200',
            'zip_code' => ['required', new ZipRule()],
            'reference' => 'required|string|max:200',
            'neighborhood' => 'required|string|max:200',
        ]);
        DB::beginTransaction();
        try {
            //
            $address = Address::create([
                'main_street' => $this->main_street,
                'between_streets' => $this->between_streets,
                'zip_code' => $this->zip_code,
                'reference' => $this->reference,
                'neighborhood' => $this->neighborhood,
                'user_id' => auth()->user()->id,
                'status_id' => 21,
            ]);
            DB::commit();
            session()->flash('status', 'Los datos se guardaron correctamente.');
            return redirect()->route('direcciones.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
        }
    }
}
