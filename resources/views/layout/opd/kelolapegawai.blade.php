@extends('layout.main')

@section('title')
    Data Pegawai Kelola Pegawai
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('createpegawaiopd') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span> Tambah Pegawai</span></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <h1 class="card-title"></h1>
            <table id="data_pegawai" class="table table-striped" style="width:100%; ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Satuan Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_pegawai as $pgw)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pgw->NIP }}</td>
                            <td>{{ $pgw->Nama_Pegawai }}</td>
                            <td>{{ $pgw->dinas->Dinas }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="viewperiksa{{ $pgw->id }}"><i class="far fa-eye"></i></button>

                                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                                    <a href="{{ route('editapegawaiopd', ['id' => $pgw->NIP]) }}"
                                        class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;">
                                        <i class="far fa-edit"></i>
                                    </a>


                                    <form action="{{ route('deletepegawaiopd', ['id' => $pgw->NIP]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete" class="btn btn-outline-secondary btn-sm"
                                            style="border-radius:5px;"><i class="far fa-trash-alt"></i></button>
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


    @foreach ($tb_pegawai as $pgw)
        <!-- Modal Diagnosa-->
        <div class="modal fade" id="viewperiksa{{ $pgw->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                <td>: {{ $pgw->Id_Jenis_Kelamin }}</td>
                            </tr>
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td>: {{ $pgw->Id_Jabatan }}</td>
                            </tr>
                            <tr>
                                <td><b>Dinas</b></td>
                                <td>: {{ $pgw->Id_Dinas }}</td>
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
                                <td>: {{ $pgw->Id_Golongan }}</td>
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
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endsection
