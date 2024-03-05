@extends('layout.main')

@section('judul')
    Data Pengguna
@endsection

@section('subjudul')
    Edit Data Pengguna
@endsection

@section('isi')
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Data Pengguna</h5>
                        <form action="/kelolapengguna/{{ $tb_user->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtusername" class="form-label">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('Username') is-invalid @enderror"
                                        placeholder="Masukkan Username" name="txtusername" id="txtusername"
                                        value="{{ old('txtusername', $tb_user->username) }}">
                                    @error('Username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>                            
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtpassword" class="form-label">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('txtpassword') is-invalid @enderror" 
                                    placeholder="Masukkan Password Baru" name="txtpassword" id="txtpassword">
                                    <button type="button" id="togglePassword" class="btn btn-secondary"><i
                                            class="fa-solid fa-eye"></i></button>
                                </div>
                                @error('txtpassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtrepeatpassword" class="form-label">Ulangi Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('txtrepeatpassword') is-invalid @enderror" 
                                    placeholder="Ulangi Password Baru" name="txtrepeatpassword" id="txtrepeatpassword">
                                    <button type="button" id="togglePassword_Ulang" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></button>
                                </div>
                                @error('txtrepeatpassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Unit Kerja</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $tb_user->dinas->Dinas }}" readonly>
                                    <input type="hidden" name="Id_Dinas" value="{{ $tb_user->Id_Dinas }}">
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary"
                                        style="margin-left: auto;"><i class="fa-solid fa-backward"></i><span>
                                            Kembali</span></a>
                                    <button type="submit" name="submit" value="Save"
                                        class="btn btn-custom">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('txtpassword');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
});

document.getElementById('togglePassword_Ulang').addEventListener('click', function() {
    const repeatPasswordInput = document.getElementById('txtrepeatpassword');
    const type = repeatPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    repeatPasswordInput.setAttribute('type', type);
    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
});

// Validasi password saat submit form
// document.querySelector('form').addEventListener('submit', function(event) {
//     const passwordInput = document.getElementById('txtpassword');
//     const repeatPasswordInput = document.getElementById('txtrepeatpassword');
//     const password = passwordInput.value;
//     const repeatPassword = repeatPasswordInput.value;

//     if (password !== repeatPassword) {
//         event.preventDefault(); // Mencegah pengiriman form
//         alert('Ulangi password baru tidak sesuai dengan password baru. Silakan periksa kembali.');
//     }
// });

    </script>
@endsection
