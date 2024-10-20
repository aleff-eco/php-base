<?php

namespace App\Livewire\Auth;

use App\Helpers\Utility;
use App\Mail\ForgetPasswordMail;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class ForgetPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.auth.forget-password');
    }

    public function store()
    {
        // $this->email = 'vendedor@test.com';
        $this->validate([
            'email' => 'required|email|exists:users',
        ]);
        DB::beginTransaction();
        try {
            $token = $this->generateToken();
            $resetToken = PasswordResetTokens::where('email',$this->email)->first();

            if (is_null($resetToken)) {
                PasswordResetTokens::create([
                    'email' => $this->email,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
            }else{
                $resetToken->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
            }

            $user = User::where('email', $this->email)->first();
            Utility::sendEmail($this->email, new ForgetPasswordMail($user, $token));
            
            DB::commit();
            session()->flash('success', 'Revise su correo electrónico y siga las instrucciones correspondientes.');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            //throw $th;
            info($th->getMessage());
            DB::rollBack();
            $this->addError('server', 'Error del Servidor.');
        }
    }
    public function generateToken()
    {
        $token = '';
        do {
            $token = Str::random(64);
        } while (PasswordResetTokens::where('token', $token)->exists());
        return $token;
    }
}
