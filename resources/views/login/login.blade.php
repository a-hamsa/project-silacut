<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <script>
        function hideError(field) {
            document.getElementById(field + '-error').style.display = 'none';
        }
    </script>    
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <form action="{{url ('login/proses') }}" method="POST">
                        @csrf
                        <header>SILACUT adalah sebuah aplikasi berbasis website untuk melakukan pengajuan cuti untuk pegawai negeri sipil di lingkungan Pemerintahan Kabupaten Morowali</header>
                        <div class="input-field">
                            <input type="text" class="input" id="username" autocomplete="on" name="username" value="{{ old('username') }}" oninput="hideError('username')">
                            <label for="username">Username</label> 
                            {{-- @error('username')
                                @if(!$errors->has('password'))
                                    <div class="invalid-feedback" id="username-error">
                                        {{ $message }}
                                    </div>
                                @endif
                            @enderror --}}
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" oninput="hideError('password')">
                            <label for="password">Password</label>
                        </div>
                        @error('password')
                                @if(!$errors->has('username'))
                                    <div class="invalid-feedback" id="password-error">
                                        {{ $message }}
                                    </div>
                                @endif
                            @enderror
                        <div class="input-field">
                            <button class="submit">Login</button> 
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
  </div>
</body>
</html>
