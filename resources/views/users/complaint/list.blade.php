@section('css')
    <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@extends('layouts.app')
@section('content')
<div class="py-4 " style="background: #D9F7CF;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    @foreach($complaint as $x)
                    <div class="col-md-3 py-3">
                        <div class="card shadow py-2 pb-2" style="border-radius: 20px; font-size: 10px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-6 text-center mb-4">{{ $x->title_complaint }}</h5>
                                <p class="card-text mb-4 text-center">{{Str::limit($x->complaint, 50) }}</p>
                                <div class="pt-4 mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="bx bxs-send fa-fw text-success" style="font-size: 9px;"></i>
                                            <strong>Tujuan : </strong> 
                                        </div>
                                        <div class="col-8">
                                            <p class="card-text mb-1 text-end" style="font-size: 9px;">
                                                {{ $x->agency->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="bx bxs-analyse text-success"></i>
                                            <strong>Status : </strong> 
                                        </div>
                                        <div class="col-8">
                                            <p class="card-text mb-1 text-end" style="font-size: 9px;">
                                                {{ $x->status }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="bx bx-list-ul text-success"></i>
                                            <strong>Kategori : </strong> 
                                        </div>
                                        <div class="col-8">
                                            <p class="card-text mb-1 text-end" style="font-size: 9px;">
                                                {{ $x->category->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="bx bx-list-ul text-success"></i>
                                            <strong>waktu : </strong> 
                                        </div>
                                        <div class="col-8">
                                            <p class="card-text mb-1 text-end" style="font-size: 9px;">
                                                {{ $x->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grip gap-2 text-center pt-3" >
                                    <a href="{{ route('public.show', $x->id)}}" class="btn btn-danger" style="font-size: 9px;">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection