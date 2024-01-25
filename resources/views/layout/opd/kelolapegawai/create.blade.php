@extends('layout.main')

@section('judul')
    Data Pegawai
@endsection

@section('subjudul')
    Tambah Data Pegawai
@endsection

@section('isi')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Perhatian!!</h4>
                    <p>1. Mohon pastikan bahwa seluruh data telah diisi dengan lengkap sebelum disimpan. Hal ini penting
                        untuk memastikan kelengkapan informasi</p>
                    <hr>
                    <p class="mb-0">Terima kasih atas perhatiannya dalam pengisian data <i
                            class="fa-solid fa-face-smile"></i></p>

                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Data Pegawai</h5>
                        <form action="" method="POST">
                            @csrf
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputText" class="form-label">NIP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip"
                                        id="nip">
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputText" class="form-label">Nama Pegawai</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama"
                                        id="nama">
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputDate" class="form-label required-label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Jabatan</label>
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example" name="jabatan">
                                        <option selected>Pilih Jabatan</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Dinas</label>
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example" name="dinas">
                                        <option selected>Pilih Dinas</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputDate" class="form-label required-label">Tanggal Mulai</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputText" class="form-label">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Alamat Pegawai"
                                        name="alamat_pegawai" id="alamat_pegawai">
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Golongan</label>
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example" name="golongan">
                                        <option selected>Pilih Golongan</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="inputText" class="form-label">Telepon Pegawai</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon"
                                        name="telepon_pegawai" id="telepon_pegawai">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary"
                                        style="margin-left: auto;"><i class="fa-solid fa-backward"></i><span>
                                            Kembali</span></a>
                                    <button type="submit" name="submit" value="Save"
                                        class="btn btn-custom">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
