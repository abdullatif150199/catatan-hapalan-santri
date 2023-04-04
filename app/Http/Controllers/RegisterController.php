<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index () 
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store (Request $request)
    {
        // return $request->all();
        $validatedData = $request -> validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255',
            'password2' => 'required|min:3|max:255',

        ]);

        if ($validatedData['password'] !== $validatedData['password2']) {
            return redirect()->back()->with('error', 'Password harus sama');
        }

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['level'] = 'santri';

        User::create($validatedData);



        return redirect('/')->with('success', 'Registrasi Berhasil! Silahkan Login');
        ; 
    }
}
