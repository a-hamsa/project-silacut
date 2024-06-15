@extends('layout.main')

@section('title')
    Kelola OPD
@endsection

@section('content')
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="kelolaopd/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span> Tambah OPD</span></a>
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
                        <th>Nama OPD</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tb_dinas as $dns)
                        @if($dns->Dinas == "BKD")
                            @continue
                        @endif
                        <tr>
                            <th scope="row">{{ $loop->iteration -1 }}</th>
                            <td>{{ $dns->Dinas }}</td>
                            {{-- <td>{{ $pgw->Nama_Pegawai }}</td>
                            <td>{{ $pgw->dinas->Dinas }}</td> --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <button type="button" class="btn btn-outline-info btn-sm"
                                        style="margin-right: 5px; border-radius:5px;" data-bs-toggle="modal"
                                        data-bs-target="#viewperiksa{{ $dns->Id_Dinas }}"><i class="far fa-eye"></i></button> --}}

                                    <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                                    <a href="kelolaopd/{{ $dns->Id_Dinas }}/edit"
                                        class="btn btn-outline-warning btn-sm"
                                        style="margin-right: 5px; border-radius:5px;">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <form action="kelolaopd/{{ $dns->Id_Dinas }}" method="POST" id="deleteFormKelolaOpd">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm delete" data-nama="{{ $dns->Dinas }}"
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
@endsection
