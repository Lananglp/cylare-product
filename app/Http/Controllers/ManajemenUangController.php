<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManajemenUang;
use App\Models\Keuangan;
use App\Models\User;

class ManajemenUangController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $manajemenUang = $user->ManajemenUang()->get();
        if ($manajemenUang->count() > 0) {
            foreach ($manajemenUang as $item) {
                $gaji_anda = $item->gaji;
                $persen_satu = $item->persen_satu;
                $total_satu = $item->total_satu;
                $persen_dua = $item->persen_dua;
                $total_dua = $item->total_dua;
                $persen_tiga = $item->persen_tiga;
                $total_tiga = $item->total_tiga;
                $persen_empat = $item->persen_empat;
                $total_empat = $item->total_empat;
                $uang_makan = $total_satu / 30;
            }
        } else {
            $gaji_anda = 0;
            $persen_satu = 0;
            $total_satu = 0;
            $persen_dua = 0;
            $total_dua = 0;
            $persen_tiga = 0;
            $total_tiga = 0;
            $persen_empat = 0;
            $total_empat = 0;
            $uang_makan = $total_satu / 30;
        }

        $keuangan = $user->keuangan()->latest()->get();
        $keuangan_terbaru = $user->keuangan()->latest()->first();

        if ($keuangan_terbaru !== null ) {
            $kebutuhan_satu = $keuangan_terbaru->total_satu;
            $kebutuhan_dua = $keuangan_terbaru->total_dua;
            $kebutuhan_tiga = $keuangan_terbaru->total_tiga;
            $kebutuhan_empat = $keuangan_terbaru->total_empat;
            $gaji_anda_sekarang = $keuangan_terbaru->total_gaji;
        } else {
            $kebutuhan_satu = null;
            $kebutuhan_dua = null;
            $kebutuhan_tiga = null;
            $kebutuhan_empat = null;
            $gaji_anda_sekarang = null;
        }

        return view('manajemen-uang.index', compact(
            'manajemenUang',
            'gaji_anda',
            'persen_satu',
            'total_satu',
            'persen_dua',
            'total_dua',
            'persen_tiga',
            'total_tiga',
            'persen_empat',
            'total_empat',
            'uang_makan',
            'keuangan',
            'keuangan_terbaru',
            'kebutuhan_satu',
            'kebutuhan_dua',
            'kebutuhan_tiga',
            'kebutuhan_empat',
            'gaji_anda_sekarang',
        ));
    }

    public function store(Request $request)
    {
        $request->validate(['gaji' => 'required']);

        $uang = new ManajemenUang;
        $uang->user_id = auth()->user()->id;
        $uang->gaji = $request->input('gaji');
        $uang->save();

        $user = User::find(auth()->user()->id);

        $uang_new = $user->manajemenUang()->first();
        $uang_new->total_satu = ($uang_new->persen_satu / 100) * $uang_new->gaji;
        $uang_new->total_dua = ($uang_new->persen_dua / 100) * $uang_new->gaji;
        $uang_new->total_tiga = ($uang_new->persen_tiga / 100) * $uang_new->gaji;
        $uang_new->total_empat = ($uang_new->persen_empat / 100) * $uang_new->gaji;
        $uang_new->save();

        return redirect()->back()->with('success', 'Selesai mengatur manajemen uang.');
    }

    public function update($id, Request $request)
    {
        $uang = ManajemenUang::where('user_id', $id)->first();
        $uang->gaji = $request->input('gaji');
        $uang->persen_satu = $request->input('persen_satu');
        $uang->persen_dua = $request->input('persen_dua');
        $uang->persen_tiga = $request->input('persen_tiga');
        $uang->persen_empat = $request->input('persen_empat');
        $uang->save();

        $uang_new = ManajemenUang::where('user_id', $id)->first();
        $uang_new->total_satu = ($uang_new->persen_satu / 100) * $uang_new->gaji;
        $uang_new->total_dua = ($uang_new->persen_dua / 100) * $uang_new->gaji;
        $uang_new->total_tiga = ($uang_new->persen_tiga / 100) * $uang_new->gaji;
        $uang_new->total_empat = ($uang_new->persen_empat / 100) * $uang_new->gaji;
        $uang_new->save();

        return redirect()->back()->with('success', 'Analisa manajemen uang diubah.');
    }

    public function storeKeuangan(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'kebutuhan' => 'required',
            'jumlah' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $get_keuangan = $user->keuangan()->first();

        $manajemenUang = ManajemenUang::where('user_id', auth()->user()->id)->first();
        $keuangan_old = Keuangan::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        // dd($keuangan_old);

        $keuangan = new Keuangan;
        $keuangan->user_id = auth()->user()->id;

        if ($get_keuangan === null) {
            if ($request->input('jenis') === "pemasukan") {

                $keuangan->jenis = $request->input('jenis');
    
                if ($request->input('kebutuhan') === "pertama") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu += $request->input('jumlah');
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "kedua") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua += $request->input('jumlah');
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "ketiga") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga += $request->input('jumlah');
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "keempat") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat += $request->input('jumlah');
                    $keuangan->total_gaji = $manajemenUang->gaji += $request->input('jumlah');
                }
            }
    
            if ($request->input('jenis') === "pengeluaran") {
                
                $keuangan->jenis = $request->input('jenis');
    
                if ($request->input('kebutuhan') === "pertama") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu -= $request->input('jumlah');
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "kedua") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua -= $request->input('jumlah');
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "ketiga") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga -= $request->input('jumlah');
                    $keuangan->total_empat = $manajemenUang->total_empat;
                    $keuangan->total_gaji = $manajemenUang->gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "keempat") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $manajemenUang->total_satu;
                    $keuangan->total_dua = $manajemenUang->total_dua;
                    $keuangan->total_tiga = $manajemenUang->total_tiga;
                    $keuangan->total_empat = $manajemenUang->total_empat -= $request->input('jumlah');
                    $keuangan->total_gaji = $manajemenUang->gaji -= $request->input('jumlah');
                }
            }
        } else {
            if ($request->input('jenis') === "pemasukan") {

                $keuangan->jenis = $request->input('jenis');
    
                if ($request->input('kebutuhan') === "pertama") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu += $request->input('jumlah');
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "kedua") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua += $request->input('jumlah');
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "ketiga") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga += $request->input('jumlah');
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji += $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "keempat") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat += $request->input('jumlah');
                    $keuangan->total_gaji = $keuangan_old->total_gaji += $request->input('jumlah');
                }
            }
    
            if ($request->input('jenis') === "pengeluaran") {
                
                $keuangan->jenis = $request->input('jenis');
    
                if ($request->input('kebutuhan') === "pertama") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu -= $request->input('jumlah');
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "kedua") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua -= $request->input('jumlah');
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "ketiga") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga -= $request->input('jumlah');
                    $keuangan->total_empat = $keuangan_old->total_empat;
                    $keuangan->total_gaji = $keuangan_old->total_gaji -= $request->input('jumlah');
                }
                if ($request->input('kebutuhan') === "keempat") {
                    $keuangan->kebutuhan = $request->input('kebutuhan');
                    $keuangan->jumlah = $request->input('jumlah');
                    $keuangan->total_satu = $keuangan_old->total_satu;
                    $keuangan->total_dua = $keuangan_old->total_dua;
                    $keuangan->total_tiga = $keuangan_old->total_tiga;
                    $keuangan->total_empat = $keuangan_old->total_empat -= $request->input('jumlah');
                    $keuangan->total_gaji = $keuangan_old->total_gaji -= $request->input('jumlah');
                }
            }
        }

        $keuangan->keterangan = $request->input('keterangan');
        $keuangan->tanggal = Carbon::now();
        $keuangan->save();

        return redirect()->back()->with('success', 'Data keuangan ditambahkan.');
    }

    public function delete($id)
    {
        Keuangan::where('user_id', $id)->delete();

        return redirect()->back()->with('success', 'Keuangan anda kini terhapus semua.');
    }

    public function updateKeuangan($id, Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'kebutuhan' => 'required',
            'jumlah' => 'required',
        ]);

        $keuangan = Keuangan::find($id);

        if ($request->input('jenis') === "pemasukan") {

            // if ($request->input('jumlah') < $keuangan->jumlah) {
            //     return redirect()->back()->with('warning', 'Jumlah nominal tidak boleh lebih kecil dari nominal sebelumnya.');
            // }

            $keuangan->jenis = $request->input('jenis');

            if ($request->input('kebutuhan') === "pertama") {
                $keuangan->total_satu -= $keuangan->jumlah;
                $keuangan->total_gaji -= $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_satu += $request->input('jumlah');
                $keuangan->total_gaji += $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "kedua") {
                $keuangan->total_dua -= $keuangan->jumlah;
                $keuangan->total_gaji -= $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_dua += $request->input('jumlah');
                $keuangan->total_gaji += $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "ketiga") {
                $keuangan->total_tiga -= $keuangan->jumlah;
                $keuangan->total_gaji -= $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_tiga += $request->input('jumlah');
                $keuangan->total_gaji += $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "keempat") {
                $keuangan->total_empat -= $keuangan->jumlah;
                $keuangan->total_gaji -= $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_empat += $request->input('jumlah');
                $keuangan->total_gaji += $request->input('jumlah');
            }
        }

        if ($request->input('jenis') === "pengeluaran") {

            // if ($request->input('jumlah') < $keuangan->jumlah) {
            //     return redirect()->back()->with('warning', 'Jumlah nominal tidak boleh lebih kecil dari nominal sebelumnya.');
            // }
            
            $keuangan->jenis = $request->input('jenis');

            if ($request->input('kebutuhan') === "pertama") {
                $keuangan->total_satu += $keuangan->jumlah;
                $keuangan->total_gaji += $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_satu -= $request->input('jumlah');
                $keuangan->total_gaji -= $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "kedua") {
                $keuangan->total_dua += $keuangan->jumlah;
                $keuangan->total_gaji += $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_dua -= $request->input('jumlah');
                $keuangan->total_gaji -= $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "ketiga") {
                $keuangan->total_tiga += $keuangan->jumlah;
                $keuangan->total_gaji += $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_tiga -= $request->input('jumlah');
                $keuangan->total_gaji -= $request->input('jumlah');
            }
            if ($request->input('kebutuhan') === "keempat") {
                $keuangan->total_empat += $keuangan->jumlah;
                $keuangan->total_gaji += $keuangan->jumlah;
                $keuangan->save();

                $keuangan->kebutuhan = $request->input('kebutuhan');
                $keuangan->jumlah = $request->input('jumlah');
                $keuangan->total_empat -= $request->input('jumlah');
                $keuangan->total_gaji -= $request->input('jumlah');
            }
        }

        $keuangan->save();

        return redirect()->back()->with('success', 'Data keuangan ditambahkan.');
    }

    public function ubahKeterangan($id, Request $request)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->keterangan = $request->input('keterangan');
        $keuangan->save();

        return redirect()->back()->with('success', 'Data keterangan keuangan diubah.');
    }
}
