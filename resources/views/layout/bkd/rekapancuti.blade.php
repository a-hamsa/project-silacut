@extends('layout.main')

@section('title')
    Rekapan Cuti
@endsection

@section('content')
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <label for="pegawai" class="w-25">Cari Pegawai</label>
                <select class="form-select" id="nip" placeholder="Cari Pegawai">
                    <option value="">Cari Pegawai</option>
                    @foreach($tb_pegawai as $pgw)
                    <option value="{{$pgw->NIP}}">{{$pgw->Nama_Pegawai}} ({{$pgw->NIP}})</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md">
        <h1 class="card-title"></h1>
        <table id="data_pegawai" class="table table-striped" style="width:100%; ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Cuti</th>
                    <th>Tanggal Cuti</th>
                    <th>Diajukan</th>
                    <th>Satuan Kerja</th>
                    <th>Hak Cuti</th>
                    <th>Jumlah Hari</th>
                    <th>Sisa Cuti</th>
                </tr>
            </thead>
        </table>
        <h1 class="card-title"></h1>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#nip').selectize({
        sortField: 'text'
    });
    
    function getTableData() {
        var table = $('#data_pegawai').DataTable();
        table.clear();
        table.destroy();
        var nip = $('#nip').val();
        console.log(nip)
        $.ajax({
            url: "{{ route('get_cuti') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nip: nip,
            },
            success: function(response){
                console.log(response)
                let hakCuti = 12;
                let remainingLeaves = {};
                
                response.forEach(employee => {
                    let daysTaken = employee.Lama_Cuti; 
                    if (!remainingLeaves[employee.NIP]) {
                        remainingLeaves[employee.NIP] = hakCuti;
                    }
                    remainingLeaves[employee.NIP] -= daysTaken;
                    employee.daysTaken = daysTaken;
                    employee.remainingLeaves = remainingLeaves[employee.NIP];
                });

                $('#data_pegawai').DataTable({
                    // createdRow: function(row, data, index) {
                    //     $('td', row).eq(0).html(index + 1);
                    // },
                    columnDefs: [
                        {
                            targets: "_all",
                            className: "text-center"
                        },
                        {
                            targets: [3],
                            render: function(data, type, row) {
                                if (data == 1) {
                                    return '<span class="badge text-bg-success">Cuti Melahirkan</span>';
                                }
                                return '<span class="badge text-bg-success">Cuti Bersama</span>';
                            }
                        },
                    ],
                    responsive: false,
                    lengthChange: false,
                    autoWidth: false,
                    data: response,
                    columns: [
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // This renders the row index starting from 1
                            }
                        },
                        { data: "NIP" },
                        { data: "Nama_Pegawai" },
                        { data: "Id_Jenis_Cuti" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.Tanggal_Mulai_Cuti + " s/d " + data.Tanggal_Berakhir_Cuti;
                            }
                        },
                        { data: "Tanggal_Pengajuan" },
                        { data: "Dinas" },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.remainingLeaves + data.daysTaken; 
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.daysTaken; 
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.remainingLeaves; 
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

    $('#nip').on('change', function(){
        getTableData();
    });

});
</script>


@endsection
