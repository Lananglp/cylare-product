@extends('layouts.sidebar')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Pengguna Akun</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-user text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">{{$users->count()}} Akun</span> di dalam data
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
            <div class="px-4">
              <a href="/pengguna-akun/create" class="w-sm-auto w-100 btn btn-sm bg-gradient-info"><span class="d-flex justify-content-center align-items-center"><i class="fa fa-fw fa-plus me-1"></i> Tambah Pengguna</span></a>
            </div>
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipe & jenis kelamin</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tempat & tanggal lahir</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terbit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ganti akun</th>
                    <th class="text-center text-secondary opacity-7"><i class="fa fa-fw fa-sm fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <i class="avatar avatar-sm bg-gradient-info fa fa-fw fa-user me-3"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$user->nama_lengkap}}</h6>
                          <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Akun <span class="text-capitalize">{{$user->user_type}}</span></p>
                      <p class="text-xs text-secondary mb-0">{{$user->gender}}</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$user->tempat_lahir}}</p>
                      <p class="text-xs text-secondary mb-0">{{$user->tanggal_lahir}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm {{$user->user_status ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">{{$user->user_status ? 'Aktif' : 'Nonaktif'}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$user->created_at}}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <form action="/pengguna-akun/gantiAkun/{{$user->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm bg-gradient-info py-1 px-2 mb-0"><i class="fa fa-sign-in-alt fs-6"></i></button>
                      </form>
                    </td>
                    <td class="align-middle text-center">
                      <a href="/pengguna-akun/edit/{{$user->id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
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