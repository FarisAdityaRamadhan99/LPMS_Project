
@extends('layouts.app')
@section('content')

        <div class="py-5 px-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px">

                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="{{ route('profile.index') }}" class="nav-link link-dark">Profil</a>
                            </li>   
                            <li>
                                <a href="{{ route('complaint.index') }}" class="nav-link link-dark">Riwayat Aduan</a>
                            </li>
                            <li>
                                <a href="{{ route('complaint.create') }}" class="nav-link link-dark">Kirim Aduan</a>
                            </li>
                        </ul>
                    </div>  
                </div>
                <div class="col-md-8">
                    @yield('content2')
                </div>
            </div>
            
        </div>
        
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
@endsection
