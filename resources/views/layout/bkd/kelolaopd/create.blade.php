@extends('layout.main')

@section('title')
    Data Pegawai Tambah Data Pegawai
@endsection

@section('content')
<div class="p-4">
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-title pt-3">
                        <h5 class="text-center">Form Tambah Data Dinas</h5>
                    </div>
                    <div class="card-body">
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
</div>
@endsection
