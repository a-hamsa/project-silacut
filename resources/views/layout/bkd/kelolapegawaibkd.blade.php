@extends('layout.main')

@section('title')
    Data Pegawai Kelola Pegawai
@endsection

@section('content')
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="kelolapegawaibkd/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span> Tambah Pegawai</span></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <h1 class="card-title"></h1>
            <table id="kelolapegawaibkd" class="table table-striped" style="width:100%; ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Satuan Kerja</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_pegawai as $pgw)
                        @if($pgw->dinas->Dinas == "BKD")
                            @continue
                        @endif
                        <tr>
                            <th scope="row">{{ ($loop->iteration - 1) }}</th>
                            <td>{{ $pgw->NIP }}</td>
                            <td>{{ $pgw->Nama_Pegawai }}</td>
                            <td>{{ $pgw->dinas->Dinas }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewperiksa{{ $pgw->NIP }}"><i class="far fa-eye"></i></button>

                                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                                    <a href="kelolapegawaibkd/{{ $pgw->NIP }}/edit"
                                        class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;">
                                        <i class="far fa-edit"></i>
                                    </a>


                                    {{-- <form action="kelolapegawaibkd/{{ $pgw->NIP }}" method="POST" id="delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete"
                                            class="btn btn-outline-secondary btn-sm delete"
                                            data-nama="{{ $pgw->Nama_Pegawai }}" style="border-radius:5px;"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form> --}}
                                    <form action="kelolapegawaibkd/{{ $pgw->NIP }}" method="POST" id="deleteFormKelolaPegawaiBkd">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm delete"
                                                data-nip="{{ $pgw->NIP }}" data-nama="{{ $pgw->Nama_Pegawai }}"
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

    {{-- <script>
        $('.delete').click(function() {
            var hapuspegawai = $(this).attr('data-nama');
            swal({
                    title: "Apa Anda Yakin Ingin Menghapus ?",
                    text: "Apa Anda Yakin Ingin Menghapus Data Pegawai " + hapuspegawai + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "kelolapegawaibkd" + hapuspegawai;
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Batal Menghapus Data Pegawai " + hapuspegawai + " ");
                    }
                });
        });
    </script> --}}

    @foreach ($tb_pegawai as $pgw)
        <!-- Modal Diagnosa-->
        <div class="modal fade" id="viewperiksa{{ $pgw->NIP }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="viewperiksalabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewperiksalabel">Data Pegawai</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table cellpadding="5">
                            <tr>
                                <td><b>NIP</b></td>
                                <td>: {{ $pgw->NIP }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>: {{ $pgw->Nama_Pegawai }}</td>
                            </tr>
                            <tr>
                                <td><b>Tempat Lahir</b></td>
                                <td>: {{ $pgw->Tempat_Lahir }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td>: {{ $pgw->Tanggal_Lahir }}</td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>: {{ $pgw->jeniskelamin->Jenis_Kelamin }}</td>
                            </tr>
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td>: {{ $pgw->jabatan->Jabatan }}</td>
                            </tr>
                            <tr>
                                <td><b>Dinas</b></td>
                                <td>: {{ $pgw->dinas->Dinas }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Mulai</b></td>
                                <td>: {{ $pgw->Tanggal_Mulai }}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>: {{ $pgw->Alamat_Pegawai }}</td>
                            </tr>
                            <tr>
                                <td><b>Golongan</b></td>
                                <td>: {{ $pgw->golongan->Golongan }}</td>
                            </tr>
                            <tr>
                                <td><b>Telepon Pegawai</b></td>
                                <td>: {{ $pgw->Telepon_Pegawai }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
