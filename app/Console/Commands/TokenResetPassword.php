<?php

namespace App\Console\Commands;

use App\Helpers\Utility;
use App\Mail\NotificationMail;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TokenResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token-reset-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se eleiminaran los token de reseteo de contraseña.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $minutes = Carbon::now()->subMinutes(60);
        $passwordReset = PasswordResetTokens::where('created_at', '<', $minutes)->get();
        if (count($passwordReset) > 0) {
            foreach ($passwordReset as $token) {
                $token->delete();
            }
            $message = 'Proceso de cierre de corridas completada correctamente el día '.date('d-m-Y').' a las '.date('H:i');
            $subject = 'Proceso Automatico - Eliminación de Token de Reseteo de Contraseña';
            $user    = User::find(1);
            Utility::sendEmail('daniela@marka.com.mx', new NotificationMail($user, $subject, $message));
            info($message);
        }
    }
}
