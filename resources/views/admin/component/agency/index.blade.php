@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@extends('admin.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item m-0 font-weight-bold">Data Instansi</li>
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
                    <div class="d-sm-flex align-items-center justify-content-md-end mb-4">
                        .
                        <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                data-toggle="modal" data-target="#exampleModal"><i
                                class="fas fa-plus fa-sm text-white-50"></i> 
                            Tambah Data
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('agency.store') }}" method="post">
                                        @csrf
                                            <label for="agency">Nama Instansi</label>
                                            <input type="text" id="agency" @error('agency') is-invalid @enderror name="name" class="form-control" required>
                                            @error('agency')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            
                                            <label for="address">Alamat</label>
                                            <input type="text" id="address" @error('address') is-invalid @enderror name="address" class="form-control" required>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <small>
                                                Tambahkan data instansi guna melengkapi data penunjang pengaduan yang dilakukan oleh masyarakat*
                                            </small>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
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
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Alamat</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($agency->count())
                                        @php($index = 1)
                                        @foreach($agency as $x)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $x->name }}</td>
                                            <td>{{ $x->address }}</td>
                                            <td>
                                                <a href="{{ route('agency.edit', $x->id) }}" class="btn btn-primary btn-icon-split" >
                                                    <span class="icon text-white-50" style="font-size: 11px;">
                                                        <i class="fas fa-pen fa-xs"></i>
                                                    </span>
                                                </a>
                                                <form action="{{ route('agency.destroy', $x->id) }}" method="post" style="display: inline">
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