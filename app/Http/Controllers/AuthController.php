<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function storeLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            if (Auth::guard('admin')->user()->role == 'admin') {
                return redirect()->route('admin-dashboard')->with('success', 'Logged in');
            }
            if (Auth::guard('admin')->user()->role == 'petugas') {
                return redirect()->route('petugas-dashboard')->with('success', 'Logged in');
            }
        }
        return redirect()->back()->with('error', 'Invalid');
        
    }

    public function register()
    {
        return view('admin.auth.register');
    }
    
    public function storeRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:petugas',
            'password' => 'required|min:6',
        ]);
        $role = 'admin';
        Petugas::create([
            'nama' => $request['nama'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $role,
        ]);

        return redirect()->route('login-petugas');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login');
    }
    
    public function loginMasyarakat()
    {
        return view('masyarakat.auth.login');
    }

    public function storeLoginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::guard('masyarakat')->attempt($credentials)){
            return redirect('pengaduan')->with('success', 'Logged in');
        }

        return redirect()->back()->with('error', 'Invalid');
        
    }

    public function registerMasyarakat()
    {
        return view('masyarakat.auth.register');
    }
    
    public function storeRegisterMasyarakat(Request $request)
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

        return redirect()->route('login-masyarakat');
    }

    public function logoutMasyarakat()
    {
        Auth::guard('masyarakat')->logout();

        return redirect()->route('landing-page');
    }
}
