<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ConektaPayment
{
    public static function orderPayment($address, $data)
    {
        try {
            $client = is_null(auth()->user()->customer_id)
                ? [
                    'name' => auth()->user()->person->first_name . ' ' . auth()->user()->person->second_name . ' ' . auth()->user()->person->first_surname . ' ' . auth()->user()->person->second_surname,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->person->phone,
                ]
                : ['customer_id' => auth()->user()->person->customer_id];

            $products = [];
            foreach ($data as $item) {
                if ($item['quantity'] > 0) {
                    $price = $item['iva'] == 0 ? $item['price'] : $item['price'] * 0.16 + $item['price'];
                    $price = intval(round($price, 2) * 100);
                    array_push($products, [
                        'name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $price,
                    ]);
                }
            }

            if ($address == 1) {
                array_push($products, [
                    'name' => 'Envio',
                    'quantity' => 1,
                    'unit_price' => 5000,
                ]);
            }

            $headers = [
                'Accept-Language' => 'es',
                'accept' => 'application/vnd.conekta-v2.1.0+json',
                'content-type' => 'application/json',
                'Authorization' => 'Bearer ' . config('app.api_key_conekta'),
            ];

            $body = [
                'checkout' => [
                    'allowed_payment_methods' => ['card'],
                ],
                'customer_info' => $client,
                'pre_authorize' => false,
                'currency' => 'MXN',
                'line_items' => $products,
                'needs_shipping_contact' => false,
            ];

            $request = Http::withHeaders($headers)->post('https://api.conekta.io/orders', $body);
            $response = $request->json();

            return ['response' => $response, 'code' => $request->status()];
        } catch (\Throwable $th) {
            return ['response' => $th->getMessage(), 'code' => 500];
        }
    }

    public static function orderInformation($orden)
    {
        try {
            $headers = [
                'Accept-Language' => 'es',
                'accept' => 'application/vnd.conekta-v2.1.0+json',
                'content-type' => 'application/json',
                'Authorization' => 'Bearer ' . config('app.api_key_conekta'),
            ];

            $request = Http::withHeaders($headers)->get('https://api.conekta.io/orders/' . $orden);
            $response = $request->json();

            return ['response' => $response, 'code' => $request->status()];
        } catch (\Throwable $th) {
            return ['response' => $th->getMessage(), 'code' => 500];
        }
    }
}
