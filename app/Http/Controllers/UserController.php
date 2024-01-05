<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RekapUang;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('pengguna-akun.index', compact('users'));
    }

    public function create()
    {
        return view('pengguna-akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_panggilan' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'password' => 'required',
            'validasi_password' => 'required',
        ]);

        if (strLen($request->input('password')) < 8) {
            return redirect()->back()->with('warning', 'Password harus terdiri dari 8 karakter.');
        }

        if ($request->input('validasi_password') !== $request->input('password')) {
            return redirect()->back()->with('warning', 'Validasi password tidak sama dengan password sebelumnya.');
        }

        $users = new User;
        $users->nama_panggilan = $request->input('nama_panggilan');
        $users->nama_lengkap = $request->input('nama_lengkap');
        $users->email = $request->input('email');
        $users->alamat = $request->input('alamat');
        $users->no_hp = $request->input('no_hp');
        $users->tanggal_lahir = $request->input('tanggal_lahir');
        $users->tempat_lahir = $request->input('tempat_lahir');
        $users->gender = $request->input('gender');
        $users->user_type = $request->input('user_type');
        $users->password = Hash::make($request->input('password'));
        $users->save();

        return redirect('/pengguna-akun')->with('success', 'Sukses menambah pengguna akun.');
    }

    public function show()
    {
        return view('pengguna-akun.show');
    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('pengguna-akun.edit', compact('users'));
    }

    public function update($id, Request $request)
    {
        if (strLen($request->input('password')) < 8) {
            return redirect()->back()->with('warning', 'Password harus terdiri dari 8 karakter.');
        }

        if ($request->input('validasi_password') !== $request->input('password')) {
            return redirect()->back()->with('warning', 'Validasi password tidak sama dengan password sebelumnya.');
        }

        $users = User::find($id);
        $users->nama_panggilan = $request->input('nama_panggilan');
        $users->nama_lengkap = $request->input('nama_lengkap');
        $users->email = $request->input('email');
        $users->alamat = $request->input('alamat');
        $users->no_hp = $request->input('no_hp');
        $users->tanggal_lahir = $request->input('tanggal_lahir');
        $users->tempat_lahir = $request->input('tempat_lahir');
        $users->gender = $request->input('gender');
        $users->user_type = $request->input('user_type');
        $users->password = Hash::make($request->input('password'));
        $users->save();

        return redirect('/pengguna-akun')->with('success', 'Sukses mengubah pengguna akun.');
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect('/pengguna-akun')->with('success', 'Pengguna akun dihapus.');
    }

    public function gantiAkun($id)
    {
        $user = User::find($id);
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Anda login dengan ' . auth()->user()->nama_lengkap . '.');
    }

    public function saldoGratis()
    {
        $user = User::find(auth()->user()->id);
        $user->uang += 150000;
        $user->saldoHarian = true;
        $user->save();

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pemasukan = 150000;
        $history->total_saldo = $user->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Selamat kamu mendapat saldo sebesar Rp.150.000 untuk akun baru.');
    }
}
