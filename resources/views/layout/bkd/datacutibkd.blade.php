@extends('layout.main')

@section('title')
    Data Cuti
@endsection

@section('content')

<div class="p-4">
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
                        <th>Aksi</th>
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
                                <button type="button" class="btn btn-outline-info btn-sm" style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#viewPdfModal" data-pdf-url="{{ asset('sk_terakhir/' . $tbc->SK_Terakhir) }}, {{ asset('absen/' . $tbc->Rekap_Absen) }}, {{ asset('scan_cuti/' . $tbc->Permohonan_Cuti) }}"> <i class="far fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="viewPdfModal" tabindex="-1" aria-labelledby="viewPdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPdfModalLabel">View PDFs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- First PDF -->
                    <div class="col-md-4">
                        <iframe id="pdfFrame1" src="" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                    <!-- Second PDF -->
                    <div class="col-md-4">
                        <iframe id="pdfFrame2" src="" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                    <!-- Third PDF -->
                    <div class="col-md-4">
                        <iframe id="pdfFrame3" src="" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    function getTableData() {
        $.ajax({
            url: "{{ route('data_cuti_bkd') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nip: "E",
            },
            success: function(response){
                console.log(response)
                $('#kelolapegawaiopd').DataTable({
                    createdRow: function(row, data, index) {
                        $('td', row).eq(0).html(index + 1);
                    },
                    columnDefs: [
                        {
                            targets: "_all",
                            className: "text-center"
                        },
                        {
                            targets: [3],
                            render: function(data, type, row) {
                                return '<span class="badge text-bg-success">'+ data +'</span>';
                            }
                        },
                    ],
                    responsive: false,
                    lengthChange: false,
                    autoWidth: false,
                    data: response,
                    columns: [
                        { data: null },
                        { data: "NIP" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.pegawai.Nama_Pegawai;
                            }
                        },
                        { data: "Id_Jenis_Cuti" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.Tanggal_Mulai_Cuti + " s/d " + data.Tanggal_Berakhir_Cuti;
                            }
                        },
                        { data: "Tanggal_Pengajuan" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<button type="button" onclick="showPDF()" class="btn btn-outline-info btn-sm" style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#viewPdfModal" data-pdf-url="./sk_terakhir/' + data.SK_Terakhir + ',./absen/' + data.Rekap_Absen + ',./scan_cuti/' + data.Permohonan_Cuti + '"><i class="far fa-eye"></i></button>';
                            }
                        },
                    ],
                    scrollX: true,
                    scrollY: 300,
                    scrollCollapse: true,
                    paging: false,
                    dom: '<"topStart"B>rt',
                    buttons: ["copy", "csv", "excel", "print"]
                });
            },
            error: function(xhr, status, error){
                console.error('Terjadi kesalahan: ' + error);
            }
        });
    }

    getTableData();
    function showPDF() {
        document.querySelectorAll('button[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                const pdfUrls = this.getAttribute('data-pdf-url').split(',');
                console.log(pdfUrls)
                // Set the src for each iframe
                document.getElementById('pdfFrame1').src = pdfUrls[0].trim();
                document.getElementById('pdfFrame2').src = pdfUrls[1].trim();
                document.getElementById('pdfFrame3').src = pdfUrls[2].trim();
            });
        });
    }
});
</script>
@endsection
