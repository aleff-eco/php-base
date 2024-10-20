<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        //
        $section = 1;
        return view('pages.admin.Inventory',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(Product $inventory)
    {
        //
        $section = 3;
        return view('pages.admin.Inventory',compact('section','inventory'));
    }
}
