<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="py-5" style="background: #B1B4B0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow mb-4" style="border-radius: 30px;">
                    <h4 class="text-center text-gray-800 py-4 mb-2">Daftar LPMS</h4>

                    <div class="card-body px-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="justify-content-center">
                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="username" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                

                                <div class="mb-3">
                                    <input style="border-radius: 100px" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="email" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required placeholder="nik" autocomplete="nik">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="telp" autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input style="border-radius: 100px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password" autocomplete="new-password">
                                </div>

                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 100px;">
                                            {{ __('Register') }}
                                        </button>
                                        <a class="btn btn-danger" href="" style="border-radius: 100px;">Batal</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a href="{{ route('login') }}" class="btn btn-link text-black">Klik disini kembali ke login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
