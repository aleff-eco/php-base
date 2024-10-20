<?php

namespace App\Livewire\Admin\Client;

use App\Models\Person;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $client, $user, $roles, $status, $names, $surnames, $roleId, $email, $status_id;

    public function mount(User $client)
    {
        $this->roles = Role::all();
        $this->status = Status::where('status_type_id', 1)->get();
        $this->roleId = $this->client->role_id;
        $this->status_id = $this->client->status_id;
        $this->names = $this->client->person->names; 
        $this->surnames = $this->client->person->surnames;
        $this->email = $this->client->email;
    }    

    public function render()
    {
        return view('livewire.admin.client.edit');
    }

    public function update()
    { 
        $this->validate([
            'names'     => 'required|string|max:100',
            'surnames'  => 'required|string|max:100',
            'email'     => 'required|string|max:200',
            'roleId'    => 'required|integer|exists:roles,id',
            'status_id' => 'required|integer|exists:status,id',
        ]);

        DB::beginTransaction();
        try {
            // Actualizar la persona asociada
            $this->client->person->update([
                'names'    => $this->names,
                'surnames' => $this->surnames,
            ]);
            
            // Actualizar el usuario
            $this->client->update([
                'email'     => $this->email,
                'status_id' => $this->status_id,
            ]);
            
            DB::commit();
            return redirect()->route('clients.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Hubo un error al actualizar los datos.');
        }
    }
}
