@extends('layout.main')

@section('title')
    Data Cuti
@endsection

@section('content')

<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" data-bs-whatever="@mdo"><i class="fa-solid fa-user-plus me-2"></i><span>Usul Cuti</span></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <h1 class="card-title"></h1>
            <table id="kelolapegawaiopd" class="table table-striped" style="width:100%; ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Cuti</th>
                        <th>Diajukan</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_cuti as $tbc)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $tbc->NIP}}</td>
                            <td>{{ $tbc->pegawai->Nama_Pegawai }}</td>
                            <td><span class="badge text-bg-success">{{ $tbc->jeniscuti->Nama_Jenis_Cuti}}</span></td>
                            <td>{{ $tbc->Tanggal_Mulai_Cuti }} s.d {{ $tbc->Tanggal_Berakhir_Cuti }}</td>
                            <td>{{ $tbc->Tanggal_Pengajuan}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewperiksa{{ $tbc->Id_Data_Cuti }}"><i class="far fa-eye"></i></button>

                                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                                    <a href="kelolapegawaibkd/{{ $tbc->Id_Data_Cuti }}/edit"
                                        class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="kelolapegawaibkd/{{ $tbc->Id_Data_Cuti }}" method="POST" id="deleteFormKelolaPegawaiBkd">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm delete"
                                                data-nip="{{ $tbc->NIP }}" data-nama="{{ $tbc->Nama_Pegawai }}"
                                                style="border-radius:5px;">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="card-title"></h1>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    function updatePegawai() {
        var pegawai = $('#pegawai').val();
        $.ajax({
            url: "{{ route('getpegawai') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                pegawai: pegawai,
            },
            success: function(response){
                console.log(response)
                let currentDate = new Date();
                let masa_kerja = new Date(response.Tanggal_Mulai);
                let tahun = currentDate.getFullYear() - masa_kerja.getFullYear();
                let bulan = currentDate.getMonth() - masa_kerja.getMonth() + 1;
                if (bulan < 0) {
                    tahun = tahun - 1
                    bulan = bulan + 12;
                }
                $('#nama').val(response.Nama_Pegawai);
                $('#nip').val(response.NIP.toString());
                $('#jabatan').val(response.Id_Jabatan);
                $('#tahun').val(tahun);
                $('#bulan').val(bulan);
                $('#unit_kerja').val(response.Id_Golongan);
            },
            error: function(xhr, status, error){
                console.error('Terjadi kesalahan: ' + error);
            }
        });
    }

    $('#pegawai').on('change', function(){
        updatePegawai()
    });

    $("#myForm").submit(function(event) {
        event.preventDefault();
        let nip = $('#nip').val();
        if (nip != null) {
            window.open("/fileCutiOPD?nip=" + nip, '_blank');
        }
    });

});
</script>
@endsection
