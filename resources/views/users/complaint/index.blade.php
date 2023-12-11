@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@extends('users.profile.sidenav')
@section('content2')
<div class="ps-5">
    <h2 class="text-uppercase fw-bold mb-3">Aduan anda</h2>
    <p class="fs-7">Data berikut aduan yang anda buat.</p>

    
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @else(session()->has('error'))
            <div class="alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                <td>{{ $x->title_complaint }}</td>
                                <td>{{ $x->location }}</td>
                                <td>{{ $x->category->name }}</td>
                                <td>{{ $x->status }}</td>
                                <td>
                                    <a href="{{ route('complaint.show', $x->id) }}" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50" style="font-size: 11px;">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                    </a>
                                    <a href="" class="btn btn-primary btn-icon-split" >
                                        <span class="icon text-white-50" style="font-size: 11px;">
                                            <i class="fas fa-pen fa-xs"></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('complaint.destroy', $x->id) }}" method="post" style="display: inline">
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