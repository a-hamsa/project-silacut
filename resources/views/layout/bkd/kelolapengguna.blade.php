@extends('layout.main')

@section('Title')
Data Pengguna Kelola Pengguna
@endsection

@section('content')
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="kelolapengguna/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><span>Tambah Pengguna</span></a>
            </div>
        </div>
    </div>
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
                        <!-- Tambahkan margin-right di sini untuk memberikan jarak -->
                        <a href="kelolapengguna/{{ $tbu->id }}/edit" class="btn btn-outline-warning btn-sm" style="margin-right: 5px; border-radius:5px;"><i class="far fa-edit"></i></a>
                
                        <form action="kelolapengguna/{{ $tbu->id }}" method="POST" id="deleteFormKelolaPengguna">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-secondary btn-sm delete-btn" data-nama="{{ $tbu->username }}" style="border-radius:5px;"><i class="far fa-trash-alt"></i></button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                
                const username = this.getAttribute('data-nama');
                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You won't be able to revert this! Do you want to delete ${username}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection