@extends('layout.main')

@section('judul')
    Data Pegawai
@endsection

@section('subjudul')
    Kelola Pegawai
@endsection

@section('isi')
    <a href="{{ url('opd/kelolapegawai/create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span> Tambah Pegawai</span></a>
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
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_pegawai as $pgw)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pgw->NIP }}</td>
                            <td>{{ $pgw->Nama_Pegawai }}</td>
                            <td>{{ $pgw->dinas -> Dinas }}</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewperiksa{{ $pgw->NIP }}"><i class="far fa-eye"></i></button>

                                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                                    <a href="ad_poliumum/{{ $pgw->NIP }}/edit" class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;"><i class="far fa-edit"></i></a>

                                    <form action="ad_poliumum/{{ $pgw->NIP }}" method="POST">
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
                                <td><b>Nama</b></td>
                                <td>: {{ $pgw->Nama_Pegawai }}</td>
                            </tr>
                            <tr>
                                <td><b>NIP</b></td>
                                <td>: {{ $pgw->NIP }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td>: {{ $pgw->Tanggal_Lahir }}</td>
                            </tr>
                            //dropdown
                            {{-- <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>: {{ $dps->jenis_kelamin }}</td>
                            </tr>
                            //dropdown
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td>: {{ $dps->jenis_kelamin }}</td>
                            </tr>
                            //dropdown
                            <tr>
                                <td><b>Dinas</b></td>
                                <td>: {{ $dps->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Mulai</b></td>
                                <td>: {{ $dps->tanggal_mulai }}</td>
                            </tr>
                            <tr>
                                <td><b>Golongan</b></td>
                                <td>: {{ $dps->golongan }}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat Pegawai</b></td>
                                <td>: {{ $dps->alamat_pegawai }}</td>
                            </tr>
                            <tr>
                                <td><b>Telapon Pegawai</b></td>
                                <td>: {{ $dps->telepon_pegawai }}</td>
                            </tr> --}}
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
