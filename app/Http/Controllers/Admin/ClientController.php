<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $section = 1;
        return view('pages.admin.client',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $section = 2;
        return view('pages.admin.client',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {   
        $section = 3;
        return view('pages.admin.client',compact('section','client'));
    }
}
