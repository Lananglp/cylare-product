<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Carbon\Carbon;

class KomentarController extends Controller
{
    public function admin()
    {
        $komentar = Komentar::all();

        return view('komentar-publik.index', compact('komentar'));
    }

    public function index()
    {
        $komentar = Komentar::all();

        return view('welcome', compact('komentar'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'komentar' => 'required',
        ]);

        $komentar = new Komentar;
        if (empty($request->input('name'))) {
            $komentar->name = 'Tidak diketahui';
        } else {
            $komentar->name = $request->input('name');
        }
        $komentar->komentar = $request->input('komentar');
        $komentar->tanggal = Carbon::now();
        $komentar->save();

        return redirect()->back()->with('success', 'Anda menambahkan komentar.');
    }

    public function update($id, Request $request)
    {
        $komentar = Komentar::find($id);
        $komentar->name = $request->input('name');
        $komentar->komentar = $request->input('komentar');
        $komentar->balasan = $request->input('balasan');
        if (!empty($request->input('balasan'))) {
            $komentar->tanggal_balasan = Carbon::now();
        }
        $komentar->save();

        return redirect()->back()->with('success', 'Anda mengedit komentar publik.');
    }

    public function destroy($id)
    {
        Komentar::destroy($id);

        return redirect()->back()->with('success', 'Anda menghapus komentar publik.');
    }
}
