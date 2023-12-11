<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
        protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function authencticate(Request $request)
    {
        if($user->role == 'admin'){
            $id = Session::put(['id' => $user->id]);
            return redirect()->route('Dashboard')->with('success', 'Welcome '.$user->username.' ...');
        }else if($user->role == 'petugas'){
            $id = Session::put(['id' => $user->id]);
            return redirect()->route('Dashboard')->with('success', 'Welcome '.$user->username.' ...');
        }else if($user->role == 'pimpinan'){
            $id = Session::put(['id' => $user->id]);
            return redirect()->route('Dashboard')->with('success', 'Welcome '.$user->username.' ...');
        }
        $id = Session::put(['id' => $user->id]);
        return redirect()->route('beranda')->with('success', 'Welcome '.$user->username.' ...');
    }
}
