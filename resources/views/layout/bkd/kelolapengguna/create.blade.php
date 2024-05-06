@extends('layout.main')

@section('title')
    Data Pengguna Tambah Data Pengguna
@endsection

@section('content')
<div class="p-4">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Data Pengguna</h5>
                        <form action="{{ route('kelolapengguna.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label for="txtusername" class="form-label">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('txtusername') is-invalid @enderror"
                                        placeholder="Masukkan Username" name="txtusername" id="txtusername"
                                        value="{{ old('txtusername') }}">
                                    @error('txtusername')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtpassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('txtpassword') is-invalid @enderror"
                                        placeholder="Masukkan Password" name="txtpassword" id="txtpassword">
                                    <button type="button" id="togglePassword" class="btn btn-secondary"><i
                                            class="fa-solid fa-eye"></i></button>
                                    @error('txtpassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <label for="txtrepeatpassword" class="form-label">Ulangi Password</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control @error('txtrepeatpassword') is-invalid @enderror"
                                        placeholder="Masukkan Ulangi Password" name="txtrepeatpassword"
                                        id="txtrepeatpassword">
                                    <button type="button" id="togglePassword_Ulang" class="btn btn-secondary"><i
                                            class="fa-solid fa-eye"></i></button>
                                    @error('txtrepeatpassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" style=" margin-bottom:15px;">
                                <label class="form-label">Unit Kerja</label>
                                <div class="input-group">
                                    <select class="form-select @error('txtdepartment') is-invalid @enderror"
                                        aria-label="Default select example" name="txtdepartment">
                                        <option selected>Pilih Unit Kerja</option>
                                        @foreach ($tb_dinas as $tbd)
                                            <option value="{{ $tbd->Id_Dinas }}"
                                                {{ old('txtdepartment') == $tbd->Id_Dinas ? 'selected' : '' }}>
                                                {{ $tbd->Dinas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('txtdepartment')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
</div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('txtpassword'); // Menggunakan ID txtpassword
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });

        document.getElementById('togglePassword_Ulang').addEventListener('click', function() {
            const repeatPasswordInput = document.getElementById(
            'txtrepeatpassword'); // Menggunakan ID txtrepeatpassword
            const type = repeatPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            repeatPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });
    </script>
@endsection
