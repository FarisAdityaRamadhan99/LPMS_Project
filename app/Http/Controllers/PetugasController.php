<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Agency;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Region;
use App\Models\Status;
use Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index', ['title' => 'Dashboard']);
    }

    public function officer()
    {
        $users = User::with('agency')->where(['role'=>'petugas'])->get();
        return view('Admin.Users.officer.index', ['title'=> 'LPMS'], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agency = Agency::select('id', 'name')->get();

        return view('Admin.Users.officer.create', ['title' => 'LPMS'], compact('agency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik'       => ['required', 'numeric', 'digits_between:13,16', 'unique:users'],
            'phone'     => ['numeric', 'digits_between:10,13'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required', 'not_in:0'],
            'id_agency' => ['nullable'],
        ]);

        $user['password'] = Hash::make($request->password);

        User::create($user);
        if($user){
            return redirect()->route('officer.agency')->with(['success' => 'Data berhasil ditambahkan']);
        }else{
            return redirect()->route('officer.agency')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users      =   User::findOrFail($id);
        $agency     =   Agency::select('id', 'name')->get();

        return view('Admin.Users.officer.edit', ['title' => 'LPMS'], compact('users', 'agency'))->with(['success'=>'Data berhasil dirubah']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username'  =>  'required|string|max:255',
            'name'      =>  'required|string|max:255',
            'email'     =>  'required|string|max:255|email',
            'nik'       =>  'required|numeric|digits_between:13,16',
            'phone'     =>  'required|digits_between:10,13',
            'role'      =>  'nullable',
        ]);

        $user   =   User::findOrFail($id);
        $user->update([
            'username'  =>  $request->username,
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'nik'       =>  $request->nik,
            'phone'     =>  $request->phone,
            'role'      =>  $request->role,
        ]);
        if($user){
            return redirect()->route('officer.agency')->with('success', 'Data Admin berhasil diupdate');
        }else{
            return redirect()->route('officer.agency')->with('error', 'Data Admin gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        
        return back()->with('success', 'Data Administrator berhasil dihapus');
    }
}
