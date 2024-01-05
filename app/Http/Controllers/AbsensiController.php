<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Absensi;
use App\Models\User;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $absensi = $user->absensi()->latest()->get();

        $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        $cekAbsenHariIni = $user->absensi()->where('tanggal', $tanggal_sekarang)->first();

        return view('absensi.index', compact('absensi', 'cekAbsenHariIni', 'tanggal_sekarang'));
    }

    public function store(Request $request)
    {
        $absen = new Absensi;
        $absen->user_id = auth()->user()->id;
        $absen->tanggal = Carbon::now();
        $absen->absen_masuk = $request->input('absen_masuk');
        $absen->absen_keluar = $request->input('absen_keluar');
        $absen->keterangan = $request->input('keterangan');
        if (empty($request->input('ijin'))) {
            $absen->ijin = false;
        } else {
            $absen->ijin = true;
        }
        $absen->save();

        return redirect()->back()->with('success', 'Absensi hari ini ditambahkan.');
    }

    public function update($id, Request $request)
    {
        $absen = Absensi::find($id);
        $absen->absen_masuk = $request->input('absen_masuk');
        $absen->absen_keluar = $request->input('absen_keluar');
        $absen->keterangan = $request->input('keterangan');
        if (empty($request->input('ijin'))) {
            $absen->ijin = false;
        } else {
            $absen->ijin = true;
        }
        $absen->save();

        return redirect()->back()->with('success', 'Anda mengubah absensi hari ini.');
    }
}
