@extends('layouts.sidebar')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Tambah Pengguna</h6>
                {{-- <p class="text-sm mb-0">
                  <i class="fa fa-user text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">30 Akun</span> di dalam data
                </p> --}}
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
            <form action="/pengguna-akun/store" method="post">
                @csrf
                <div class="row px-4">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama panggilan</label>
                      <input type="text" name="nama_panggilan" class="form-control" placeholder="Nama panggilan" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="gender" class="form-control" required>
                          <option>Pilih</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Alamat email</label>
                      <input type="email" name="email" class="form-control" placeholder="Alamat email" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Password (minimal 8 karakter)</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Validasi password</label>
                      <input type="password" name="validasi_password" class="form-control" placeholder="Validasi password" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>telepon / Whatsapp</label>
                      <input type="number" name="no_hp" class="form-control" placeholder="+62" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Tempat lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir" required>
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
                                <input class="form-check-input" type="radio" value="normal" name="user_type" id="user_type1" required>
                                <label class="custom-control-label" for="user_type1">Akun biasa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="premium" name="user_type" id="user_type2" required>
                                <label class="custom-control-label text-info" for="user_type2">Akun premium</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="master" name="user_type" id="user_type3" required>
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
@endsection