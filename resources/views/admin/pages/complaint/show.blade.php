@extends('admin.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="m-0 font-weight-bold " href="{{ route('admin.complaint') }}">Data Pengaduan</a></li>
            <li class="breadcrumb-item active m-0 font-weight-bold " aria-current="page">Show</li>
        </ol>
    </nav>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>INFO ! </strong> Data dibawah berikut tidak dapat dirubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="py-3 px-3" style="font-size: 10px;">
        <div class="row">
            <div class="col-lg-11">
                <div class="card shadow mb-4" >
                    <div class="card-header">
                        <div class="m-0 font-weight-bold text-primary">
                            Pengaduan Masyarakat
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('administrator.show', $complaint) }}" >
                            @csrf
                            <fieldset disabled>
                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">NIK</label>

                                <div class="col-md-9">
                                    <input type="text" id="user_id" class="form-control form-control-sm" name="user_id" value="{{ $complaint->user->nik }}" required autocomplete="user_id" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Judul Laporan</label>

                                <div class="col-md-9">
                                    <input type="text" id="title_compaint" class="form-control form-control-sm" name="title_compaint" value="{{ $complaint->title_complaint }}" required autocomplete="title_compaint" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Keluhan</label>

                                <div class="col-md-9">
                                    <textarea type="text" id="complaint" class="form-control form-control-sm" name="complaint"required autocomplete="complaint" cols="10" rows="4" autofocus>{{ $complaint->complaint }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Lokasi</label>

                                <div class="col-md-9">
                                    <textarea type="text" id="location" class="form-control form-control-sm" name="location" required autocomplete="location" cols="10" rows="2" autofocus >{{ $complaint->location }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Instansi Tujuan</label>

                                <div class="col-md-9">
                                    <input type="text" id="agency_id" class="form-control form-control-sm" name="agency_id" value="{{ $complaint->agency->name }}" required autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Kategori Aduan</label>

                                <div class="col-md-9">
                                    <input type="text" id="category_id" class="form-control form-control-sm" name="category_id" value="{{ $complaint->category->name }}" required autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Wilayah Kecamatan</label>

                                <div class="col-md-9">
                                    <input type="text" id="region_id" class="form-control form-control-sm" name="region_id" value="{{ $complaint->region->name }}" required autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Status</label>

                                <div class="col-md-9">
                                    <input type="text" id="status" class="form-control form-control-sm" name="status" value="{{ $complaint->status }}" required autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-md-2 col-form-label text-md-right">Gambar</label>
                            @if($complaint->image)
                                <div class="col-md-6">
                                    <img src="{{ asset('images/'. $complaint->image )}}" class="img-fluid mt-3" alt="">
                                </div>
                            @else
                                <div class="col-md-9">
                                    <textarea type="image" id="" class="form-control form-control-sm"  name="" value="" required autocomplete="" cols="5" rows="5" autofocus>--- Data Tidak Ada ---</textarea>
                                </div>
                            @endif
                            </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection