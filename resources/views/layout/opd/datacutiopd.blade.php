@extends('layout.main')

@section('title')
    Data Cuti
@endsection

@section('content')
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="myForm">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Detail Cuti</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Pilih Pegawai</label>
                    </div>
                    <div class="col-9">
                        <select class="form-control w-100" name="pegawai" id="pegawai" placeholder="-- Nama Pegawai --">
                                <option value="" disabled selected>-- Pilih Pegawai --</option>
                            @foreach ($tb_pegawai as $tbp)
                                <option value="{{$tbp->NIP}}">{{$tbp->Nama_Pegawai}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr style="height:3px;border:none;color:#000;background-color:#000;margin-bottom: 16px;">
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Nama">Nama</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="nama" name="Nama" disabled require>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="NIP">NIP</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="nip" name="NIP" disabled require>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Jabatan">Jabatan</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="jabatan" name="Jabatan" disabled require>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Masa Kerja">Masa Kerja</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control w-100" id="tahun" name="tahun" disabled require>
                    </div>
                    <div class="col-1">
                        <label for="Tahun" class="text-center">Tahun</label>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control w-100" id="bulan" name="bulan" disabled require>
                    </div>
                    <div class="col-1">
                        <label for="" class="text-end">Bulan</label>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Unit Kerja">Unit Kerja</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="unit_kerja" name="unit_kerja" disabled require>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="sisa_cuti">Sisa Cuti</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="sisa_cuti" name="sisa_cuti" disabled require>
                    </div>
                </div>

                <hr style="height:3px;border:none;color:#000;background-color:#000;margin-bottom: 16px;">
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Jenis Cuti</label>
                    </div>
                    <div class="col-9">
                        <select class="form-control w-100" name="jenis_cuti" id="jenisCuti" placeholder="-- Jenis Cuti --">
                                <option value="" disabled selected>-- Jenis Cuti --</option>
                            @foreach ($tb_jenis_cuti as $tjc)
                                <option value="{{$tjc->Nama_Jenis_Cuti}}">{{$tjc->Nama_Jenis_Cuti}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="alasan_cuti">Alasan Cuti</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="alasan_cuti" name="alasan_cuti">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Tanggal Cuti">Tanggal Cuti</label>
                    </div>
                    <div class="col-1">
                        <label for="dari" class="text-center">Dari</label>
                    </div>
                    <div class="col-4">
                        <input type="date" class="form-control w-100" id="dari" name="dari">
                    </div>
                    <div class="col-1">
                        <label for="sampai" class="text-end">Sampai</label>
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control w-100" id="sampai" name="sampai">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="cuti_besar">Cuti Besar</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="cuti_besar" name="cuti_besar">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="cuti_sakit">Cuti Sakit</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="cuti_sakit" name="cuti_sakit">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="cuti_melahirkan">Cuti Melahirkan</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="cuti_melahirkan" name="cuti_melahirkan">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="cuti_alasan_penting">Cuti Alasan Penting</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="cuti_alasan_penting" name="cuti_alasan_penting">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="cuti_luar_negara">Cuti Diluar Tanggungan Negara</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="cuti_luar_negara" name="cuti_luar_negara">
                    </div>
                </div>


                <hr style="height:3px;border:none;color:#000;background-color:#000;margin-bottom: 16px;">
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="alamat_cuti">Alamat Cuti</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="alamat_cuti" name="alamat_cuti">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="no_telp">Nomor Telpon</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control w-100" id="no_telp" name="no_telp">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button id="printCuti" class="btn" style="background-color: #FB6340; color: white;"><i class="fa-solid fa-print"></i> Print File Permohonan Cuti</button>
                    </div>
                </div>
                <hr style="height:3px;border:none;color:#000;background-color:#000;margin-bottom: 16px;">

                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="SKTerakhir">Scan SK Terakhir</label>
                    </div>
                    <div class="col-9">
                        <input type="file" class="form-control" name="SKTerakhir">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="Absen">Scan Rekap Absen</label>
                    </div>
                    <div class="col-9">
                        <input type="file" class="form-control" name="Absen">
                    </div>
                </div>
                <div class="row m-0 pb-4">
                    <div class="col-3">
                        <label for="scan_cuti">Scan Permohonan Cuti</label>
                    </div>
                    <div class="col-9">
                        <input type="file" class="form-control" name="scan_cuti">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </form>
    </div>
  </div>
</div>

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
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_cuti as $tbc)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $tbc->pegawai->NIP}}</td>
                            <td>{{ $tbc->pegawai->Nama_Pegawai }}</td>
                            <td>{{ $tbc->jeniscuti->Nama_Jenis_Cuti}}</td>
                            <td>{{ $tbc->Tanggal_Mulai_Cuti }} s.d {{ $tbc->Tanggal_Berakhir_Cuti }}</td>
                            <td>{{ $tbc->Tanggal_Pengajuan}}</td>
                            {{-- <td>
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
                                                data-nip="{{ $tbc->NIP }}" data-nama="{{ $tbc->pegawai->Nama_Pegawai }}"
                                                style="border-radius:5px;">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td> --}}
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
                nip: pegawai,
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
                $('#unit_kerja').val(response.Id_Dinas);
                $('#sisa_cuti').val(response.sisa_cuti);
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
        // let nip = $('#nip').val();
        let formData = $(this).serialize();
        if (nip != null) {
            window.open("/fileCutiOPD?" + formData, '_blank');
        }
    });

});
</script>
@endsection
