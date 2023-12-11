@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@extends('admin.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="m-0 font-weight-bold" href="{{ route('admin.complaint') }}">Data Admin</a></li>
                        </ol>
                    </nav>
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-md-end mb-4">
                        <a href="{{ route('administrator.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i>
                                Tambah Data
                        </a>               
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th>NIK</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Telp</th>
                                            <th width="14%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($users->count())
                                        @php($index = 1)
                                        @foreach($users as $x)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $x->nik }}</td>
                                            <td>{{ $x->username }}</td>
                                            <td>{{ $x->email }}</td>
                                            <td>{{ $x->role }}</td>
                                            
                                            @if($x->phone != null)
                                                <td>{{ $x->phone }}</td>
                                            @else
                                                <td>08XXXXXXXXXX</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('administrator.edit', $x->id) }}" class="btn btn-primary btn-icon-split" >
                                                    <span class="icon text-white-50" style="font-size: 11px;">
                                                        <i class="fas fa-pen fa-xs"></i>
                                                    </span>
                                                </a>
                                                <form action="{{ route('administrator.destroy', $x->id) }}" method="post" style="display: inline">
                                                    @method("DELETE")
                                                    @csrf 
                                                    <button type="submit" class="btn btn-danger btn-icon-split" onclick="return confirm('Are you sure?')">
                                                        <span class="icon text-white-50" style="font-size: 11px;">
                                                            <i class="fas fa-trash fa-xs"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
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