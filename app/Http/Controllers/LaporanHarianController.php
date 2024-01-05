<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LaporanHarian;
use App\Models\RekapUang;

class LaporanHarianController extends Controller
{
    public function index()
    {
        $users = User::find(auth()->user()->id);
        $laporan = $users->laporanHarian()->latest()->get();

        $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        $cek_laporan_harian = $users->laporanHarian()->where('tanggal', $tanggal_sekarang)->first();

        return view('laporan-harian.index', compact('laporan', 'cek_laporan_harian', 'tanggal_sekarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $tanggal_sekarang = Carbon::now();

        $laporan = new LaporanHarian;
        $laporan->user_id = auth()->user()->id;
        $laporan->tanggal = $tanggal_sekarang;
        $laporan->text = $request->input('text');
        $laporan->save();

        $users = User::find(auth()->user()->id);

        if (auth()->user()->user_type === "normal") {
            $nominal = 15000;
            $users->uang += $nominal;
        }
        if (auth()->user()->user_type === "premium") {
            $nominal = 25000;
            $users->uang += $nominal;
        }
        if (auth()->user()->user_type === "raja") {
            $nominal = 50000;
            $users->uang += $nominal;
        }
        if (auth()->user()->user_type === "dewa") {
            $nominal = 75000;
            $users->uang += $nominal;
        }
        if (auth()->user()->user_type === "master") {
            $nominal = 125000;
            $users->uang += $nominal;
        }
        if (auth()->user()->user_type === "pengembang") {
            $nominal = 220000;
            $users->uang += $nominal;
        }
        $users->save();

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pemasukan = $nominal;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();
        

        return redirect('/laporan-harian')->with('success', 'Sukses menambah laporan harian, saldo + Rp.' . number_format($nominal, 0, ',', '.') . '.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $laporan = LaporanHarian::find($id);
        $laporan->text = $request->input('text');
        $laporan->save();

        return redirect('/laporan-harian')->with('success', 'Sukses mengubah laporan harian.');
    }

    public function delete($id)
    {
        LaporanHarian::destroy($id);

        return redirect('/laporan-harian')->with('success', 'Laporan harian dihapus.');
    }
}
