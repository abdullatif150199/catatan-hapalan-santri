<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function index () 
    {
        return view('login.index', [
            'title' => 'Login',

        ]);
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       if(Auth::attempt($credentials)) {
         $request->session()->regenerate();
         if (auth()->user()->level == 'admin' || auth()->user()->level == 'ustad') {
            return redirect('/dashboard');
            } elseif (auth()->user()->level == 'santri') {
             return redirect('/santriDashboard');
         };
       } 

       return back()->with('loginError', 'Login Failed');
    }


    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
