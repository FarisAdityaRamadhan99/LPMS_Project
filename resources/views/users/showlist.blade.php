@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
@endsection

@extends('layouts.app')
@section('content')
    <div class="container-fluid px-5 py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow pt-4 mb-4">
                        <div class="card-body">
                            <div class="container">
                                <div class="row mb-5">
                                    <div class="col-md-7">
                                        <div class="text-start">
                                            <p style="font-size: 9pt;">
                                                <span>Oleh <strong>{{ $complaint->user->username }}</strong></span>
                                                <br>
                                                <span>Status <strong class="text-capitalize">{{ $complaint->status }}</strong> </span>
                                                <span>dengan Kategori aduan <strong class="text-capitalize">{{ $complaint->category->name }}</strong></span>
                                                <br>
                                                <span>Aduan ditujukan untuk Instansi <strong>{{ $complaint->agency->name }}</strong></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="text-end">
                                            <p style="font-size: 9pt">
                                                <span>Diadukan pada</span>
                                                <br>
                                                <span><strong>{{$complaint->created_at}} WIB</strong></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 class="text-primary text-uppercase mb-3"><strong>{{ $complaint->title_complaint }}</strong></h4>
                                <p class="mb-5">{{ $complaint->complaint }}</p>

                                <div class="pt-5 mb-5" style="font-size: 11px;">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a data-bs-toggle="collapse" class="nav-link link-dark active" href="#menu1" aria-expanded="false" aria-controls="collapseExample">
                                                Tindak Lanjut
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="collapse" class="nav-link link-dark" href="#menu2" aria-expanded="false" aria-controls="collapseExample">
                                                Komentar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="collapse" class="nav-link link-dark" href="#menu3" aria-expanded="false" aria-controls="collapseExample">
                                                Lampiran
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="collapse" class="nav-link link-dark" href="#menu4" aria-expanded="false" aria-controls="collapseExample">
                                                Lokasi
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    @if($feedback != null)
                                    <div class="container collapse py-3" id="menu1">
                                        <p class="mb-5" style="font-size: 9pt;">
                                            <strong>{{ $complaint->agency->name }}</strong>
                                            <br>
                                            <span>
                                                @if($complaint->status == 'pending')
                                                    <button class="btn btn-danger btn-sm">{{ $complaint->status }}</button>
                                                @elseif($complaint->status == 'ditinjau')
                                                    <button class="btn btn-warning btn-sm">{{ $complaint->status }}</button>
                                                @elseif($complaint->status == 'diproses')
                                                    <button class="btn btn-primary btn-sm">{{ $complaint->status }}</button>
                                                @elseif($complaint->status == 'selesai')
                                                    <button  button class="btn btn-success btn-sm">{{ $complaint->status }}</button>
                                                @endif
                                                <small>
                                                    <em>
                                                    "{{ $row->name }}"
                                                    </em>
                                                </small>
                                            </span>
                                        </p>
                                    </div>
                                    @else
                                    <div class="container collapse py-3" id="menu1">
                                        <p class="mb-5" style="font-size: 9pt;">
                                            <strong>{{ $complaint->agency->name }}</strong>
                                            <br>
                                            <span>
                                                <small>
                                                    <em>
                                                        "Komentar tidak ada"
                                                    </em>
                                                </small>
                                            </span>
                                        </p>
                                    </div>
                                    @endif
                                    <div class="container collapse py-3" id="menu2">
                                        @if($comment == null)
                                            <p class="px-2">-- Belum Ada Komentar --</p>
                                        @else
                                            @foreach($comment as $row)
                                                <p class="mb-3" style="font-size: 9pt;">
                                                    <strong class="text-capitalize">{{ $row->user->name }}</strong>
                                                    <br>
                                                    <span>
                                                        <small>
                                                            <em class="px-2">{{$row->comment}}</em>
                                                    </small>
                                                    </span>
                                                </p>
                                            @endforeach
                                        @endif
                                        <form action="{{ route('comment.store', $complaint) }}" method="post">
                                            @csrf
                                            <div class="form-group ">
                                                <textarea class="form-control mb-3" name="comment" id="" cols="15" rows="3" placeholder="Berikan komentar ..."></textarea>
                                                <input type="hidden" name="id_complaint" value="{{$complaint->id}}">
                                            
                                                <button type="submit" class="btn btn-danger btn-sm">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="container collapse py-3" id="menu3">
                                        <div class="px-2">
                                            <img src="{{ asset('images/'.$complaint->image) }}" style="width: 20%" alt="">
                                            <p class="px-4 fw-bold">*{{$complaint->title_complaint}}</p>
                                        </div>
                                    </div>
                                    <div class="container collapse py-3" id="menu4">
                                        <p class="px-2"><strong>Alamat</strong> <span> : </span>{{$complaint->location}}</p>
                                        <p class="px-2"><strong>Longitude</strong> <span> : </span>{{$complaint->longitude}}</p>
                                        <p class="px-2"><strong>Latitude</strong> <span> : </span>{{$complaint->latitude}}</p>

                                        <div id="map" style="width :100%; height: 400px"></div>
                                    </div>
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
    
        var map = L.map('map').setView([{{$complaint->longitude}}, {{ $complaint->latitude }}], 10);
        var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        var popup = L.popup()
		.setLatLng([{{$complaint->longitude}}, {{ $complaint->latitude }}])
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
    </script>
@endsection