@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo</p>
                    <h5 class="font-weight-bolder mb-0">
                    Rp.{{$saldo}}
                    </h5>
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
      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "normal" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Normal</h5>
              <h2 class="text-white mt-2 mb-0">Gratis</h2>
              <h6 class="text-white">Pilihan biasa</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Biasa</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-danger shadow text-center">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.15.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "normal")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setNormal" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Coba gratis</button>
              </form>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "premium" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Premium</h5>
              <h2 class="text-white mt-2 mb-0"><small>Rp.</small>249.000</h2>
              <h6 class="text-white">Plihan terbaik</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Premium</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-danger shadow text-center">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.25.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "premium")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setPremium" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Dapatkan</button>
              </form>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "raja" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Raja</h5>
              <h2 class="text-white mt-2 mb-0"><small>Rp.</small>799.000</h2>
              <h6 class="text-white">Pilihan terbaik</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Premium plus</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.50.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "raja")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setRaja" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Dapatkan</button>
              </form>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "dewa" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Dewa</h5>
              <h2 class="text-white mt-2 mb-0"><small>Rp.</small>2.499.000</h2>
              <h6 class="text-white">Pilihan lengkap</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Master</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.75.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "dewa")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setDewa" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Dapatkan</button>
              </form>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "master" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Master</h5>
              <h2 class="text-white mt-2 mb-0"><small>Rp.</small>7.059.000</h2>
              <h6 class="text-white">Pilihan lengkap</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Master +</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.125.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "master")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setMaster" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Dapatkan</button>
              </form>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card card-pricing h-100">
          <div class="card-header {{auth()->user()->user_type === "pengembang" ? 'bg-gradient-info' : 'bg-gradient-dark'}} text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">Akun Pengembang</h5>
              <h2 class="text-white mt-2 mb-0"><small>Rp.</small>46.499.000</h2>
              <h6 class="text-white">Pilihan lengkap</h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>
              </div>
          </div>
          <div class="card-body text-center d-flex flex-column h-100">
            <div class="mx-auto my-3">
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-dark shadow text-center">
                        <i class="fas fa-minus opacity-10" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Fitur Pengembang</span>
                    </div>
                </div>
    
                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Akses pengguna akun</span>
                    </div>
                </div>

                <hr class="my-1 horizontal dark">
    
                <div class="d-flex justify-content-lg-start justify-content-center">
                    <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                        <i class="fas fa-check" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="ps-3">Buat laporan + <b>Rp.220.000</b></span>
                    </div>
                </div>
            </div>
            @if (auth()->user()->user_type === "pengembang")
              <button class="btn btn-sm bg-gradient-info w-100 mt-auto mb-0 disabled">Digunakan</button>
            @else
              <form action="/pengguna-akun/setPengembang" method="post" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-sm bg-gradient-dark w-100 mb-0">Dapatkan</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
@endsection