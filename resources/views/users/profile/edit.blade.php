@extends('users.profile.sidenav')
@section('content2')
    <h2 class="text-uppercase fw-bold mb-3">edit profil</h2>
    <p class="fs-7">Edit data profil anda dibawah ini :</p>

    <form method="POST" action="{{ route('profile.update', $users->id) }}">
        @method('put')
        @csrf
        <div class="text-center">
            <div class="row mb-2">
                <label for="name" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nama') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name}}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone" class="col-md-3 col-form-label fw-bold text-end">{{ __('Nomor phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <label for="nik" class="col-md-3 col-form-label fw-bold text-end">{{ __('NIK') }}</label>

                <div class="col-md-6">
                    <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $users->nik }}" required autocomplete="nik" autofocus>

                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        
            <button type="submit" class="btn btn-danger">Kirim</button>
        </div>
    </form>
    
@endsection