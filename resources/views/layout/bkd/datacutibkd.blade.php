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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tb_cuti as $tbc)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tbc->NIP }}</td>
                                <td>{{ $tbc->pegawai->Nama_Pegawai }}</td>
                                <td><span class="badge text-bg-success">{{ $tbc->jeniscuti->Nama_Jenis_Cuti }}</span></td>
                                <td>{{ $tbc->Tanggal_Mulai_Cuti }} s.d {{ $tbc->Tanggal_Berakhir_Cuti }}</td>
                                <td>{{ $tbc->Tanggal_Pengajuan }}</td>
                                <td>
                                    @if ($tbc->Verifikasi === true)
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif ($tbc->Verifikasi === false)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning">Belum diproses</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewPdfModal"
                                        data-pdf-url="{{ asset('sk_terakhir/' . $tbc->SK_Terakhir) }}, {{ asset('absen/' . $tbc->Rekap_Absen) }}, {{ asset('scan_cuti/' . $tbc->Permohonan_Cuti) }}">
                                        <i class="far fa-eye"></i></button> --}}
                                    <button type="button" onclick="showPDF.call(this)" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewPdfModal"
                                        data-pdf-url="{{ asset('sk_terakhir/' . $tbc->SK_Terakhir) }}, {{ asset('absen/' . $tbc->Rekap_Absen) }}, {{ asset('scan_cuti/' . $tbc->Permohonan_Cuti) }}"
                                        data-id="{{ $tbc->Id_Data_Cuti }}" data-verifikasi = "{{$tbc->Verifikasi}}">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                        <div class="text-center fw-bold fs-4 my-3">SK Terakhir</div>
                        <div class="col-md-12">
                            <iframe id="pdfFrame1" src="" width="100%" height="500px"
                                style="border: none;"></iframe>
                        </div>
                        <!-- Second PDF -->
                        <div class="text-center fw-bold fs-4 my-3">Rekap Absen</div>
                        <div class="col-md-12">
                            <iframe id="pdfFrame2" src="" width="100%" height="500px"
                                style="border: none;"></iframe>
                        </div>
                        <!-- Third PDF -->
                        <div class="text-center fw-bold fs-4 my-3">Permohonan Cuti</div>
                        <div class="col-md-12">
                            <iframe id="pdfFrame3" src="" width="100%" height="500px"
                                style="border: none;"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Display buttons for acceptance or rejection -->
                <div class="d-flex justify-content-between mb-2">
                    <input type="hidden" id="lama-cuti-original" value="">
                    <div class="ml-2" style="flex-grow: 1;">
                        <form action="" method="POST" id="reject-form">
                            @csrf
                            <button type="button" class="btn btn-danger" id="reject-btn">Reject</button>
                            <div class="mb-3" id="rejection-reason" style="display: none;">
                                <label for="Alasan_Penolakan" class="form-label">Rejection Reason</label>
                                <textarea class="form-control mb-1 textarea-reject" id="Alasan_Penolakan" name="Alasan_Penolakan" rows="2"
                                    required></textarea>
                                <button type="submit" class="btn btn-danger">Submit Rejection</button>
                            </div>
                        </form>
                    </div>
                    <div class="mr-2">
                        <form id="acc-form" action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
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
                    success: function(response) {
                        const jenisCutiMap = {
                            1: 'Cuti Tahunan',
                            2: 'Cuti Bersalin',
                            3: 'Cuti Sakit',
                            4: 'Cuti Besar',
                            5: 'Cuti Alasan Penting',
                            6: 'Cuti Diluar Tanggungan Negara',
                        };

                        let table = $('#kelolapegawaiopd').DataTable({
                            destroy: true, // Ensure DataTable can be re-initialized
                            responsive: false, // Disable responsiveness as per your request
                            lengthChange: false, // Disable the page length option
                            autoWidth: false, // Disable automatic column width calculations
                            scrollX: true, // Ensure table is scrollable horizontally
                            scrollY: 300, // Set a fixed height
                            scrollCollapse: true, // Collapse unused vertical space
                            paging: false, // Disable pagination

                            columnDefs: [{
                                    targets: "_all",
                                    className: "text-center"
                                },
                                {
                                    targets: [
                                        3
                                    ], // Assuming this is the column for Id_Jenis_Cuti
                                    render: function(data, type, row) {
                                        return '<span class="badge text-bg-success">' +
                                            (jenisCutiMap[data] || 'Unknown') +
                                            '</span>';
                                    }
                                },
                                {
                                    targets: 6, // Verifikasi column
                                    render: function(data, type, row) {
                                        if (data === true) {
                                            return '<span class="badge bg-success">Diterima</span>';
                                        } else if (data === false) {
                                            return '<span class="badge bg-danger">Ditolak</span>';
                                        } else {
                                            return '<span class="badge bg-warning">Belum diproses</span>';
                                        }
                                    }
                                },
                                {
                                    targets: -1, // Action buttons in the last column
                                    orderable: false,
                                    render: function(data, type, row) {
                                        return '<button type="button" onclick="showPDF.call(this)" class="btn btn-outline-info btn-sm" style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#viewPdfModal" data-pdf-url=" ./sk_terakhir/' +
                                            data.SK_Terakhir + ', ./absen/' + data
                                            .Rekap_Absen + ', ./scan_cuti/' + data
                                            .Permohonan_Cuti +
                                            '" data-id="' + data.Id_Data_Cuti +
                                            '" data-verifikasi="' + data.Verifikasi + '"><i class="far fa-eye"></i></button>';
                                    }
                                },
                            ],
                            data: response,
                            columns: [{
                                    data: null,
                                    render: function(data, type, row, meta) {
                                        return meta.row +
                                            1; // Row index starting from 1
                                    }
                                },
                                {
                                    data: "NIP"
                                },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return data.pegawai.Nama_Pegawai;
                                    }
                                },
                                {
                                    data: "Id_Jenis_Cuti"
                                }, // Mapped to columnDefs
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return data.Tanggal_Mulai_Cuti + " s/d " + data
                                            .Tanggal_Berakhir_Cuti;
                                    }
                                },
                                {
                                    data: "Tanggal_Pengajuan"
                                },
                                {
                                    data: "Verifikasi"
                                },
                                {
                                    data: null
                                } // Action buttons
                            ],
                            dom: '<"topStart"B>rt',
                            buttons: [{
                                    extend: "copy",
                                    exportOptions: {
                                        columns: ':not(:last-child)',
                                        orthogonal: 'export',
                                        format: {
                                            body: function(data, row, column, node) {
                                                return (typeof data === 'string') ? data
                                                    .replace(/(<([^>]+)>)/gi, "") :
                                                    data;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: ':not(:last-child)',
                                        orthogonal: 'export',
                                        format: {
                                            body: function(data, row, column, node) {
                                                return (typeof data === 'string') ? data
                                                    .replace(/(<([^>]+)>)/gi, "") :
                                                    data;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: ':not(:last-child)',
                                        orthogonal: 'export',
                                        format: {
                                            body: function(data, row, column, node) {
                                                return (typeof data === 'string') ? data
                                                    .replace(/(<([^>]+)>)/gi, "") :
                                                    data;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: ':not(:last-child)',
                                        orthogonal: 'export',
                                        format: {
                                            body: function(data, row, column, node) {
                                                return (typeof data === 'string') ? data
                                                    .replace(/(<([^>]+)>)/gi, "") :
                                                    data;
                                            }
                                        }
                                    }
                                }
                            ]
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan: ' + error);
                    }
                });
            }

            getTableData();
        });


        // function showPDF() {
        //     const pdfUrls = this.getAttribute('data-pdf-url').split(',');
        //     console.log(pdfUrls)
        //     document.getElementById('pdfFrame1').src = pdfUrls[0].trim();
        //     document.getElementById('pdfFrame2').src = pdfUrls[1].trim();
        //     document.getElementById('pdfFrame3').src = pdfUrls[2].trim();
        // }
        // document.querySelectorAll('button[data-bs-toggle="modal"]').forEach(button => {
        //     button.addEventListener('click', function () {
        //         const pdfUrls = this.getAttribute('data-pdf-url').split(',');
        //         console.log(pdfUrls)
        //         // Set the src for each iframe
        //         document.getElementById('pdfFrame1').src = pdfUrls[0].trim();
        //         document.getElementById('pdfFrame2').src = pdfUrls[1].trim();
        //         document.getElementById('pdfFrame3').src = pdfUrls[2].trim();
        //     });
        // });
    </script>
    <script>
        function showPDF() {
            const pdfUrls = this.getAttribute('data-pdf-url').split(',');
            console.log(pdfUrls)
            document.getElementById('pdfFrame1').src = pdfUrls[0].trim();
            document.getElementById('pdfFrame2').src = pdfUrls[1].trim();
            document.getElementById('pdfFrame3').src = pdfUrls[2].trim();

            const id = this.getAttribute('data-id');
            document.getElementById('reject-form').action = `/cuti/reject/${id}`;
            document.getElementById('acc-form').action = `/cuti/accept/${id}`;

            const acceptButton = document.getElementById('acc-form');
            const verifikasi = this.getAttribute('data-verifikasi');
            console.log(verifikasi)
            if (verifikasi === 'false') {
                acceptButton.style.display = 'none';
            } else {
                acceptButton.style.display = 'inline-block';
            }
        }
    </script>
    <script>
        document.getElementById('reject-btn').addEventListener('click', function() {
            document.getElementById('rejection-reason').style.display = 'block';
            document.getElementById('reject-btn').style.display = 'none';
        });
    </script>
@endsection
