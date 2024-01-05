@extends('layouts.sidebar')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body px-0 pb-2">
            <div class="accordion-1">
                <div class="container">
                  <div class="row mt-5">
                    <div class="col-md-6 mx-auto text-center">
                      <h2 class="text-info text-gradient">Laporan Harian Anda</h2>
                      <p>Beberapa perusahaan memiliki aturan seperti laporan perharinya, dengan adanya laporan tiap hari, para karyawan dapat mengetahui perkembangan yang telah dilakukan setiap hari.</p>
                    </div>
                  </div>
                  <div class="row justify-content-center mb-5">
                    <div class="col-md-3">
                        @if ($cek_laporan_harian)
                        <button type="button" class="w-100 btn btn-sm bg-gradient-dark disabled d-flex justify-content-center align-items-center">Laporan sudah dibuat</button>
                        @else
                          <button type="button" class="w-100 btn btn-sm bg-gradient-info d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#createLaporanHarian"><i class="fa fa-fw fa-plus me-1"></i> Buat Laporan harian</button>
                        @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 mx-auto">
                      <div class="accordion" id="accordionRental">
                        @foreach ($laporan as $lpr)
                        <div class="accordion-item mb-3">
                          <h5 class="accordion-header" id="header{{$lpr->id}}">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#laporan{{$lpr->id}}" aria-expanded="false" aria-controls="laporan{{$lpr->id}}">
                              @php
                                  $tanggalSekarang = Carbon\Carbon::parse($lpr->tanggal)->translatedFormat('l, d F Y');
                              @endphp
                              {{$tanggalSekarang}}
                              <i class="fa fa-chevron-down text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                            </button>
                          </h5>
                          <div id="laporan{{$lpr->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                            <div class="accordion-body text-sm">
                              <button class="btn btn-sm bg-gradient-dark py-0 mb-1 rounded-1 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#editLaporanHarian{{$lpr->id}}"><i class="fa fa-fw fa-pen me-1"></i> Edit</button>
                              <p class="mb-0 text-sm">{{$lpr->text}}</p>
                            </div>
                          </div>
                        </div>

                        {{-- EDIT --}}
                        <div class="modal fade" id="editLaporanHarian{{$lpr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Laporan harian</h5>
                                @if ($lpr->tanggal !== $tanggal_sekarang)
                                <button type="button" class="border-0 bg-transparent text-danger" data-bs-toggle="modal" data-bs-target="#deleteLaporanHarian">
                                  <i class="fa fa-fw fa-trash-alt"></i>
                                </button>
                                @endif
                              </div>
                              <div class="modal-body pb-0">
                                <form action="/laporan-harian/update/{{$lpr->id}}" class="mb-0" method="post">
                                  @csrf
                                    <textarea class="form-control mb-3" name="text" rows="6">{{$lpr->text}}</textarea>
                                    <div class="text-end">
                                      <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                                      <button data-bs-dismiss="modal" type="button" class="btn btn-sm bg-gradient-dark">Kembali</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- END EDIT --}}

                        <div class="modal fade" id="deleteLaporanHarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-body text-center pb-0">
                                <form action="/laporan-harian/delete/{{$lpr->id}}" class="mb-0" method="post">
                                  @csrf
                                  @method('delete')
                                  <h4 class="fw-semibold">Yakin hapus laporan harian ini?</h4>
                                  <p>Tekan tombol hapus untuk melanjutkan penghapusan data.</p>
                                  <button type="submit" class="btn btn-sm bg-gradient-danger">Hapus</button>
                                  <button type="button" class="btn btn-sm bg-gradient-dark" data-bs-dismiss="modal">Kembali</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  
      <!-- Modal -->
      <div class="modal fade" id="createLaporanHarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Laporan harian</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pb-0">
              <form action="/laporan-harian/store" class="mb-0" method="post">
                @csrf
                  <textarea class="form-control mb-3" name="text" rows="6"></textarea>
                  <div class="text-end">
                    <button type="submit" class="btn btn-sm bg-gradient-info">Tambah</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection