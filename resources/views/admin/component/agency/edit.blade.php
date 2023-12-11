@extends('admin.app')


@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Instansi</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="m-0 font-weight-bold text-primary">
                Edit Instansi Aduan
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('agency.update', $agency->id) }}" method="post">
                @method('put')
                @csrf
                    <label for="agency">Nama Kategori</label>
                    <input type="text" id="agency" @error('agency') is-invalid @enderror name="name" class="form-control" value="{{ $agency->name }}">
                    @error('agency')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="address">Alamat Instansi</label>
                    <input type="text" id="address" @error('address') is-invalid @enderror name="address" class="form-control" value="{{ $agency->address }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small>
                        Perbaiki data Instansi Aduan guna melengkapi data penunjang pengaduan yang dilakukan oleh masyarakat*
                    </small>
                    <hr>
                    <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>     
</div>


@endsection