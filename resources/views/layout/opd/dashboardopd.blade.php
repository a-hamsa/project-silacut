@extends('layout.main')

@section('title')
Dashboard
@endsection

@section('content')

<section style="background-color: #5E72E4;" class="p-5">
  <div class="row">
    <div class="col-4 align-self-center">
      <div class="card info-card sales-card">

        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="row text-secondary">
                <h5 class="card-title">Jumlah Pegawai</h5>
              </div>
              <div class="row fw-bold">
                <h4>{{$tb_pegawai}}</h4>
              </div>
            </div>
            <div class="col-3">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-end">
              <i class="fa-solid fa-users fs-1 p-2"></i>
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-4 align-self-center">
      <div class="card info-card sales-card">

        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="row text-secondary">
                <h5 class="card-title">Data Cuti</h5>
              </div>
              <div class="row fw-bold">
                <h4>{{ $tb_cuti}}</h4>
              </div>
            </div>
            <div class="col-3">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-end">
              <i class="fa-solid fa-clipboard fs-1 p-2"></i>
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-4 d-flex justify-content-end pr-5">
      <img src="{{ asset('assets/img/logomorowali.png') }}" style="width: 30%;">
    </div>
  </div>
</section>
@endsection