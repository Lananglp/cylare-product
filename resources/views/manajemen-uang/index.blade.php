@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <p class="mb-0">Gaji anda :</p>
                    <h2 class="mb-0">Rp.{{number_format($gaji_anda, 0, ',', '.')}}</h2>
                    <p class="text-sm">Pastikan anda sudah memasukan data sesuai dengan aslinya, karena nominal gaji anda akan menjadi acuan untuk di analisis dan di manajemenkan.</p>
                    <p class="text-sm">Dalam menganalisis dan memanajemen keuangan anda terdapat 4 persentase yang wajib digunakan yang secara dasar diantaranya adalah <b>40%, 30%, 20%, 10%</b> yang jika ditotalkan keseluruhan menjadi <b>100%</b>, dari 4 persentase ini, <b>gaji anda</b> akan dibagi menjadi 4 bagian persentase yang nanti akan menentukan manajemen dan analisis keuangan anda.</p>
                    @if ($manajemenUang->count() > 0)
                        <button type="button" class="w-lg-50 btn btn-sm bg-gradient-dark mt-auto mb-0" data-bs-toggle="modal" data-bs-target="#editManajemenUang">Edit manajemen</button>
                    @else
                        <button type="button" class="w-lg-50 btn btn-sm bg-gradient-info mt-auto mb-0" data-bs-toggle="modal" data-bs-target="#aturManajemenUang">Atur manajemen</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row h-100">
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-0 text-info text-gradient">{{$persen_satu}}%</h5>
                            <h6 class="mb-0">Rp.{{number_format($total_satu, 0, ',', '.')}}</h6>
                            <b class="d-inline-block text-sm">Kebutuhan Pertama</b>
                            <p class="mb-0 text-xs">Agar gaji anda dapat bertahan sebulan, batas maksimal biaya hidup anda dalam sehari adalah <b>Rp.{{number_format($uang_makan, 2, ',', '.')}}</b>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-0 text-info text-gradient">{{$persen_dua}}%</h5>
                            <h6 class="mb-0">Rp.{{number_format($total_dua, 0, ',', '.')}}</h6>
                            <b class="d-inline-block text-sm">Kebutuhan Kedua</b>
                            <p class="mb-0 text-xs">Kebutuhan ini digunakan untuk kurun waktu kurang lebih seminggu seperti membeli bensin motor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-0 text-info text-gradient">{{$persen_tiga}}%</h5>
                            <h6 class="mb-0">Rp.{{number_format($total_tiga, 0, ',', '.')}}</h6>
                            <b class="d-inline-block text-sm">Kebutuhan Ketiga</b>
                            <p class="mb-0 text-xs">Kebutuhan ini digunakan untuk kurun waktu kurang lebih sebulan seperti membeli paket kouta.</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-0 text-info text-gradient">{{$persen_empat}}%</h5>
                            <h6 class="mb-0">Rp.{{number_format($total_empat, 0, ',', '.')}}</h6>
                            <b class="d-inline-block text-sm">Kebutuhan Keempat</b>
                            <p class="mb-0 text-xs">Kebutuhan ini digunakan untuk investasi masa depan anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if (!empty($gaji_anda))
        <div class="px-4 mb-4">
            <b class="d-inline-block fs-5">Data keuangan realtime</b>
            <p class="mb-0 text-sm">Berikut merupakan nominal yang dapat berubah ketika adanya pemasukan maupun pengeluaran.</p>
            <p class="mb-0 text-sm">Setiap bulan anda perlu melakukan hapus semua data keuangan untuk mereset keuangan anda sesuai dengan nominal gaji anda.</p>
        </div>
        <div class="row flex-row-reverse px-0 mx-0">
            <div class="col-xl-2">
                <div class="row">
                    <div class="col-xl-12 col-6">
                        <div class="card rounded-3 mb-4">
                            <div class="p-3">
                                <p class="mb-0 text-xs">Sisa kebutuhan <b class="text-info text-gradient">{{$persen_satu}}%</b> :</p>
                                <h6 class="mb-0">Rp.{{$kebutuhan_satu !== null ? number_format($kebutuhan_satu, 0, ',', '.') : number_format($total_satu, 0, ',', '.')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-6">
                        <div class="card rounded-3 mb-4">
                            <div class="p-3">
                                <p class="mb-0 text-xs">Sisa kebutuhan <b class="text-info text-gradient">{{$persen_dua}}%</b> :</p>
                                <h6 class="mb-0">Rp.{{$kebutuhan_dua !== null ? number_format($kebutuhan_dua, 0, ',', '.') : number_format($total_dua, 0, ',', '.')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-6">
                        <div class="card rounded-3 mb-4">
                            <div class="p-3">
                                <p class="mb-0 text-xs">Sisa kebutuhan <b class="text-info text-gradient">{{$persen_tiga}}%</b> :</p>
                                <h6 class="mb-0">Rp.{{$kebutuhan_tiga !== null ? number_format($kebutuhan_tiga, 0, ',', '.') : number_format($total_tiga, 0, ',', '.')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-6">
                        <div class="card rounded-3 mb-4">
                            <div class="p-3">
                                <p class="mb-0 text-xs">Sisa kebutuhan <b class="text-info text-gradient">{{$persen_empat}}%</b> :</p>
                                <h6 class="mb-0">Rp.{{$kebutuhan_empat !== null ? number_format($kebutuhan_empat, 0, ',', '.') : number_format($total_empat, 0, ',', '.')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card rounded-3 mb-4">
                            <div class="p-3">
                                <p class="mb-0 text-xs">Sisa uang anda :</p>
                                <h6 class="mb-0">Rp.{{$gaji_anda_sekarang !== null ? number_format($gaji_anda_sekarang, 0, ',', '.') : number_format($gaji_anda, 0, ',', '.')}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="ms-auto">
                            <div>
                                <button type="button" class="w-sm-auto w-100 btn btn-sm bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#hapusSemuaKeuangan">Hapus semua data</button>
                                <button type="button" class="w-sm-auto w-100 btn btn-sm bg-gradient-info" data-bs-toggle="modal" data-bs-target="#tambahKeuangan">Tambah data keuangan</button>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sisa kebutuhan</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tanggal</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Sisa gaji anda</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center"><i class="fa fa-cog"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                @if ($keuangan->count() > 0)
                                  @foreach ($keuangan as $index => $k)
                                  <tr>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{$index + 1}}</td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Rp.{{number_format($k->jumlah, 0, ',', '.')}}</p>
                                        <p class="text-xs {{$k->jenis === "pemasukan" ? 'text-success' : 'text-danger'}} mb-0">{{$k->jenis}}</p>
                                    </td>
                                    <td>
                                        @if ($k->kebutuhan === "pertama")
                                        <p class="text-dark text-xs font-weight-bold mb-0">Rp.{{number_format($k->total_satu, 0, ',', '.')}}</p>
                                        @endif
                                        @if ($k->kebutuhan === "kedua")
                                        <p class="text-dark text-xs font-weight-bold mb-0">Rp.{{number_format($k->total_dua, 0, ',', '.')}}</p>
                                        @endif
                                        @if ($k->kebutuhan === "ketiga")
                                        <p class="text-dark text-xs font-weight-bold mb-0">Rp.{{number_format($k->total_tiga, 0, ',', '.')}}</p>
                                        @endif
                                        @if ($k->kebutuhan === "keempat")
                                        <p class="text-dark text-xs font-weight-bold mb-0">Rp.{{number_format($k->total_empat, 0, ',', '.')}}</p>
                                        @endif
                                        <p class="text-xs mb-0">Kebutuhan <span class="text-capitalize">{{$k->kebutuhan}}</span></p>
                                    </td>
                                    <td class="align-middle text-xs font-weight-bold text-wrap">{{$k->keterangan}}</td>
                                    <td class="align-middle text-center text-dark text-xs font-weight-bold">{{$k->tanggal}}</td>
                                    <td class="align-middle text-center text-dark text-xs font-weight-bold">Rp.{{number_format($k->total_gaji, 0, ',', '.')}}</td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#ubahKeterangan{{$k->id}}">
                                          Ubah Keterangan
                                        </button>
                                        <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editKeuangan{{$k->id}}">
                                          Edit
                                        </button>
                                    </td>
                                </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editKeuangan{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data keuangan</h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            </div>
                                            <div class="modal-body pb-0">
                                            {{-- <p class="text-sm"><i class="fa fa-fw fa-exclamation-circle text-warning"></i> Hati-hati dalam melakukan pengeditan keuangan anda, gunakan logika yang akurat.</p>
                                            <p class="text-sm">Jika saat ini jenis keuangan anda adalah <b>pemasukan</b>, jika jumlah anda adalah <b>Rp.5.000</b> namun anda ubah menjadi lebih rendah dari itu dengan jenis keuangan masih di <b>pemasukan</b>, maka sistem tidak bisa melakukan pengurangan nominal.</p>
                                            <p class="text-sm">Jika saat ini jenis keuangan anda adalah <b>pengeluaran</b>, jika jumlah anda adalah <b>Rp.5.000</b> namun anda ubah menjadi lebih rendah dari itu dengan jenis keuangan masih di <b>pengeluaran</b>, maka sistem tidak bisa melakukan penambahkan nominal.</p>
                                            <p class="text-sm">Solusinya adalah ubah jenis menjadi yang sebaliknya lalu klik simpan, tindakan ini untuk mengembalikan nilai ke awal, kemudian kembali edit dengan sesuai keuangan anda.</p> --}}
                                            @if ($k->jenis === "pemasukan")
                                                @if ($k->kebutuhan === "pertama")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_satu}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_satu - $k->jumlah, 0, ',', '.')}} <span class="text-xs text-danger">- Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "kedua")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_dua}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_dua - $k->jumlah, 0, ',', '.')}} <span class="text-xs text-danger">- Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "ketiga")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_tiga}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_tiga - $k->jumlah, 0, ',', '.')}} <span class="text-xs text-danger">- Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "keempat")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_empat}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_empat - $k->jumlah, 0, ',', '.')}} <span class="text-xs text-danger">- Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                            @endif

                                            @if ($k->jenis === "pengeluaran")
                                                @if ($k->kebutuhan === "pertama")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_satu}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_satu + $k->jumlah, 0, ',', '.')}} <span class="text-xs text-success">+ Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "kedua")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_dua}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_dua + $k->jumlah, 0, ',', '.')}} <span class="text-xs text-success">+ Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "ketiga")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_tiga}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_tiga + $k->jumlah, 0, ',', '.')}} <span class="text-xs text-success">+ Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                                @if ($k->kebutuhan === "keempat")
                                                    <p class="mb-0 text-sm">Kebutuhan {{$k->kebutuhan}} <b class="text-info text-gradient">{{$persen_empat}}%</b></p>
                                                    <h6>Rp.{{number_format($k->total_empat + $k->jumlah, 0, ',', '.')}} <span class="text-xs text-success">+ Rp.{{number_format($k->jumlah, 0, ',', '.')}}</span></h6>
                                                @endif
                                            @endif
                                            <p class="text-sm">Data keuangan yang akan diedit akan mengembalikan jumlah pemasukan/pengurangan serta nominal jenis kebutuhan, kemudian anda melakukan pengubahan data secara ulang, ini solusi saat ini untuk meminimalisir terjadinya kesalahan keuangan.</p>
                                            <form action="/manajemen-uang/updateKeuangan/{{$k->id}}" class="mb-0" method="post">
                                                @csrf
                                                    <div class="form-group">
                                                        <label>Jenis Kuangan</label>
                                                        <select name="jenis" class="form-select" required>
                                                            <option value="">Pilih</option>
                                                            <option value="pemasukan" {{$k->jenis === "pemasukan" ? 'selected' : ''}}>Pemasukan</option>
                                                            <option value="pengeluaran" {{$k->jenis === "pengeluaran" ? 'selected' : ''}}>Pengeluaran</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kebutuhan Kuangan</label>
                                                        <select name="kebutuhan" class="form-select" required>
                                                            <option value="">Pilih</option>
                                                            <option value="pertama" {{$k->kebutuhan === "pertama" ? 'selected' : ''}}>Kebutuhan Pertama</option>
                                                            <option value="kedua" {{$k->kebutuhan === "kedua" ? 'selected' : ''}}>Kebutuhan Kedua</option>
                                                            <option value="ketiga" {{$k->kebutuhan === "ketiga" ? 'selected' : ''}}>Kebutuhan Ketiga</option>
                                                            <option value="keempat" {{$k->kebutuhan === "keempat" ? 'selected' : ''}}>Kebutuhan Keempat</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah baru</label>
                                                        <input type="number" class="form-control" name="jumlah" placeholder="masukan jumlah" required>
                                                    </div>
                                                    <div class="text-end mt-3">
                                                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan perubahaan</button>
                                                    </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ubahKeterangan{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah keterangan</h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            </div>
                                            <div class="modal-body pb-0">
                                            <form action="/manajemen-uang/ubahKeterangan/{{$k->id}}" class="mb-0" method="post">
                                                @csrf
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" name="keterangan" placeholder="keterangan..." required>{{$k->keterangan}}</textarea>
                                                    </div>
                                                    <div class="text-end mt-3">
                                                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan perubahaan</button>
                                                    </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                  @endforeach
                                @else
                                  <tr>
                                    <td colspan="10" class="align-middle text-center text-secondary text-xs font-weight-bold py-5">Tidak ada data.</td>
                                  </tr>
                                @endif
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="aturManajemenUang" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Atur Manajemen Uang</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pb-0">
              <form action="/manajemen-uang/store" class="mb-0" method="post">
                @csrf
                    <div class="form-group">
                        <label>Gaji anda</label>
                        <input type="number" class="form-control" name="gaji" placeholder="Masukan gaji" required>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editManajemenUang" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Manajemen Uang</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pb-0">
                <p class="text-sm">Anda bebas melakukan perubahan persentase keuangan anda namun perlu diingat bahwa dari perubahaan yang anda lakukan, total dari keempat persentase harus menjadi <b>100%</b>, dan jika tidak sesuai, keuangan anda menjadi tidak tidak teratur dan terjadinya kesalahan dalam memanajemen keuangan anda.</p>
              <form action="/manajemen-uang/update/{{auth()->user()->id}}" class="mb-0" method="post">
                @csrf
                    <div class="form-group">
                        <label>Gaji anda</label>
                        <input type="number" class="form-control" name="gaji" value="{{$gaji_anda}}" placeholder="Masukan gaji" required>
                    </div>
                    <div class="form-group">
                        <label>persentase kebutuhan pertama</label>
                        <input type="number" class="form-control" name="persen_satu" value="{{$persen_satu}}" placeholder="Default : 40%" required>
                    </div>
                    <div class="form-group">
                        <label>persentase kebutuhan kedua</label>
                        <input type="number" class="form-control" name="persen_dua" value="{{$persen_dua}}" placeholder="Default : 30%" required>
                    </div>
                    <div class="form-group">
                        <label>persentase kebutuhan ketiga</label>
                        <input type="number" class="form-control" name="persen_tiga" value="{{$persen_tiga}}" placeholder="Default : 20%" required>
                    </div>
                    <div class="form-group">
                        <label>persentase kebutuhan keempat</label>
                        <input type="number" class="form-control" name="persen_empat" value="{{$persen_empat}}" placeholder="Default : 10%" required>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahKeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data keuangan</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pb-0">
              <form action="/manajemen-uang/storeKeuangan" class="mb-0" method="post">
                @csrf
                    <div class="form-group">
                        <label>Jenis Kuangan</label>
                        <select name="jenis" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kebutuhan Kuangan</label>
                        <select name="kebutuhan" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="pertama">Kebutuhan Pertama</option>
                            <option value="kedua">Kebutuhan Kedua</option>
                            <option value="ketiga">Kebutuhan Ketiga</option>
                            <option value="keempat">Kebutuhan Keempat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Masukan jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="keterangan..." required></textarea>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="hapusSemuaKeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body text-center pb-0">
              <form action="/manajemen-uang/delete/{{auth()->user()->id}}" class="mb-0" method="post">
                @csrf
                @method('delete')
                <h4 class="fw-semibold">Yakin hapus semua keuangan?</h4>
                <p>Tindakan ini dapat menghapus semua data keuangan anda secara keseluruhan.</p>
                <button type="submit" class="btn btn-sm bg-gradient-danger">Hapus</button>
                <button type="button" class="btn btn-sm bg-gradient-dark" data-bs-dismiss="modal">Kembali</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection