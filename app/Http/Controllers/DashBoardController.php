<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    public function home()
    {
        $section = 1;
        return view('pages.dashboard', compact('section'));
    }

    public function informacion()
    {
        $section = 2;
        return view('pages.dashboard', compact('section'));
    }

    public function productos()
    {
        $section = 3;
        return view('pages.dashboard', compact('section'));
    }

    public function ver($id)
    {
        $section = 4;
        return view('pages.dashboard', compact('section', 'id'));
    }

        public function nosotros()
    {
        $section = 5;
        return view('pages.dashboard', compact('section'));
    }

    public function contactanos()
    {
        $section = 6;
        return view('pages.dashboard', compact('section'));
    }
}
