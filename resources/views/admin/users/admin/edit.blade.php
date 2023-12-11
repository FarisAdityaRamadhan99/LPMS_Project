@extends('admin.app')


@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Users</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="m-0 font-weight-bold text-primary">
                Edit Instansi Aduan
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('administrator.update', [$users->id]) }}" style="font-size: 10px;">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $users->username }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                    <div class="col-md-6">
                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $users->nik }}" required autocomplete="nik" autofocus>

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <select class="custom-select" id="role" name="role">
                            <option value="" selected>Role Users</option>
                            <option @if($users['role'] == 'admin') selected @endif value="admin">Admin</option>
                            <option @if($users['role'] == 'petugas') selected @endif value="petugas">Petugas</option>
                            <option @if($users['role'] == 'pimpinan') selected @endif value="pimpinan">Pimpinan</option>
                            <option @if($users['role'] == 'masyarakat') selected @endif value="masyarakat">Masyarakat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Ubah Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>     
</div>


@endsection