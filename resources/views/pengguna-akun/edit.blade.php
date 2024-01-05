@extends('layouts.sidebar')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Edit Pengguna</h6>
                {{-- <p class="text-sm mb-0">
                  <i class="fa fa-user text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">30 Akun</span> di dalam data
                </p> --}}
              </div>
              <div class="col-lg-6 col-5 d-flex justify-content-end my-auto">
                <button type="button" class="btn btn-sm btn-danger d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#deletePenggunaAkun"><i class="fa fa-fw fa-trash-alt me-1"></i> Hapus akun</button>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form action="/pengguna-akun/update/{{$users->id}}" method="post">
                @csrf
                <div class="row px-4">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama panggilan</label>
                      <input type="text" name="nama_panggilan" class="form-control" placeholder="Nama panggilan" value="{{$users->nama_panggilan}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="{{$users->nama_lengkap}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="gender" class="form-control" required>
                          <option value="Laki-laki" {{$users->gender === "Laki-laki" ? 'selected' : ''}}>Laki-laki</option>
                          <option value="Perempuan" {{$users->gender === "Perempuan" ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Alamat email</label>
                      <input type="email" name="email" class="form-control" placeholder="Alamat email" value="{{$users->email}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Password (minimal 8 karakter)</label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Validasi password</label>
                      <input type="password" name="validasi_password" class="form-control" placeholder="Validasi password">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required>{{$users->alamat}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>telepon / Whatsapp</label>
                      <input type="number" name="no_hp" class="form-control" placeholder="+62" value="{{$users->no_hp}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Tempat lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="{{$users->tempat_lahir}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir" value="{{$users->tanggal_lahir}}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Jabatan <span class="text-danger">(dalam pengembangan)</span></label>
                        <select name="jabatan" class="form-control" disabled>
                          <option>Pilih</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Group <span class="text-danger">(dalam pengembangan)</span></label>
                        <select name="group" class="form-control" disabled>
                          <option>Pilih</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Tipe pengguna</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="normal" name="user_type" id="user_type1" {{$users->user_type === "normal" ? 'checked' : ''}} required>
                                <label class="custom-control-label" for="user_type1">Akun biasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="premium" name="user_type" id="user_type2" {{$users->user_type === "premium" ? 'checked' : ''}} required>
                                <label class="custom-control-label text-info" for="user_type2">Akun premium</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="master" name="user_type" id="user_type3" {{$users->user_type === "master" ? 'checked' : ''}} required>
                                <label class="custom-control-label text-primary" for="user_type3">Akun master</label>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="btn-group w-100">
                        <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                        <a href="/pengguna-akun" class="btn btn-sm btn-dark">Kembali</a>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deletePenggunaAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center pb-0">
            <form action="/pengguna-akun/delete/{{$users->id}}" class="mb-0" method="post">
              @csrf
              @method('delete')
              <h4 class="fw-semibold">Yakin hapus pengguna ini?</h4>
              <p>Tekan tombol hapus untuk menghapus pengguna ini.</p>
              <button type="submit" class="btn btn-sm bg-gradient-danger">Hapus</button>
              <button type="button" class="btn btn-sm bg-gradient-dark" data-bs-dismiss="modal">Kembali</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection