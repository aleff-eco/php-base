<?php

namespace App\Livewire\Client;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Setting extends Component
{
    public $first_name, $second_name, $first_surname, $second_surname, $phone, $birth_date ,$email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.client.setting');
    }
    
    public function mount()
    {
        $this->first_name = auth()->user()->person->first_name;
        $this->second_name = auth()->user()->person->second_name;
        $this->first_surname = auth()->user()->person->first_surname;
        $this->second_surname = auth()->user()->person->second_surname;
        $this->phone = auth()->user()->person->phone;
        $this->birth_date = auth()->user()->person->birth_date;
        $this->email = auth()->user()->email;

        // info(auth()->user());
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:100',
            'second_name' => 'nullable|string|max:100',
            'first_surname' => 'required|string|max:100',
            'second_surname' => 'nullable|string|max:100',
            'phone' => 'required|integer|regex:/^\d{10}$/',
            'birth_date' => 'required|date_format:Y-m-d',
            'password' => 'nullable|confirmed|min:8',
            'password_confirmation' => is_null($this->password)?'nullable':'required'
            // 'email'     => 'required|string|email|max:200|unique:users,email,'.$this->user->id,
            // 'roleId'   => 'required|integer|exists:roles,id',
            // 'status_id' => ['required', 'integer', new StatusRule(1)],
            // 'sales_point_id'    => $this->role_id == 2 ? 'required|integer|exists:sales_points,id' : ''
        ]);
        
        DB::beginTransaction();
        try {
            $user = User::find(auth()->user()->id);
            $user->person->update([
                'first_name' => $this->first_name,
                'second_name' => $this->second_name,
                'first_surname' => $this->first_surname,
                'second_surname' => $this->second_surname,
                'phone' => $this->phone,
                'birth_date' => $this->birth_date,
            ]);

            if (!is_null($this->password)) {
                $user->update([
                    'password'  => Hash::make($this->password),
                ]);
            }
            // Utility::sendEmail($this->email, new NewUserMail($user, $password));

            DB::commit();
            session()->flash('success', 'Los datos se guardaron correctamente.');
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            info($th->getMessage());
            DB::rollBack();
        }
    }
}
