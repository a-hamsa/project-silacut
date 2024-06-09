@extends('layout.app')

@section('content')
<div class="row m-0">
    <div class="col-4 d-flex justify-content-center align-items-center" style="background: #3B71CB;">
        <img src="assets/img/logomorowalilogin.png" alt="Logo" class="img-fluid w-60">
    </div>
    <div class="col-8 px-4 py-4 justify-content-center align-items-center">
        <div class="input-box text-center">
            <img src="assets/img/silacutbaru.png" alt="Logo Silacut" class="img-fluid w-60 mb-2">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <p style="text-align: justify" class="fw-medium fs-4 mb-2">SILACUT adalah sebuah aplikasi berbasis website untuk melakukan pengajuan cuti untuk pegawai negeri sipil di lingkungan Pemerintahan Kabupaten Morowali</p>
                <div class="input-group mb-3">
                    <input type="text" placeholder="Username" class="form-control form-control-lg" id="username" autocomplete="on" name="username" value="{{ old('username') }}" oninput="hideError('username')">
                </div>
                <div class="input-group mb-4">
                    <input type="password" placeholder="Password" class="form-control form-control-lg" id="password" name="password" oninput="hideError('password')">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-lg btn-primary w-100" aria-label="Close">
                    {{ __('Login') }}
                    </button>
                </div>
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="text-center text-secondary">BKPSDMD @ Kabupaten Morowali - 2022</div>
            </form>
        </div>  
    </div>
</div>
@endsection
