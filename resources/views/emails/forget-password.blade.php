@extends('emails.layout')
@section('content')
    {{-- <p>¡Hola {{ $user->employee->names }} {{ $user->employee->surnames }}!</p>
    <p> Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en {{ config('app.name') }}. Para
        continuar con el proceso, haz clic en el enlace a continuación:</p>
    <a href="{{ route('reset.password', ['token' => $token]) }}">[Enlace para Restablecer Contraseña]</a>
    <p>Nota: Este enlace es válido por 5 horas desde el momento en que recibiste este correo electrónico. Si
        no has solicitado restablecer tu contraseña, puedes ignorar este mensaje de correo electrónico.</p>
    <p>Si experimentas algún problema o necesitas asistencia, no dudes en responder a este correo electrónico. Estamos aquí
        para ayudarte.</p>
    <p>Gracias.</p> --}}
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0;padding-top:15px">
            <h1
                style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">
                <strong>¡Hola {{ $user->person->names }} {{ $user->person->surnames }}!</strong>
            </h1>
        </td>
    </tr>

    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en {{ config('app.name') }}. Para
                continuar con el proceso, haz clic en el enlace a continuación:
            </p>
        </td>
    </tr>
    
    <tr style="border-collapse:collapse">
        <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;">
            <span class="es-button-border"
                style="border-style:solid;border-color:#3D5CA3;background:#FFFFFF;border-width:2px;display:inline-block;border-radius:10px;width:auto">
                <a href="{{ route('reset.password', ['token' => $token]) }}" class="es-button" target="_blank"
                    style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;color:#3D5CA3;border-style:solid;border-color:#FFFFFF;border-width:15px 20px 15px 20px;display:inline-block;background:#FFFFFF;border-radius:10px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center">
                    Cambiar Contraseña
                </a>
            </span>
        </td>
    </tr>

    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-right:35px;padding-left:40px;padding-top:40px; padding-bottom:15px">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                <strong>Nota:</strong> Este enlace es válido por 1 hora desde el momento en que recibiste este correo electrónico. Si
                no has solicitado restablecer tu contraseña, puedes ignorar este mensaje de correo electrónico.
            </p>
        </td>
    </tr>
    
    {{-- <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0;padding-top:25px;padding-left:40px;padding-right:40px;padding-bottom:40px">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666">
                Si experimentas algún problema o necesitas asistencia, no dudes en responder a este correo electrónico.
                Estamos aquí para ayudarte.
            </p>
        </td>
    </tr> --}}
@endsection
