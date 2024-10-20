@extends('emails.layout')
@section('content')
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
                Bienvenido a {{ config('app.name') }}. Estamos emocionados de darte la bienvenida a nuestro equipo. Aquí tienes la información de tu cuenta:
            </p>
        </td>
    </tr>
    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                <strong>Nombre: </strong> {{ $user->person->names }} {{ $user->person->surnames }}
            </p>
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                <strong>Correo Electrónico: </strong> {{ $user->email }}
            </p>
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                <strong>Password: </strong> {{ $password }}
            </p>
        </td>
    </tr>
    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                Por favor, inicia sesión en el siguiente <a href="{{ config('app.url').'/login' }}">Enlace</a> o dirigiéndote al siguiente url "{{ config('app.url').'/login' }}", usando tu correo electrónico y contraseña. Asegúrate de cambiar tu contraseña después de tu primer inicio de sesión.
            </p>
        </td>
    </tr>
    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                Gracias por unirte a {{ config('app.name') }}. ¡Esperamos trabajar juntos para lograr grandes cosas!
            </p>
        </td>
    </tr>
    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;padding-bottom:40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                Saludos.
            </p>
        </td>
    </tr>
@endsection
