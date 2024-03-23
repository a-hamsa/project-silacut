<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="{{ asset('assets/img/logomorowali.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logomorowali.png') }}" rel="apple-touch-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    <style>
    .background {
        position: fixed;
        width: 100%;
        height: 100%;
        background-image: url("assets/img/background.jpg");
        background-size: cover;
        filter: blur(5px); /* Adjust the blur amount as needed */
        z-index: -1;
    }
    </style>
</head>
<body>
<div class="background"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-11 p-0">
                <div class="card rounded w-100">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
