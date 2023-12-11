@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@extends('admin.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item m-0 font-weight-bold  active" aria-current="page">Data Pengaduan</li>
                            </ol>
                        </nav>
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @else(session()->has('error'))
                        <div class="alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Judul</th>
                                            <th>Lokasi</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Judul</th>
                                            <th>Lokasi</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($complaint->count())
                                        @php($index = 1)
                                        @foreach($complaint as $x)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $x->user->nik }}</td>
                                            <td>{{ $x->title_complaint }}</td>
                                            <td>{{ $x->location }}</td>
                                            <td>{{ $x->category->name }}</td>
                                            <td>{{ $x->status }}</td>
                                            <td>
                                                <a href="{{ route('administrator.show', $x->id) }}" class="btn btn-warning btn-icon-split" >
                                                    <span class="icon text-white-50" style="font-size: 11px;">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('complaint.edit', $x->id) }}" class="btn btn-primary btn-icon-split" >
                                                    <span class="icon text-white-50" style="font-size: 11px;">
                                                        <i class="fas fa-pen fa-xs"></i>
                                                    </span>
                                                </a>
                                                <form action="" method="post" style="display: inline">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-icon-split" onclick="return confirm('Are you sure?')">
                                                        <span class="icon text-white-50" style="font-size: 11px;">
                                                            <i class="fas fa-trash fa-xs"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 4000);
        });    
    </script>
@endsection