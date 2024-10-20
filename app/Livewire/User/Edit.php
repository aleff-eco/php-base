<?php

namespace App\Livewire\User;

use App\Models\Person;
use App\Models\Role;
use App\Models\Status; // Importa el modelo Status
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $user, $roles, $status, $names, $surnames, $roleId, $email, $status_id;

    public function mount()
    {
        // Cargar roles y status
        $this->roles = Role::all();
        $this->status = Status::where('status_type_id', 1)->get();
        $this->roleId = $this->user->role_id;
        $this->status_id = $this->user->status_id;
        $this->names = $this->user->person->names;
        $this->surnames = $this->user->person->surnames;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.user.edit');
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
            $this->user->person->update([
                'names'    => $this->names,
                'surnames' => $this->surnames,
            ]);
            
            // Actualizar el usuario
            $this->user->update([
                'email'     => $this->email,
                'role_id'   => $this->roleId,
                'status_id' => $this->status_id,
            ]);
            
            DB::commit();
            //session()->flash('success', 'Los datos se actualizaron correctamente.');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Hubo un error al actualizar los datos.');
        }
    }
}
