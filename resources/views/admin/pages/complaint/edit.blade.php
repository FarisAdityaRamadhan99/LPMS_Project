@extends('admin.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item m-0 font-weight-bold "><a href="{{ route('admin.complaint') }}">Data Pengaduan</a></li>
            <li class="breadcrumb-item m-0 font-weight-bold  active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="py-3 px-3" style="font-size: 11px;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="m-0 font-weight-bold text-primary text-center">
                            Pengaduan Masyarakat
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Tanggal Pengaduan</th>
                                        <td>:</td>
                                        <td>{{$complaint->created_at}} </td>
                                    </tr>
                                    <tr>
                                        <th>Judul Pengaduan</th>
                                        <td>:</td>
                                        <td>{{ $complaint->title_complaint }}</td>
                                    </tr>
                                    <tr>
                                        <th>Wilayah Kecamatan</th>
                                        <td>:</td>
                                        <td>{{ $complaint->agency->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>:</td>
                                        <td>{{ $complaint->category->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="m-0 font-weight-bold text-primary text-center">
                            Tanggapan Petugas
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('complaint.update', [$complaint->id]) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="status" class="col-md-3 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select class="custom-select" id="status" name="status">
                                        <option value="" selected>Status Aduan</option>
                                        <option @if($complaint['status'] == 'pending') selected @endif value="pending">Pending</option>
                                        <option @if($complaint['status'] == 'ditinjau') selected @endif value="ditinjau">Ditinjau</option>
                                        <option @if($complaint['status'] == 'diproses') selected @endif value="diproses">Di proses</option>
                                        <option @if($complaint['status'] == 'selesai') selected @endif value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="" class="col-md-3 col-form-label text-md-right">Tanggapan</label>
                                <div class="col-md-9">
                                    <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample1" name="name" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-secondary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection