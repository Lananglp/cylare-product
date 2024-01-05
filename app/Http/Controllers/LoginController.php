<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('success', 'Selamat datang kembali, ' . auth()->user()->nama_lengkap . '.');
        }
 
        return back()->with('warning', 'Email atau password yang anda masukan salah.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Keluar dari akun sebelumnya.');
    }

    public function register(Request $request)
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
        $users->user_type = "normal";
        $users->password = Hash::make($request->input('password'));
        $users->save();

        return redirect('/')->with('success', 'Sukses membuat akun, silahkan melakukan login.');
    }

    // public function authenticate(Request $request): RedirectResponse
    // {
    //     // Periksa apakah ada kredensial di localStorage
    //     $localStorageEmail = $request->session()->get('localStorageEmail');
    //     $localStoragePassword = $request->session()->get('localStoragePassword');

    //     if ($localStorageEmail && $localStoragePassword) {
    //         $credentials = [
    //             'email' => $localStorageEmail,
    //             'password' => $localStoragePassword,
    //         ];

    //         if (Auth::attempt($credentials)) {
    //             $request->session()->regenerate();

    //             return redirect()->intended('dashboard')->with('success', 'Selamat datang kembali, ' . auth()->user()->nama_lengkap . '.');
    //         }
    //     }

    //     // Jika kredensial tidak ditemukan atau login gagal, lanjutkan dengan login biasa
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         // Simpan kredensial di localStorage untuk login berikutnya
    //         $request->session()->put('localStorageEmail', $credentials['email']);
    //         $request->session()->put('localStoragePassword', $credentials['password']);

    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard')->with('success', 'Selamat datang, ' . auth()->user()->nama_lengkap . '.');
    //     }

    //     return back()->with('warning', 'Email atau password yang anda masukan salah.');
    // }

    // public function logout(Request $request): RedirectResponse
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     // Hapus kredensial localStorage saat logout
    //     $request->session()->forget('localStorageEmail');
    //     $request->session()->forget('localStoragePassword');

    //     return redirect('/')->with('success', 'Keluar dari akun sebelumnya.');
    // }
}
