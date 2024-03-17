@extends('layout.main')

@section('title')
Dashboard
@endsection

@section('content')
<section style="background-color: #5E72E4;" class="p-5">
  <div class="row">
    <div class="col-4">
      <div class="card info-card sales-card">

        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="row text-secondary">
                <h5 class="card-title">Jumlah Pegawai <span>| Total</span></h5>
              </div>
              <div class="row fw-bold">
                <h4>3511</h4>
              </div>
            </div>
            <div class="col">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-end">
              <i class="fa-solid fa-users fs-1 p-2"></i>
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-4">
      <div class="card info-card sales-card">

        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="row text-secondary">
                <h5 class="card-title">Data Cuti <span>| Jumlah</span></h5>
              </div>
              <div class="row fw-bold">
                <h4>3511</h4>
              </div>
            </div>
            <div class="col">
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