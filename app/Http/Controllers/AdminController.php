<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.index', [
            'users' => User::where('level', 'santri')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validatedData = $request -> validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
            'kelas' => 'required|max:225',
        ]);

        $validatedData['level'] = 'santri';
        $validatedData['password'] = bcrypt(123456);

        User::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data Santri Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.hapalan.index', [
            'user' => $user,
            'hapalans' => $user->Hapalan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('dashboard.admin.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules =[
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
            'kelas' => 'required|max:225',
            ];

        $validatedData = $request->validate($rules);
        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Data Santri Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        User::destroy($user->id);
        return redirect('/dashboard')->with('success', 'Data Santri Berhasil Dihapus');
    }
}
