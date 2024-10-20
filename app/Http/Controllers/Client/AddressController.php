<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressPurchase;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $section = 1;
        return view('pages.client.address', compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (count(auth()->user()->addresses) >= 5) {
            session()->flash('status', 'Solo se puede generar 5 direcciones por persona.');
            return redirect()->route('compras.index');
        }
        $section = 2;
        return view('pages.client.address', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $direccione)
    {
        //
        if ($direccione->user_id != auth()->user()->id || $direccione->status_id == 22) {
            abort(404);
        }

        $purchases = AddressPurchase::join('purchases','purchases.id','=','address_purchases.purchase_id')
        ->where('address_purchases.address_id',$direccione->id)
        ->whereIn('purchases.status_id',[12,17,18,19])
        ->select('address_purchases.*','purchases.status_id')->count();
        
        if ($purchases > 0) {
            
            return redirect()->route('direcciones.index');
        }

        $section = 3;
        return view('pages.client.address', compact('section', 'direccione'));
    }
}
