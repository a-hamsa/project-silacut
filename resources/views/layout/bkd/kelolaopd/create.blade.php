@extends('layout.main')

@section('judul')
    Data Pegawai
@endsection

@section('subjudul')
    Tambah Data Pegawai
@endsection

@section('isi')
    {{-- <section class="section">
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
    </section> --}}

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Data Dinas</h5>
                        <form action="{{ route('kelolaopd.store') }}" method="POST">
                        {{-- <form action="/kelolapegawaibkd" method="POST"> --}}
                        {{-- <form method="POST" action="{{ route('kelolapegawaibkd.store') }}"> --}}
                            @csrf
                            
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtdepartment" class="form-label">Nama Dinas</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtdepartment') is-invalid @enderror"
                                        placeholder="Masukkan Nama" name="txtdepartment" id="txtdepartment"
                                        value="{{ old('txtdepartment') }}">
                                    @error('txtdepartment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
