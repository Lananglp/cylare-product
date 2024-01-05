<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;
use App\Models\RekapUang;

class UserTypeController extends Controller
{
    public function normal()
    {
        if (auth()->user()->user_type === "premium" || auth()->user()->user_type === "raja" || auth()->user()->user_type === "dewa" || auth()->user()->user_type === "master" || auth()->user()->user_type === "pengembang") {
            return redirect()->back()->with('warning', 'Tingkat akunmu sudah tinggi, tingkatan tidak dapat diturunkan.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "normal";
        $users->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi normal.');
    }
    public function premium()
    {
        if (auth()->user()->uang < 249000) {
            return redirect()->back()->with('warning', 'Saldo kamu tidak mencukupi.');
        }

        if (auth()->user()->user_type === "raja" || auth()->user()->user_type === "dewa" || auth()->user()->user_type === "master" || auth()->user()->user_type === "pengembang") {
            return redirect()->back()->with('warning', 'Tingkat akunmu sudah tinggi, tingkatan tidak dapat diturunkan.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "premium";
        $users->uang -= 249000;
        $users->save();

        $users = User::find(auth()->user()->id);

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pengeluaran = 249000;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi premium.');
    }
    public function raja()
    {
        if (auth()->user()->uang < 799000) {
            return redirect()->back()->with('warning', 'Saldo kamu tidak mencukupi.');
        }

        if (auth()->user()->user_type === "dewa" || auth()->user()->user_type === "master" || auth()->user()->user_type === "pengembang") {
            return redirect()->back()->with('warning', 'Tingkat akunmu sudah tinggi, tingkatan tidak dapat diturunkan.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "raja";
        $users->uang -= 799000;
        $users->save();

        $users = User::find(auth()->user()->id);

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pengeluaran = 799000;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi raja.');
    }
    public function dewa()
    {
        if (auth()->user()->uang < 2499000) {
            return redirect()->back()->with('warning', 'Saldo kamu tidak mencukupi.');
        }

        if (auth()->user()->user_type === "master" || auth()->user()->user_type === "pengembang") {
            return redirect()->back()->with('warning', 'Tingkat akunmu sudah tinggi, tingkatan tidak dapat diturunkan.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "dewa";
        $users->uang -= 2499000;
        $users->save();

        $users = User::find(auth()->user()->id);

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pengeluaran = 2499000;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi dewa.');
    }
    public function master()
    {
        if (auth()->user()->uang < 7059000) {
            return redirect()->back()->with('warning', 'Saldo kamu tidak mencukupi.');
        }

        if (auth()->user()->user_type === "pengembang") {
            return redirect()->back()->with('warning', 'Tingkat akunmu sudah tinggi, tingkatan tidak dapat diturunkan.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "master";
        $users->uang -= 7059000;
        $users->save();

        $users = User::find(auth()->user()->id);

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pengeluaran = 7059000;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi master.');
    }
    public function pengembang()
    {
        if (auth()->user()->uang < 46499000) {
            return redirect()->back()->with('warning', 'Saldo kamu tidak mencukupi.');
        }

        $users = User::find(auth()->user()->id);
        $users->user_type = "pengembang";
        $users->uang -= 46499000;
        $users->save();

        $users = User::find(auth()->user()->id);

        $history = new RekapUang;
        $history->user_id = auth()->user()->id;
        $history->pengeluaran = 46499000;
        $history->total_saldo = $users->uang;
        $history->tanggal = Carbon::now();
        $history->save();

        return redirect()->back()->with('success', 'Tipe akun ditingkatkan menjadi pengembang.');
    }
}
