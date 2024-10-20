<?php

namespace App\Livewire\Auth;

use App\Helpers\Utility;
use App\Mail\NewClientMail;
use App\Mail\NewUserMail;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class CustomerRegistration extends Component
{
    //public $first_name, $second_name, $first_surname, $second_surname, $phone, $birth_date, $email;
    public  $names, $surnames, $email;

    public function render()
    {
        return view('livewire.auth.customer-registration');
    }

    public function save()
    {

        $this->validate([
            'names' => 'required|string|max:50',
            'surnames' => 'nullable|string|max:50',
            // 'first_surname' => 'required|string|max:80',
            // 'second_surname' => 'nullable|string|max:80',
            'email' => 'required|string|email|max:200|unique:users,email'
            // 'phone' => 'required|integer|regex:/^\d{10}$/',
            // 'birth_date' => 'required|date_format:Y-m-d',
        ]);
        
        DB::beginTransaction();
        try {
            $employee = Person::create([
                'names' => $this->names,
                'surnames' => $this->surnames,
                // 'phone' => $this->phone,
                // 'birth_date' => $this->birth_date,
            ]);


            $password = Str::random(10);
            $user = User::create([
                'email'     => $this->email,
                'password'  => Hash::make($password),
                'status_id' => 1,
                'role_id'   => 2,
                'person_id' => $employee->id,
            ]);
            // Utility::sendEmail("diegocybac@gmail.com", new NewClientMail($user, $password));
            Utility::sendEmail($this->email, new NewUserMail($user, $password));

            DB::commit();
            session()->flash('success', 'Los datos se guardaron correctamente.');
            return redirect()->to('/');
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
        }
    }
}