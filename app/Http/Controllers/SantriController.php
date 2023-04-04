<?php

namespace App\Http\Controllers;
use App\Models\Hapalan;

use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index () 
    {
        return view('dashboard.santri.index', [
            'hapalans' => Hapalan::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
