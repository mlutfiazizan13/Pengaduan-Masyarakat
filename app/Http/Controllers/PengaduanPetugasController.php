<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengaduan::with('Nik')->get();

        return view('pengaduan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data  = Pengaduan::find($id);
        $data->delete();
        return redirect()->route('pengaduan-petugas.index')->with('success', 'Pengaduan deleted successfully');;
    }

    public function proses($id)
    {   
        $data = Pengaduan::find($id);
        $status = 'proses';
        $data->update([
            'status' => $status
        ]);

        return redirect()->route('pengaduan-petugas.index')->with('success', 'Pengaduan berhasil diproses');
    }

    public function selesai($id)
    {   
        $data = Pengaduan::find($id);
        $status = 'selesai';
        $data->update([
            'status' => $status
        ]);

        return redirect()->route('pengaduan-petugas.index')->with('success', 'Pengaduan sudah selesai');
    }
}
