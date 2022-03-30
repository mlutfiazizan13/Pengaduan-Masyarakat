<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Masyarakat::all();
        return view('masyarakat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
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
            'nik' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:masyarakat',
            'password' => 'required|min:6',
        ]);

        Masyarakat::create([
            'nik' => $request['nik'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat created successfully');
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
        $data = Masyarakat::find($id);
        return view('masyarakat.edit', compact('data'));
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
        $data = Masyarakat::find($id);
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $data->update([
            'nik' => $request['nik'],
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Masyarakat::find($id);

        $data->delete();
        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat deleted successfully');;
    }
}
