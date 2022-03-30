<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $total = Pengaduan::count();
        $menunggu = Pengaduan::where('status', 'waiting')->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        $totalMasyarakat = Masyarakat::count();
        $totalPetugas = Petugas::where('role', 'petugas')->count();

        $resentPengaduan = Pengaduan::latest()->get();
        return view('admin.index', compact(['total', 'menunggu', 'proses', 'selesai', 'totalMasyarakat', 'totalPetugas', 'resentPengaduan']));
    }
}
