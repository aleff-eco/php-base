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
                {{ $text }}
            </p>
        </td>
    </tr>
    <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-left:40px;padding-right:40px;padding-top:40px;padding-bottom: 40px;">
            <p
                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center">
                Saludos.
            </p>
        </td>
    </tr>
@endsection
