<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;
use App\Models\LaporanHarian;
use App\Models\RekapUang;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::find(auth()->user()->id);
        $saldoNoFormat = $users->uang;
        $saldo = number_format($saldoNoFormat, 0, ',', '.');
        $total_users = User::count();
        $total_laporanHarian = $users->laporanHarian()->count();

        $history = $users->rekapUang()->latest()->get();

        $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        // absensi cek
        $cekAbsenHariIni = $users->absensi()->where('tanggal', $tanggal_sekarang)->first();
        // laporan harian cek
        $cek_laporan_harian = $users->laporanHarian()->where('tanggal', $tanggal_sekarang)->first();
        // keuangan cek
        $cek_keuangan = $users->keuangan()->where('tanggal', $tanggal_sekarang)->first();

        return view('dashboard', compact('saldo', 'total_users', 'total_laporanHarian', 'history', 'cekAbsenHariIni', 'cek_laporan_harian', 'cek_keuangan'));
    }
}
