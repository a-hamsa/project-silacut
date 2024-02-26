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
                        <h5 class="card-title">Form Tambah Data Pegawai</h5>
                        <form action="{{ route('kelolapegawaibkd.store') }}" method="POST">
                        {{-- <form action="/kelolapegawaibkd" method="POST"> --}}
                        {{-- <form method="POST" action="{{ route('kelolapegawaibkd.store') }}"> --}}
                            @csrf
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtid" class="form-label">NIP</label>
                                <div class="input-group">
                                    <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control @error('txtid') is-invalid @enderror"
                                        placeholder="Masukkan NIP" name="txtid" id="txtid"
                                        value="{{ old('txtid') }}">
                                    @error('txtid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtname" class="form-label">Nama Pegawai</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtname') is-invalid @enderror"
                                        placeholder="Masukkan Nama" name="txtname" id="txtname"
                                        value="{{ old('txtname') }}">
                                    @error('txtname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtbirthplace" class="form-label">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtbirthplace') is-invalid @enderror"
                                        placeholder="Tempat Lahir" name="txtbirthplace" id="txtbirthplace"
                                        value="{{ old('txtbirthplace') }}">
                                    @error('txtbirthplace')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtdateofbirth" class="form-label required-label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('txtdateofbirth') is-invalid @enderror"
                                        name="txtdateofbirth" id="txtdateofbirth" value="{{ old('txtdateofbirth') }}">
                                    @error('txtdateofbirth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select class="form-select @error('txtgender') is-invalid @enderror"
                                        aria-label="Default select example" id="txtgender" name="txtgender">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        @foreach ($tb_jenis_kelamin as $tbjk)
                                            <option value="{{ $tbjk->Id_Jenis_Kelamin }}"
                                                {{ old('txtgender') == $tbjk->Id_Jenis_Kelamin ? 'selected' : '' }}>
                                                {{ $tbjk->Jenis_Kelamin }}
                                            </option>
                                        @endforeach
                                        @error('txtgender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label class="form-label">Jabatan</label>
                                <div class="input-group">
                                    <select class="form-select @error('txtposition') is-invalid @enderror"
                                        aria-label="Default select example" name="txtposition">
                                        <option selected>Pilih Jabatan</option>
                                        @foreach ($tb_jabatan as $tbj)
                                            <option value="{{ $tbj->Id_Jabatan }}"
                                                {{ old('txtposition') == $tbj->Id_Jabatan ? 'selected' : '' }}>
                                                {{ $tbj->Jabatan }}
                                            </option>
                                        @endforeach
                                        @error('txtposition')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Dinas</label>
                                <div class="input-group">
                                    <select class="form-select @error('txtdepartment') is-invalid @enderror"
                                        aria-label="Default select example" name="txtdepartment">
                                        <option selected>Pilih Dinas</option>
                                        @foreach ($tb_dinas as $tbd)
                                            <option value="{{ $tbd->Id_Dinas }}"
                                                {{ old('txtdepartment') == $tbd->Id_Dinas ? 'selected' : '' }}>
                                                {{ $tbd->Dinas }}
                                            </option>
                                        @endforeach
                                        @error('txtdepartment')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtstartingdate" class="form-label required-label">Tanggal Mulai</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="txtstartingdate" id="txtstartingdate"
                                        value="{{ old('txtstartingdate', date('Y-m-d')) }}">
                                    @error('txtstartingdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtaddress" class="form-label">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtaddress') is-invalid @enderror"
                                        placeholder="Masukkan Alamat Pegawai" name="txtaddress" id="txtaddress">
                                    @error('txtaddress')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Golongan</label>
                                <div class="input-group">
                                    <select class="form-select @error('txtgroup') is-invalid @enderror"
                                        aria-label="Default select example" name="txtgroup">
                                        <option selected>Pilih Golongan</option>
                                        @foreach ($tb_golongan as $tbg)
                                            <option value="{{ $tbg->Id_Golongan }}"
                                                {{ old('txtgroup') == $tbg->Id_Golongan ? 'selected' : '' }}>
                                                {{ $tbg->Golongan }}
                                            </option>
                                        @endforeach
                                        @error('txtgroup')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtphone" class="form-label">Telepon Pegawai</label>
                                <div class="input-group">
                                    <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control @error('txtphone') is-invalid @enderror"
                                        placeholder="Masukkan Nomor Telepon" name="txtphone" id="txtphone"
                                        value="{{ old('txtphone') }}">
                                    @error('txtphone')
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
    <script>
        document.getElementById('txtid').addEventListener('input', function(event) {
            // Menghapus karakter selain angka
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('txtphone').addEventListener('input', function(event) {
        // Menghapus karakter selain angka
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    </script>
    
@endsection
