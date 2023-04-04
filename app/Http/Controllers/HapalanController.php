<?php

namespace App\Http\Controllers;
use App\Models\Hapalan;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class HapalanController extends Controller
{
    function create($request)
    {
        return view('dashboard.hapalan.create', [
            'id' => $request
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request -> validate([
            'tanggal' => 'required|max:255',
            'surah' => 'required|max:22',
            'ayat' => 'required',
        ]);

        $validatedData['user_id'] = $request->id;

        Hapalan::create($validatedData);

        return redirect('/dashboard/'.$request->id)->with('success', 'Hapalan Berhasil Ditambahkan!');

    }

    function edit (Hapalan $hapalan) 
    {
        return view('dashboard.hapalan.edit', [
            'hapalan' => $hapalan
        ]);
    }

    function destroy (Hapalan $hapalan) 
    {
        Hapalan::destroy($hapalan->id);
        return redirect('/dashboard/'.$hapalan->user_id)->with('success', 'Hapalan Berhasil Dihapus');

    }

    function update (Request $request, Hapalan $hapalan) 
    {
        $rules =[
            'tanggal' => 'required|max:255',
            'surah' => 'required|max:22',
            'ayat' => 'required',
            ];

            
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = $request->user_id;
        Hapalan::where('id', $hapalan->id)->update($validatedData);
        return redirect('/dashboard/'.$hapalan->user_id)->with('success', 'Hapalan Berhasil Diubah!');
    }


}
