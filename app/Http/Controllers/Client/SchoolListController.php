<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\SchoolList;
use Illuminate\Http\Request;

class SchoolListController extends Controller
{
    //
    public function schoolListProduct(SchoolList $school_list)
    {
        if ($school_list->status_id != 10) abort(404);
        $section = 4;
        return view('pages.dashboard', compact('section','school_list'));
    }

    public function checkout(Purchase $purchase)
    {
        if ($purchase->user_id != auth()->user()->id) {
            session()->flash('status', 'No tiene acceso a esta orden de paago.');
            return redirect()->route('compras.index');
        }

        if (is_null($purchase->order)) {
            session()->flash('status', 'La orden de pago no se generó en el servicio de Conekta.');
            return redirect()->route('compras.index');
        }

        if ($purchase->status_id != 14) {
            session()->flash('status', 'La orden de pago ya fue procesada.');
            return redirect()->route('compras.index');
        }

        if ($purchase->order->order_payment_status != null) {
            session()->flash('status', 'La orden de pago en Conekta tiene el siguiente estatus: '.$purchase->order->order_payment_status);
            return redirect()->route('compras.index');
        }

        return view('pages.client.conekta-payment', compact('purchase'));
    }
    
    public function paymentMade()
    {
        $code = 500;
        $message = 'Error al actualizar el status.';
        $purchase = Purchase::find(request()->purchase);
        if (!is_null($purchase)) {
            if ($purchase->status_id == 14) $purchase->update(['status_id' => 15]);
            $message = 'Status actualizado con éxito.';
            $code = 200;
        }
        return response()->json($message,$code);
    }

    public function scheduleDate(Purchase $purchase)
    {
        if ($purchase->user_id != auth()->user()->id) {
            session()->flash('status', 'No tiene acceso a esta orden de pago.');
            return redirect()->route('compras.index');
        }

        if ($purchase->status_id != 12 && $purchase->status_id <= 16) {
            session()->flash('status', 'No puede designar hora de entrega');
            return redirect()->route('compras.index');
        }

        if (!is_null($purchase->schedule_date)) {
            session()->flash('status', 'Ya se designo una fecha y horario de entrega.');
            return redirect()->route('compras.index');
        }

        $section = 2;
        return view('pages.client.schedule-date', compact('section','purchase'));
    }
}