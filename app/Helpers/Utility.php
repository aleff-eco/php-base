<?php

namespace App\Helpers;

// use App\Models\Inventory;
// use App\Models\ProductPricePurchase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Utility {
    public static function sendEmail($email, $model){
        info('listo');
        Mail::to($email)->send($model);
    }

    public static function saveImage($image, $folder){
        $name = md5($image . microtime()) . '.' . $image->extension();
        $image->storeAs('public/images/'.$folder, $name);
        return $name;
    }

    public static function deleteImage($image, $folder){
        Storage::delete('public/images/'.$folder.'/'.$image);
        return true;
    }

    // public static function quantity($id)
    // {
    //     $plus = Inventory::where([['inventory_type_id', '=', 1], ['product_id', '=', $id]])->sum('quantity');
    //     $minus = Inventory::where([['inventory_type_id', '=', 2], ['product_id', '=', $id]])->sum('quantity');

    //     $purchases = ProductPricePurchase::join('purchases', 'purchases.id', '=', 'product_price_purchases.purchase_id')
    //         ->join('product_prices', 'product_prices.id', '=', 'product_price_purchases.product_price_id')
    //         ->join('products', 'products.id', '=', 'product_prices.product_id')
    //         ->where([['product_prices.product_id', '=', $id]])
    //         ->whereIn('purchases.status_id', [12, 17, 18, 19, 20])
    //         ->select('product_price_purchases.*', 'products.name', 'purchases.status_id')
    //         ->count();
    //     return $plus - $minus - $purchases;
    // }

    public static function statusMessage($id)
    {
        $message = [];
        switch ($id) {
            case 12:
                $message =[
                    'subject' => 'Orden de Compra Pagada',
                    'message' => 'Su orden de compra fue pagada con éxito.',
                ];
                break;
            case 13:
                $message =[
                    'subject' => 'Orden de Compra Cancelado',
                    'message' => 'Su orden de compra fue Cancelada.',
                ];
                break;
            case 17:
                $message =[
                    'subject' => 'Orden de Compra en Proceso',
                    'message' => 'Su orden de compra está siendo procesada.',
                ];
                break;
            case 18:
                $message =[
                    'subject' => 'Orden de Compra Lista',
                    'message' => 'Su orden de compra ha sido embalada y está lista para su entrega/recolección.',
                ];
                break;
            case 19:
                $message =[
                    'subject' => 'Orden de Compra Enviada',
                    'message' => 'Su orden de compra ha sido enviada, quede al pendiente para recibirla.',
                ];
                break;
            case 20:
                $message =[
                    'subject' => 'Orden de Compra Finalizada',
                    'message' => 'Su orden de compra ha sido entregada, gracias por su preferencia.',
                ];
                break;
            default:
                $message =[
                    'subject' => 'Orden de Compra Finalizada',
                    'message' => 'Su orden de compra ha sido entregada, gracias por su preferencia.',
                ];
                break;
        }
        return $message;
    }
}