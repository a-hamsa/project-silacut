@extends('layout.main')

@section('title')
    Data Pegawai Edit Data Pegawai
@endsection

@section('content')
<div class="p-4">
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Data Pegawai</h5>
                        <form action="/kelolapegawaibkd/{{$tb_pegawai->NIP}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtid" class="form-label">NIP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtid') is-invalid @enderror"
                                        placeholder="Masukkan NIP" name="NIP" id="txtid"
                                        value="{{ old('NIP', $tb_pegawai->NIP) }}">
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
                                        placeholder="Masukkan Nama" name="Nama Pegawai" id="txtname"
                                        value="{{ old('Nama Pegawai', $tb_pegawai->Nama_Pegawai) }}">
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
                                        placeholder="Tempat Lahir" name="Tempat Lahir" id="txtbirthplace"
                                        value="{{ old('Tempat Lahir', $tb_pegawai->Tempat_Lahir) }}">
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
                                        name="Tanggal Lahir" id="txtdateofbirth"
                                        value="{{ old('Tanggal Lahir', $tb_pegawai->Tanggal_Lahir) }}">
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
                                        aria-label="Default select example" id="txtgender" name="Id_Jenis_Kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        @foreach ($tb_jenis_kelamin as $tbjk)
                                            <option value="{{ $tbjk->Id_Jenis_Kelamin }}"
                                                {{ old('Id_Jenis_Kelamin', $tb_pegawai->Id_Jenis_Kelamin) == $tbjk->Id_Jenis_Kelamin ? 'selected' : '' }}>
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
                                        aria-label="Default select example" name="Id_Jabatan">
                                        <option selected>Pilih Jabatan</option>
                                        @foreach ($tb_jabatan as $tbj)
                                            <option value="{{ $tbj->Id_Jabatan }}"
                                                {{ old('Id_Jabatan', $tb_pegawai->Id_Jabatan) == $tbj->Id_Jabatan ? 'selected' : '' }}>
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
                                        aria-label="Default select example" name="Id_Dinas">
                                        <option selected>Pilih Dinas</option>
                                        @foreach ($tb_dinas as $tbd)
                                            <option value="{{ $tbd->Id_Dinas }}"
                                                {{ old('Id_Dinas', $tb_pegawai->Id_Dinas) == $tbd->Id_Dinas ? 'selected' : '' }}>
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
                                    <input type="date" class="form-control" name="Tanggal_Mulai" id="txtstartingdate"
                                        value="{{ old('Tanggal_Mulai', $tb_pegawai->Tanggal_Mulai, date('Y-m-d')) }}">
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
                                        placeholder="Masukkan Alamat Pegawai" name="Alamat_Pegawai" id="txtaddress"
                                        value="{{ old('Alamat', $tb_pegawai->Alamat_Pegawai) }}">
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
                                        aria-label="Default select example" name="Id_Golongan">
                                        <option selected>Pilih Golongan</option>
                                        @foreach ($tb_golongan as $tbg)
                                            <option value="{{ $tbg->Id_Golongan }}"
                                                {{ old('Id_Golongan', $tb_pegawai->Id_Golongan) == $tbg->Id_Golongan ? 'selected' : '' }}>
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
                                    <input type="text" class="form-control @error('txtphone') is-invalid @enderror"
                                        placeholder="Masukkan Nomor Telepon" name="Telepon_Pegawai" id="txtphone"
                                        value="{{ old('Telepon_Pegawai', $tb_pegawai->Telepon_Pegawai) }}">
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
</div>
@endsection
