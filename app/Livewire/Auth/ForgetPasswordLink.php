<?php

namespace App\Livewire\Auth;

use App\Helpers\Utility;
use App\Mail\NotificationMail;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetPasswordLink extends Component
{
    public $token, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.forget-password-link');
    }

    public function store()
    {
        // $this->email = 'vendedor@test.com';
        // $this->password = '123456';
        // $this->password_confirmation = '123456';
        $this->validate([
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $passwordToken = PasswordResetTokens::where([
                'token' => $this->token,
            ])->first();

            if (is_null($passwordToken)) {
                info('El token de recuperación de contraseña expiro o no corresponde al email proporcionado, vuelva a solicitar uno desde la opción “¿Olvido su contraseña?”.');
                session()->flash('error', 'El token de recuperación de contraseña expiro o no corresponde al email proporcionado, vuelva a solicitar uno desde la opción “¿Olvido su contraseña?”.');
                return redirect()->route('logIn');
            }

            $user = User::where('email', $passwordToken->email)->first();
            $user->update(['password' => Hash::make($this->password)]);
            $passwordToken->delete();
            $subject = 'Contraseña Actualizada.';
            $message = 'Tu contraseña ha sido actualizada correctamente, para iniciar sesión accede desde el portal de nuestra página principal.';
            Utility::sendEmail($user->email, new NotificationMail($user, $subject, $message));

            DB::commit();
            session()->flash('success', 'Contraseña actualizada correctamente.');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            info($th->getMessage());
            DB::rollBack();
            $this->addError('server', 'Error del Servidor.');
        }
    }
}
