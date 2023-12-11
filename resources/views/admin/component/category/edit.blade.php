@extends('admin.app')


@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Kategori</h1>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="m-0 font-weight-bold text-primary">
                    Edit Kategori Aduan
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="post">
                    @method('put')
                    @csrf
                        <label for="category">Nama Kategori</label>
                        <input type="text" id="category" @error('category') is-invalid @enderror name="name" class="form-control" value="{{ $category->name }}">
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small>
                            Perbaiki data Kategori Aduan guna melengkapi data penunjang pengaduan yang dilakukan oleh masyarakat*
                        </small>
                        <hr>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection