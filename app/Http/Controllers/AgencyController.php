<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agency = Agency::all();

        return view('admin.component.agency.index', [
            'title' => 'Instansi'
        ], compact('agency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Agency $agency)
    {
        Agency::create([
            'name'      => $request->name,
            'address'   => $request->address,
        ]);

        return redirect('/agency')->with('success', 'Data Instansi berhasil ditambahkan');
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
        $agency     = Agency::findOrFail($id);

        return view('admin.component.agency.edit', [
            'title' =>  'edit instansi'
        ], compact('agency'));
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
            'name'      => 'required|string|max:255',
            'address'   => 'required|string',
        ]);

        $agency     =   Agency::findOrFail($id);
        $agency->update([
            'name'     =>   $request->name,
            'address'  =>   $request->address,
        ]);

        return redirect('/agency')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency     =   Agency::findOrFail($id);
        $agency->delete();

        return back()->with('success', 'Data instansi berhasil dihapus');
    }
}
