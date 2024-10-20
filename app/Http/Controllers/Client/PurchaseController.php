<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $section = 1;
        return view('pages.client.purchase', compact('section'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $compra)
    {
        //
        if ($compra->user_id != auth()->user()->id) {
            session()->flash('status', 'No tiene acceso para ver la siguiente información.');
            return redirect()->route('compras.index');
        }
        $section = 2;
        return view('pages.client.purchase', compact('section','compra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}
