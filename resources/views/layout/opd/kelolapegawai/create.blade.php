@extends('layout.main')

@section('title')
    Data Pegawai Tambah Data Pegawai
@endsection

@section('content')
<div class="p-4">    
    <section class="section">
        <div class="card w-100">
            <div class="card-title pt-3">
                <h5 class="text-center">Form Tambah Data Pegawai</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('storepegawaiopd') }}">
                    @csrf    
                    <div class="col-md-12 mb-4">
                        <select name="NIP" class="form-select" id="nip" placeholder="Cari Pegawai">
                            <option value="">Cari Pegawai</option>
                            @foreach($tb_pegawai as $pgw)
                                @if($pgw->Id_Dinas == '2')
                                <option value="{{$pgw->NIP}}">{{$pgw->Nama_Pegawai}} ({{$pgw->NIP}})</option>
                                @endif
                            @endforeach
                        </select>
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
    </section>
</div>

<script>
$(document).ready(function() {
    $('#nip').selectize({
        sortField: 'text'
    });
})
</script>
@endsection
