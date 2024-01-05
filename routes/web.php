<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Controllers\ManajemenUangController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;

use Carbon\Carbon;

use App\Models\User;
use App\Models\LaporanHarian;
use App\Models\RekapUang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', [LoginController::class, 'register']);
});

Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('OnLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('Dashboard');

    Route::get('/pengguna-akun', [UserController::class, 'index'])->name('pengguna Akun');
    Route::get('/pengguna-akun/create', [UserController::class, 'create'])->name('Tambah Pengguna');
    Route::post('/pengguna-akun/store', [UserController::class, 'store']);
    Route::get('/pengguna-akun/edit/{id}', [UserController::class, 'edit'])->name('Edit Pengguna');
    Route::post('/pengguna-akun/update/{id}', [UserController::class, 'update']);
    Route::delete('/pengguna-akun/delete/{id}', [UserController::class, 'delete']);
    Route::get('/profil', [UserController::class, 'show'])->name('Profil Anda');

    Route::get('/tingkatkan-akun', function () {
        $users = User::find(auth()->user()->id);
        $saldoNoFormat = $users->uang;
        $saldo = number_format($saldoNoFormat, 0, ',', '.');
        return view('tingkatkanAkun', compact('saldo'));
    })->name('Tingkatkan Akun');
    
    Route::post('/pengguna-akun/setNormal', [UserTypeController::class, 'normal']);
    Route::post('/pengguna-akun/setPremium', [UserTypeController::class, 'premium']);
    Route::post('/pengguna-akun/setRaja', [UserTypeController::class, 'raja']);
    Route::post('/pengguna-akun/setDewa', [UserTypeController::class, 'dewa']);
    Route::post('/pengguna-akun/setMaster', [UserTypeController::class, 'master']);
    Route::post('/pengguna-akun/setPengembang', [UserTypeController::class, 'pengembang']);

    Route::post('/pengguna-akun/gantiAkun/{id}', [UserController::class, 'gantiAkun']);
    Route::post('/pengguna-akun/saldoGratis', [UserController::class, 'saldoGratis']);

    Route::get('/laporan-harian', [LaporanHarianController::class, 'index'])->name('Laporan Harian');
    Route::post('/laporan-harian/store', [LaporanHarianController::class, 'store']);
    Route::post('/laporan-harian/update/{id}', [LaporanHarianController::class, 'update']);
    Route::delete('/laporan-harian/delete/{id}', [LaporanHarianController::class, 'delete']);

    Route::get('/manajemen-uang', [ManajemenUangController::class, 'index'])->name('Manajemen Uang');
    Route::post('/manajemen-uang/store', [ManajemenUangController::class, 'store']);
    Route::post('/manajemen-uang/update/{id}', [ManajemenUangController::class, 'update']);
    Route::post('/manajemen-uang/storeKeuangan', [ManajemenUangController::class, 'storeKeuangan']);
    Route::delete('/manajemen-uang/delete/{id}', [ManajemenUangController::class, 'delete']);
    Route::post('/manajemen-uang/updateKeuangan/{id}', [ManajemenUangController::class, 'updateKeuangan']);
    Route::post('/manajemen-uang/ubahKeterangan/{id}', [ManajemenUangController::class, 'ubahKeterangan']);

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('Absensi');
    Route::post('/absensi/store', [AbsensiController::class, 'store']);
    Route::post('/absensi/update/{id}', [AbsensiController::class, 'update']);
});