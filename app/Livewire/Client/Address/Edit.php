<?php

namespace App\Livewire\Client\Address;

use App\Rules\ZipRule;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $address, $main_street, $between_streets, $zip_code, $reference, $neighborhood;

    public function render()
    {
        return view('livewire.client.address.edit');
    }

    public function mount()
    {
        $this->main_street = $this->address->main_street;
        $this->between_streets = $this->address->between_streets;
        $this->zip_code = $this->address->zip_code;
        $this->reference = $this->address->reference;
        $this->neighborhood = $this->address->neighborhood;
        // $this->status = Status::where('status_type_id', 3)->get();
    }

    public function save()
    {
        $this->validate([
            'main_street' => 'required|string|max:200',
            'between_streets' => 'required|string|max:200',
            'zip_code' => ['required','integer', new ZipRule()],
            'reference' => 'required|string|max:200',
            'neighborhood' => 'required|string|max:200',
        ]);
        DB::beginTransaction();
        try {
            //
            $this->address->update([
                'main_street' => $this->main_street,
                'between_streets' => $this->between_streets,
                'zip_code' => $this->zip_code,
                'reference' => $this->reference,
                'neighborhood' => $this->neighborhood,
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
