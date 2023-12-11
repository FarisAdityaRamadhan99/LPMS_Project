@extends('users.profile.sidenav')
@section('content2')
<div class="ps-5">
    <h2 class="text-uppercase fw-bold mb-3">akun anda</h2>
    <p class="text-capitalize fs-3 mb-2">data anda</p>
    <p class="fs-7">Data akun berikut tidak dapat diganti.</p>

    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Username') }} <span> :</span></label>
        
        <div class="col-md-6 text-start">
            <input class="form-control" placeholder="{{Auth::user()->username}}" disabled>
        </div>
        
    </div>

    <div class="row mb-3">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Email') }} <span> :</span></label>

        <div class="col-md-6">
            <div class="col-md-6 text-start">
                <input class="form-control" placeholder="{{Auth::user()->email}}" disabled>
            </div>
        </div>
    </div>

    <p class="text-capitalize mb-2">Profile
        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-danger btn-icon-split" >
            <span class="icon text-white-50" >
                <i class="fas fa-pen "></i>
            </span>
        </a>
    </p>

    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nama') }} <span> :</span> </label>

        <div class="col-md-6">
            <input class="form-control" placeholder="{{Auth::user()->name}}" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nomor Telp') }} <span> :</span></label>

        <div class="col-md-6">
            <input class="form-control" placeholder="{{Auth::user()->phone}}" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label for="" class="col-md-3 col-form-label fw-bold text-end">{{ __('NIK') }} <span> :</span></label>

        <div class="col-md-6">
            <input class="form-control" placeholder="{{Auth::user()->nik}}" disabled>
        </div>
    </div>
</div>
@endsection