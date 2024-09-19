<!DOCTYPE html>
<html>
<head>
    <title>Status Cuti</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Status Cuti</h1>

        <div class="card">
            <div class="card-header">
                Informasi Cuti
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Pegawai</h5>
                <p class="card-text">{{ $pegawai->Nama_Pegawai }}</p>
                
                <h5 class="card-title">Status Verifikasi</h5>
                <p class="card-text">
                    @if($cuti->Verifikasi == true)
                        <span class="badge badge-success">Disetujui</span>
                    @elseif($cuti->Verifikasi == false)
                        <span class="badge badge-danger">Ditolak</span>
                    @else
                        <span class="badge badge-warning">Belum Diverifikasi</span>
                    @endif
                </p>
                @if($cuti->Verifikasi==false)
                    <h5 class="card-title">Alasan Penolakan</h5>
                    <p class="card-text">{{ $cuti->Alasan_Penolakan }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
