<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
            info($this->password);
            if (Auth::attempt(['password' => $this->password, 'email' => $this->email])) {
                return redirect()->route('dashboard');
            }
            $this->addError('server', 'Error en el Servidor.');
        } catch (\Throwable $th) {
            $this->addError('server', 'Error en el Servidor.');
        }
    }
}
