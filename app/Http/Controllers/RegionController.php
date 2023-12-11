<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::all();

        return view('admin.component.region.index', [
            'title' => 'Wilayah Kecamatan'
        ], compact('region'));
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
    public function store(Request $request, Region $region)
    {
        Region::create([
            'name'  =>  $request->name,
        ]);

        return redirect('/region')->with('success', 'Data wilayah kecamatan berhasil ditambahkan');
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
        $region     =   Region::findOrFail($id);
        
        return view('admin.component.region.edit', [
            'title' =>  'Edit Wilayah'
        ], compact('region'));
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
            'name'  => 'required|string|max:30',
        ]);

        $region     =   Region::findOrFail($id);
        $region->update([
            'name'  =>  $request->name,
        ]);

        return redirect('/region')->with('success', 'Data Wilayah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region     =   Region::findOrFail($id);
        $region->delete();

        return back()->with('success', 'Data Wilayah berhasil dihapus');
    }
}
