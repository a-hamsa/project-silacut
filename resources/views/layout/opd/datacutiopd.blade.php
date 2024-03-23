@extends('layout.main')

@section('title')
    Data Cuti
@endsection

@section('content')
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Detail Cuti</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-2">
                <label for="recipient-name" class="col-form-label">Pilih Pegawai</label>
            </div>
            <div class="col-10">
                <select class="w-100" name="pegawai" id="pegawai" placeholder="-- Nama Pegawai --">
                    @foreach ($tb_cuti as $tbc)
                        <option value="">{{$tbc->pegawai->Nama_Pegawai}}</option>
                    @endforeach
                </select>
                <!-- <input type="text" class="form-control" id="recipient-name"> -->
            </div>
          </div>
          <hr style="height:3px;border:none;color:#000;background-color:#000;">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
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
                        <th>Aksi</th>
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
                                    <a href="kelolapegawaibkd/{{ $pgw->Id_Data_Cuti }}/edit"
                                        class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="kelolapegawaibkd/{{ $pgw->Id_Data_Cuti }}" method="POST" id="deleteFormKelolaPegawaiBkd">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm delete"
                                                data-nip="{{ $pgw->NIP }}" data-nama="{{ $pgw->Nama_Pegawai }}"
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
@endsection
