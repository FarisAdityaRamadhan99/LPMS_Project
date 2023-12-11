@extends('users.profile.sidenav')
@section('content2')
    <h2 class="text-uppercase fw-bold mb-3">akun anda</h2>
    <p class="text-capitalize fs-3 mb-2">data anda</p>
    <p class="fs-7">Data akun berikut tidak dapat diganti.</p>

    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Username') }}</label>

        <div class="col-md-6">
            <input id="" type="" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('') }}" required autocomplete="" autofocus>

            @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Email') }}</label>

        <div class="col-md-6">
            <input id="" type="" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('') }}" required autocomplete="" autofocus>

            @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <p class="text-capitalize mb-2">Profile
        <a href="" class="btn btn-danger btn-icon-split" >
            <span class="icon text-white-50" >
                <i class="fas fa-pen "></i>
            </span>
        </a>
    </p>

    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nama') }}</label>

        <div class="col-md-6">
            <input id="" type="" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('') }}" required autocomplete="" autofocus>

            @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nomor Telp') }}</label>

        <div class="col-md-6">
            <input id="" type="" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('') }}" required autocomplete="" autofocus>

            @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('NIK') }}</label>

        <div class="col-md-6">
            <input id="" type="" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('') }}" required autocomplete="" autofocus>

            @error('')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endsection