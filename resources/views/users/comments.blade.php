@extends('layouts.app')
@section('content')
    <div class="container py-5 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p><b>Testing percobaan untuk komentar</b></p>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </p>
                        <hr>
                        <h4>Display Comments</h4>

                        <div class="display-comment">
                            <strong>Bagus Bujangan</strong>
                            <p>ini adalah komment pertama dan ini sifatnya baku</p>
                        </div>

                        <div class="display-comment">
                            <strong>Putra Jaya Anugrah</strong>
                            <p>ini adalah komment kedua dan ini sifatnya baku</p>
                        </div>

                        <hr>
                        <form action="#">
                            <div class="form-group mb-3">
                                <input type="text" name="" class="form-control">
                                <input type="hidden" name="" value="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add Comment">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection