<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanPetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('landing-page');

Route::get('/login-masyarakat', [AuthController::class, 'loginMasyarakat'])->name('login-masyarakat');
Route::post('/login-masyarakat', [AuthController::class, 'storeLoginMasyarakat'])->name('store-login-masyarakat');
Route::get('/register-masyarakat', [AuthController::class, 'registerMasyarakat'])->name('register-masyarakat');
Route::post('/register-masyarakat', [AuthController::class, 'storeRegisterMasyarakat'])->name('store-register-masyarakat');
Route::get('/logout-masyarakat', [AuthController::class, 'logoutMasyarakat'])->name('logout-masyarakat');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('store-login-petugas');
Route::get('/register', [AuthController::class, 'register'])->name('register-petugas');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('store-register-petugas');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:masyarakat'])->group(function(){
    // Route::resource('/pengaduan', PengaduanController::class);
    Route::get('/pengaduan', [PengaduanController::class, 'indexMasyarakat'])->name('pengaduan-masyarakat.index');
    Route::post('/pengaduan', [PengaduanController::class, 'storeMasyarakat'])->name('pengaduan-masyarakat.store');
});

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['admin'])->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('/pengaduan/pdf', [PengaduanController::class, 'pdf'])->name('pengaduan.pdf');
            Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
            Route::resource('/masyarakat', MasyarakatController::class);
            Route::resource('/petugas', PetugasController::class);
            Route::resource('/pengaduan', PengaduanController::class);
            Route::put('/pengaduan/proses/{id}', [PengaduanController::class, 'proses'])->name('pengaduan.proses');
            Route::put('/pengaduan/selesai/{id}', [PengaduanController::class, 'selesai'])->name('pengaduan.selesai');

        });
    });

    Route::middleware(['petugas'])->group(function(){
        Route::prefix('/petugas')->group(function(){
            Route::get('/dashboard', [AdminController::class, 'index'])->name('petugas-dashboard');
            Route::resource('/pengaduan-petugas', PengaduanPetugasController::class);
            Route::put('/pengaduan/proses/{id}', [PengaduanPetugasController::class, 'proses'])->name('pengaduan-petugas.proses');
            Route::put('/pengaduan/selesai/{id}', [PengaduanPetugasController::class, 'selesai'])->name('pengaduan-petugas.selesai');
        });
    });
});
