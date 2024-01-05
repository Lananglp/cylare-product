@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="row flex-row-reverse px-0 mx-0">
            <div class="col-xl-12 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0">
                            <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Absensi</h6>
                                <p class="text-sm mb-0">
                                <i class="fa fa-user text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">{{$absensi->count()}} Absen</span> di dalam data
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
                    <div class="card-body d-flex flex-column">
                        @if ($cekAbsenHariIni)
                            <h4><i class="fa fa-fw fa-thumbs-up"></i> Terimakasih, Kamu sudah melakukan absensi hari ini.</h4>
                            <p class="text-sm text-dark">untuk melakukan perubahan data, silahkan edit data yang terbaru, tombol edit hanya bisa di akses hari ini untuk data yang terbaru.</p>
                        @else
                            @include('components.create-button', ['title' => "Buat Absensi hari ini", 'data_bs_toggle' => "modal", 'data_bs_target' => "#tambahAbsensi"]);
                        @endif
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Hari & Tanggal</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Masuk</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Pulang</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center"><i class="fa fa-cog"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                @if ($absensi->count() > 0)
                                  @foreach ($absensi as $index => $a)
                                  <tr>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-center text-secondary text-xs font-weight-bold">{{$index + 1}}</td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-center text-dark text-xs font-weight-bold"
                                    >
                                    @php
                                        $formatHariIndo = Carbon\Carbon::parse($a->tanggal)->translatedFormat('l, d F Y');
                                    @endphp
                                    {{$formatHariIndo}}
                                    </td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-center text-dark text-xs font-weight-bold">{{$a->absen_masuk ? $a->absen_masuk : '-'}}</td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-center text-dark text-xs font-weight-bold">{{$a->absen_keluar ? $a->absen_keluar : '-'}}</td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-xs font-weight-bold text-wrap">{{$a->keterangan ? $a->keterangan : '-'}}</td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded' : ''}} align-middle text-xs font-weight-bold text-wrap text-center"
                                    >
                                        @if ($a->ijin === 1)
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        @else
                                            <i class="fa fa-fw fa-check text-success"></i>
                                        @endif
                                    </td>
                                    <td class="{{$a->tanggal === $tanggal_sekarang ? 'bg-dark rounded text-white' : ''}} align-middle text-center">
                                        @if ($a->tanggal === $tanggal_sekarang)
                                        <button type="button" class="border-0 bg-transparent {{$a->tanggal === $tanggal_sekarang ? 'text-white' : 'text-secondary'}} font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editAbsensi{{$a->id}}">
                                            Edit
                                        </button>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="editAbsensi{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit absensi hari {{$formatHariIndo}}</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <div class="modal-body pb-0">
                                        <form action="/absensi/update/{{$a->id}}" class="mb-0" method="post">
                                          @csrf
                                              <div class="form-group">
                                                  <label>Waktu masuk</label>
                                                  <input type="time" name="absen_masuk" class="form-control" value="{{$a->absen_masuk}}">
                                              </div>
                                              <div class="form-group">
                                                  <label>Waktu pulang</label>
                                                  <input type="time" name="absen_keluar" class="form-control" value="{{$a->absen_keluar}}">
                                              </div>
                                              <div class="form-group">
                                                  <label>Keterangan</label>
                                                  <textarea class="form-control" name="keterangan" placeholder="keterangan...">{{$a->keterangan}}</textarea>
                                              </div>
                                              <div class="form-check form-switch">
                                                  <input class="form-check-input" name="ijin" value="1" type="checkbox" role="switch" id="absenIjin" {{$a->ijin === 1 ? 'checked' : ''}}>
                                                  <label class="form-check-label" for="absenIjin"><b>Izin absensi</b></label>
                                              </div>
                                              <div class="text-end mt-3">
                                                  <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat data absensi hari ini</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pb-0">
              <form action="/absensi/store" class="mb-0" method="post">
                @csrf
                    <div class="form-group">
                        <label>Waktu masuk</label>
                        <input type="time" name="absen_masuk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Waktu pulang</label>
                        <input type="time" name="absen_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="keterangan..."></textarea>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="ijin" value="1" type="checkbox" role="switch" id="absenIjin">
                        <label class="form-check-label" for="absenIjin"><b>Izin absensi</b></label>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection