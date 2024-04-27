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
                        <h5 class="card-title">Form Edit Data OPD</h5>
                        <form action="/kelolaopd/{{$tb_dinas->Id_Dinas}}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtdepartment" class="form-label">Nama Dinas</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtdepartment') is-invalid @enderror"
                                        placeholder="Masukkan Nama" name="Dinas" id="txtdepartment"
                                        value="{{ old('Dinas', $tb_dinas->Dinas) }}">
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
