@extends('layout.main')

@section('judul')
Data Pengguna
@endsection

@section('subjudul')
Kelola Pengguna
@endsection

@section('isi')
<a href="kelolapengguna/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span>    Tambah Pengguna</span></a>
<div class="row">
    <div class="col-md">
        <h1 class="card-title"></h1>
    <table id="" class="table table-striped" style="width:100%; ">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Satuan Kerja</th>
                <th>Action</th>
            </tr>
        </thead>
    
        <tbody>
        @foreach($tb_user as $tbu)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $tbu->username }}</td>
                <td>{{ $tbu->dinas->Dinas }}</td>
               <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#viewpengguna{{ $tbu->id }}"><i class="far fa-eye"></i></button>
            
                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                    <a href="kelolapengguna/{{ $tbu->id }}/edit"" class="btn btn-outline-warning btn-sm" style="margin-right: 5px; border-radius:5px;"><i class="far fa-edit"></i></a>
            
                    <form action="kelolapengguna/{{ $tbu->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" value="Delete" class="btn btn-outline-secondary btn-sm" data-nama="{{ $tbu->username }}" style="border-radius:5px;"><i class="far fa-trash-alt"></i></button>
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


@foreach($tb_user as $tbu)
<!-- Modal Diagnosa-->
<div class="modal fade" id="viewpengguna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewpenggunalabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewpenggunalabel">Data Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table cellpadding="5">
                    <tr>
                        <td><b>Username</b></td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td><b>Satuan Kerja</b></td>
                        <td>: </td>
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