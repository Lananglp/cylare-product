@extends('layouts.sidebar')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Komentar Publik</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-user text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">{{$komentar->count()}} Komentar</span> di dalam data
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
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr class="text-center">
                    <th class="text-uppercase text-info text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-info text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-info text-xxs font-weight-bolder opacity-7 ps-2">Komentar</th>
                    <th class="text-uppercase text-info text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-info text-xxs font-weight-bolder opacity-7">Status Balasan</th>
                    <th class="text-info opacity-7"><i class="fa fa-fw fa-sm fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($komentar as $key => $k)
                  <tr>
                    <td class="py-0 text-dark text-xs font-weight-bold text-center">
                        {{$key + 1}}
                    </td>
                    <td class="py-0 text-dark">
                        <span class="text-xs font-weight-bold">{{$k->name}}</span>
                    </td>
                    <td class="py-0 text-dark align-middle">
                        <span class="text-xs font-weight-bold">{{$k->komentar}}</span>
                    </td>
                    <td class="py-0 text-dark text-center">
                        <p class="text-xs font-weight-bold mb-0">{{$k->tanggal}}</p>
                    </td>
                    <td class="py-0 text-dark text-center">
                        @if ($k->balasan !== null)
                            <i class="fa text-sm fa-fw fa-check text-success"></i>
                        @else
                            <i class="fa text-sm fa-fw fa-close text-danger"></i>
                        @endif
                    </td>
                    <td class="py-0 d-flex justify-content-center align-items-center align-middle text-center">
                        <button type="button" class="text-dark border-0 bg-transparent font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editKomentar{{$k->id}}">
                            Edit
                        </button>
                        <button class="border-0 bg-transparent" type="button" data-bs-toggle="modal" data-bs-target="#hapusKomentar{{$k->id}}"><i class="fa fa-fw fa-trash-alt text-danger fa-sm align-middle"></i></button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="editKomentar{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Komentar</h5>
                              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body pb-0">
                              <form action="/komentar-publik/update/{{$k->id}}" class="mb-0" method="post">
                                @csrf
                                    <div class="mb-2">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name" name="name" value="{{$k->name}}" class="form-control form-control-sm" placeholder="Ketik disini..." required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="komentar">Komentar</label>
                                        <textarea id="komentar" name="komentar" class="form-control form-control-sm" rows="4" placeholder="ketik disini..." required>{{$k->komentar}}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="balasan">Balasan anda</label>
                                        <textarea id="balasan" name="balasan" class="form-control form-control-sm" rows="4" placeholder="ketik disini..."></textarea>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-sm bg-gradient-info">Simpan</button>
                                    </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="modal fade" id="hapusKomentar{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-body text-center pb-0">
                            <form action="/komentar-publik/delete/{{$k->id}}" class="mb-0" method="post">
                            @csrf
                            @method('delete')
                            <h4 class="fw-semibold">Yakin hapus komentar dari<br>{{$k->name}}?</h4>
                            <p>Tekan tombol hapus untuk melanjutkan.</p>
                            <button type="submit" class="btn btn-sm bg-gradient-danger">Hapus</button>
                            <button type="button" class="btn btn-sm bg-gradient-dark" data-bs-dismiss="modal">Kembali</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection