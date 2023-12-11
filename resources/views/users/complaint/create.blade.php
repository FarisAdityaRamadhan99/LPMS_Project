@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
@endsection

@extends('layouts.app')
@section('content')
<div class="py-5" style="background: #F3F3F3;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4" style="border-radius: 40px;">
                    <h5 class="h3 mb-0 text-center text-gray-800 py-4 mb-2">Aduan LPMS</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-11">
                                            <div class="mb-3">
                                                <input type="text" name="title_complaint" value="{{ old('title_complaint') }}" class="form-control @error('title_complaint') is-invalid @enderror" required placeholder="Judul Aduan">
                                                @error('title_complaint')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="mb-3">
                                                <textarea type="text" name="complaint" value="{{ old('complaint') }}" class="form-control @error('complaint') is-invalid @enderror" required placeholder="Keluhan Anda" cols="10" rows="4"></textarea>
                                                @error('complaint')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-11 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-md-8">
                                                    <select class="form-select" id="agency" name="id_agency" aria-label="Default select example">
                                                        <option value="" selected>Instansi tujuan</option>
                                                        @foreach($agency as $x)
                                                            <option value="{{ $x -> id }}">{{ $x->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <!-- Button trigger modal -->
                                                    <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                                        Foto
                                                    </button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel1">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                                                    @error('image')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="button" class="btn btn-warning">Simpan</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <!-- Button trigger modal -->
                                                    <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Lokasi
                                                    </button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-6 col-md-6">
                                                                    <input type="text" id="longitude" name="longitude" value="{{ old('longitude') }}" class="form-control" required placeholder="Longitude">
                                                                </div>
                                                                <div class="col-6 col-md-6">
                                                                    <input type="text" id="latitude" name="latitude" value="{{ old('latitude') }}" class="form-control" required placeholder="Latitude">
                                                                </div>
                                                            </div>
                                                            <textarea type="text" name="location" value="{{ old('location') }}" class="form-control mb-3 @error('location') is-invalid @enderror" required placeholder="Alamat" cols="10" rows="4"></textarea>
                                                            @error('location')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <div id="map" style="width :100%; height: 400px"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-warning">Simpan</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-11 mb-3">
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <select class="form-select" id="region" name="id_region" aria-label="Default select example">
                                                        <option value="" selected>Wilayah Kecamatan</option>
                                                        @foreach($region as $x)
                                                            <option value="{{ $x -> id}}">{{ $x->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-6 col-md-6">
                                                    <select class="form-select" id="category" name="id_category" aria-label="Default select example">
                                                        <option value="" selected>Kategori Aduan</option>
                                                        @foreach($category as $x)
                                                            <option value="{{ $x -> id }}">{{ $x->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-12 mb-5">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger">ADUKAN</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script>
    
        var map = L.map('map').setView([-7.008662331423682, 113.85817021120972], 10);
        var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        var popup = L.popup()
		.setLatLng([-7.008662331423682, 113.85817021120972])
		.setContent('Sumenep')
		.openOn(map);

        let marker = null;

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);

        if (marker == null) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }

        const mep = e.latlng;
        const {lat, lng} = mep;

        let a = document.getElementById('latitude').value = lat;
        let b = document.getElementById('longitude').value = lng;
	}

	map.on('click', onMapClick);

    </script>
@endsection