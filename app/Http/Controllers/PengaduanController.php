<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
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
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan deleted successfully');;
    }

    public function proses($id)
    {   
        $data = Pengaduan::find($id);
        $status = 'proses';
        $data->update([
            'status' => $status
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diproses');
    }

    public function selesai($id)
    {   
        $data = Pengaduan::find($id);
        $status = 'selesai';
        $data->update([
            'status' => $status
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan sudah selesai');
    }

    public function pdf()
    {
        $data = Pengaduan::with('Nik')->get();
        
        $pdf = PDF::loadView('pengaduan.pdf', compact('data'));
        
        return $pdf->stream('Pengaduan_Masyarakat.pdf');
    }

    public function pdfPerPengaduan()
    {
        
    }

    // public function generatePDF()
    // {
    //     $data = Pengaduan::with('Nik')->get();
    // }

    public function indexMasyarakat()
    {
        if (Auth::guard('masyarakat')->check()) {
            return view('pengaduan.pengaduan');
        }
        return redirect('login-masyarakat')->with('error','You are not allowed to access');
    }

    public function storeMasyarakat(Request $request)
    {
        $request->validate([
            'nik',
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|image:jpeg,png,jpg',
        ]);
        

        $status = 'waiting';
        $path = public_path('/images/pengaduan');
        if($request->hasFile('foto')){
            $uploadedImage = $request->foto;
            $imageName = $request['nik']. '-' .$request['tgl_pengaduan']. '-' .Str::random(4). '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move($path, $imageName);
            // $uploadedImage->foto_barang = $imageName;
        }

        Pengaduan::create([
            'nik' => $request['nik'],
            'tgl_pengaduan' => $request['tgl_pengaduan'],
            'isi_laporan' => $request['isi_laporan'],
            'foto' => $imageName,
            'status' => $status,
        ]);
        

        return redirect()->route('pengaduan-masyarakat.index')->with('success', 'Pengaduan Berhasil Dibuat!');;
    }
}
