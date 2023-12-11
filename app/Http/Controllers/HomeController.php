<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if($role == "masyarakat"){
            return redirect()->to('user');
        } else if($role == "admin"){
            return redirect()->to('admin');
        } else if($role == "petugas"){
            return redirect()->to('petugas');
        } else if($role == "pimpinan") {
            return redirect()->to('pimpinan');
        } else {
            return redirect()->to('logout');
        }
    }
}
