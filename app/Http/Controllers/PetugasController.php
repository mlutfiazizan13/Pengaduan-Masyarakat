<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::where('role', 'petugas')->get();
        return view('petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:petugas',
            'password' => 'required|min:6',
        ]);
        $role = 'petugas';
        Petugas::create([
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $role,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Petugas::find($id);
        return view('petugas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Petugas::find($id);
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $role = 'petugas';
        $data->update([
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $role,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Petugas::find($id);
        $data->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully');
    }
}
