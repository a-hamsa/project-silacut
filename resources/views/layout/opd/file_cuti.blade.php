<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/logomorowali.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logomorowali.png') }}" rel="apple-touch-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>File Permohonan Cuti</title>
    <style>
        *{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <div>Bungku, {{ now()->format('Y-m-d') }}</div>
                <br>
                <div>Kepada, Yth,</div>
                <div>Kepala Badan Kepagawaian</div>
                <div>Pengembangan Dan Sumber Daya</div>
                <div>Manusia Daerah Kab. Morowali</div>
                <div>Di, Tempat</div>
            </div>
        </div>
        <br>
        <div class="fw-bold text-center">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</div>
        <table class="table table-bordered border-black" >
            <tbody>
                <tr>
                    <td class="fw-bold" colspan="7">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td colspan="6">{{$tb_pegawai->Nama_Pegawai}}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td colspan="6">{{$tb_pegawai->NIP}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td colspan="6">{{$tb_pegawai->jabatan->Jabatan}}</td>
                </tr>
                <tr>
                    <td>Masa Kerja</td>
                    <td colspan="6">{{
                            now()->diffInYears($tb_pegawai->Tanggal_Mulai) . ' Tahun | ' .
                            now()->diffInMonths($tb_pegawai->Tanggal_Mulai) . ' Bulan'
                        }}
                    </td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td colspan="6">{{$tb_pegawai->dinas->Dinas}}</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="7">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">II. JENIS CUTI YANG DIAMBIL</td>
                </tr>
                <tr>
                    <td colspan="7">{{$jenis_cuti->Nama_Jenis_Cuti}}</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="7">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">III. ALASAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="7">{{$alasan_cuti}}</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="7">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">IV. LAMA CUTI</td>
                </tr>
                <tr>
                    <td>Selama</td>
                    <td>{{$lama_cuti}}</td>
                    <td>Hari</td>
                    <td>Mulai Tanggal</td>
                    <td>{{$dari}}</td>
                    <td>s/d</td>
                    <td>{{$sampai}}</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">V. CATATAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="3">1. Cuti Tahunan</td>
                    <td>2. Cuti Besar</td>
                    <td colspan="3">{{$cuti_besar}}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>Sisa</td>
                    <td>Keterangan</td>
                    <td>3. Cuti Sakit</td>
                    <td colspan="3">{{$cuti_sakit}}</td>
                </tr>
                <tr>
                    <td>N-2</td>
                    <td></td>
                    <td></td>
                    <td>4. Cuti Melahirkan</td>
                    <td colspan="3">{{$cuti_melahirkan}}</td>
                </tr>
                <tr>
                    <td>N-1</td>
                    <td></td>
                    <td></td>
                    <td>5. Cuti Karena Alasan Penting</td>
                    <td colspan="3">{{$cuti_alasan_penting}}</td>
                </tr>
                <tr>
                    <td>N</td>
                    <td>{{12 - $sisa_cuti}}</td>
                    <td></td>
                    <td>6. Cuti Di Luar Tanggungan Negara</td>
                    <td colspan="3">{{$cuti_luar_negara}}</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="3">{{$alamat_cuti}}</td>
                    <td>Telepon</td>
                    <td colspan="3">{{$no_telp}}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-center">Hormat Saya,</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">VII. PERTIMBANGAN ATASAN LANGSUNG</td>
                </tr>
                <tr>
                    <td>Disetujui</td>
                    <td>Perubahan</td>
                    <td>Ditangguhkan</td>
                    <td colspan="4">Tidak Disetujui</td>>
                </tr>
                <tr>
                    <td style="color: transparent">E</td>
                    <td style="color: transparent">E</td>
                    <td style="color: transparent">E</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="4" class="text-center fw-bold">Pimpinan OPD</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Function to execute when the window loads
        window.onload = function() {
            // Print the page
            window.print();
        };
    </script>
</body>
</html>
