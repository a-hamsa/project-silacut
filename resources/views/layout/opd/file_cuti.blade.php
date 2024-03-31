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
                <div>Di</div>
                <div>Tempat</div>
            </div>
        </div>
        <br>
        <div class="fw-bold text-center">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</div>
        <table class="table table-bordered border-black" >
            <tbody>
                <tr>
                    <td class="fw-bold" colspan="5">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td colspan="4">{{$tb_pegawai->Nama_Pegawai}}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td colspan="4">{{$tb_pegawai->NIP}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td colspan="4">{{$tb_pegawai->Id_Jabatan}}</td>
                </tr>
                <tr>
                    <td>Masa Kerja</td>
                    <td colspan="4">{{
                            now()->diffInYears($tb_pegawai->Tanggal_Mulai) . ' Tahun | ' .
                            now()->diffInMonths($tb_pegawai->Tanggal_Mulai) . ' Bulan'
                        }}
                    </td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td colspan="4">{{$tb_pegawai->Id_Golongan}}</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="5">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">II. JENIS CUTI YANG DIAMBIL</td>
                </tr>
                <tr>
                    <td colspan="5">[Jenis Cuti]</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="5">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">III. ALASAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="5">[Alasan Cuti]</td>
                </tr>
                <tr>
                    <td style="color: transparent" colspan="5">I. DATA PEGAWAI</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">IV. LAMA CUTI</td>
                </tr>
                <tr>
                    <td>Selama</td>
                    <td>[x]</td>
                    <td>Hari</td>
                    <td>Mulai Tanggal</td>
                    <td>[Tanggal]</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">V. CATATAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="3">1. Cuti Tahunan</td>
                    <td>2. Cuti Besar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>Sisa</td>
                    <td>Keterangan</td>
                    <td>3. Rumah Sakit</td>
                    <td></td>
                </tr>
                <tr>
                    <td>N-2</td>
                    <td></td>
                    <td></td>
                    <td>4. Cuti Melahirkan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>N-1</td>
                    <td></td>
                    <td></td>
                    <td>5. Cuti Karena Alasan Penting</td>
                    <td></td>
                </tr>
                <tr>
                    <td>N</td>
                    <td>[INT]</td>
                    <td></td>
                    <td>6. Cuti Di Luar Tanggungan Negara</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
                </tr>
                <tr>
                    <td colspan="3">Jalan Contoh 1</td>
                    <td>Telepon</td>
                    <td>[No Telp]</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" class="text-center">Hormat Saya,</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="5">VII. PERTIMBANGAN ATASAN LANGSUNG</td>
                </tr>
                <tr>
                    <td>Disetujui</td>
                    <td>Perubahan</td>
                    <td>Ditangguhkan</td>
                    <td colspan="2">Tidak Disetujui</td>
                </tr>
                <tr>
                    <td style="color: transparent">E</td>
                    <td style="color: transparent">E</td>
                    <td style="color: transparent">E</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" class="text-center fw-bold">Pimpinan OPD</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
