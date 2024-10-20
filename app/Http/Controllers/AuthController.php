<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        $section = 1;
        if (Auth::check()) return redirect()->route('dashboard');
        return view('pages.auth',compact('section'));
    }

    public function logout(Request $request){
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (!Auth::check()) return redirect()->route('login');
        $section = 1;
        return view('pages.admin',compact('section'));
    }

    public function showForgetPasswordForm()
    {
        $section = 3;
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('pages.auth',compact('section'));
        }
    }

    public function showResetPasswordForm($token)
    {
        $section = 4;
        return view('pages.auth',compact('section','token'));
        // return view('pages.forget-password-link', ['token' => $token]);
    }

    public function customerRegistration()
    {
        $section = 5;
        return view('pages.auth',compact('section'));
        // return view('pages.forget-password-link', ['token' => $token]);
    }

    public function setting()
    {
        $section = 1;
        return view('pages.client-setting',compact('section'));
    }
}
