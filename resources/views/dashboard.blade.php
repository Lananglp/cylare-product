@extends('layouts.sidebar')

@section('content')
  <div class="row">
    <div class="col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <h2>Halo, {{auth()->user()->nama_lengkap}}</h2>
          <p>Cylare Product A merupakan sistem berbasis web yang bertujuan untuk mencatat data pribadi anda, kami hadir untuk membantu anda didalam memanajemen kehidupan anda sehari hari.</p>
          @if (!$cekAbsenHariIni || !$cek_laporan_harian || !$cek_keuangan)
            <h6>Kami melakukan analisa setiap hari dan menemukan bahwa anda :</h6>
          @endif
          @if (!$cekAbsenHariIni)
            <h3>Anda hari ini belum melakukan absensi.</h3>
            <a href="/absensi" class="btn btn-sm bg-gradient-info">Mulai melakukan absensi</a>
          @endif
          @if (!$cek_laporan_harian)
            <h3>Anda hari ini belum melakukan laporan harian.</h3>
            <a href="/laporan-harian" class="btn btn-sm bg-gradient-info">Mulai melakukan laporan harian</a>
          @endif
          @if (!$cek_keuangan)
            <h3>Anda hari ini belum mengecek keuangan anda.</h3>
            <a href="/manajemen-uang" class="btn btn-sm bg-gradient-info">cek keuangan disini</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="w-lg-auto w-100 me-lg-2 mb-3 border-0 px-4 py-1 rounded-2 fw-bold text-sm text-body bg-white shadow-xs" data-bs-toggle="collapse" data-bs-target="#collapseIndikator">
    <i class="fa fa-eye me-1"></i> Tampilkan Indikator
  </button>
    <div class="row collapse" id="collapseIndikator">
      <div class="col-xl-3 col-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo</p>
                  <h6 class="font-weight-bolder mb-0">
                    Rp.{{$saldo}}
                  </h6>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Laporan Harian</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$total_laporanHarian}}
                    <span class="text-success text-sm font-weight-bolder">+{{$total_laporanHarian}}%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-book text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengguna</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$total_users}}
                    <span class="text-success text-sm font-weight-bolder">+{{$total_users}}%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo akun baru</p>
                  <form action="/pengguna-akun/saldoGratis" method="post">
                    @csrf
                    @if (auth()->user()->saldoHarian == true)
                      <button type="button" class="btn btn-sm bg-gradient-dark py-1 mb-0 disabled">Diklaim</button>
                    @else
                      <button type="submit" class="btn btn-sm bg-gradient-dark py-1 mb-0" style="font-size: 10px">Klaim Rp.150.000</button>
                    @endif
                  </form>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button type="button" class="w-lg-auto w-100 mb-3 border-0 py-1 rounded-2 fw-bold text-sm text-body bg-white shadow-xs" data-bs-toggle="collapse" data-bs-target="#collapseRekapSaldo">
      <i class="fa fa-eye me-1"></i> Tampilkan Rekap Saldo
    </button>
    <div class="row collapse" id="collapseRekapSaldo">
      <div class="col-xl-12 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Rekap pemasukan & pengeluaran</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-book text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">{{$history->count()}} rekapan</span> di dalam data
                </p>
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">No</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Pemasukan</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Pengeluaran</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($history->count() > 0)
                    @foreach ($history as $index => $h)
                    <tr>
                      <td class="align-middle text-center text-xs font-weight-bold">{{$index + 1}}</td>
                      <td class="align-middle text-center text-success text-xs font-weight-bold">Rp.{{$h->pemasukan ? number_format($h->pemasukan, 0, ',', '.') : '0'}}</td>
                      <td class="align-middle text-center text-danger text-xs font-weight-bold">Rp.{{$h->pengeluaran ? number_format($h->pengeluaran, 0, ',', '.') : '0'}}</td>
                      <td class="align-middle text-center text-xs font-weight-bold">Rp.{{number_format($h->total_saldo, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="align-middle text-center text-secondary text-xs font-weight-bold py-5">Tidak ada data.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection