<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data dari tabel lokasi
        $locations = Location::select('*')->paginate(5);

        //return ke views/admin/lokasi/index.blade.php
        return view(
            'admin.lokasi.index',
            ['locations' => $locations]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return views/admin/lokasi/edit.blade.php
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validasi request
        $request->validate([
            'nama_lokasi' => 'required'
        ]);

        //ambil inputan user, masukkan ke variabel $input. 
        //variabel $input akan berbentuk array $input = ['nama_lokasi']
        //'nama_lokasi' adalah value dari property name di form tambah lokasi
        $input = $request->all();

        //deklarasi masing2 kolom tabel locations, diisi dengan inputan user
        $location = new Location;
        //isi kolom lokasi
        $location->lokasi = $input['nama_lokasi'];
        //insert data ke database
        $location->save();

        //redirect ke method index
        return redirect()->route('lokasi.index')->with('success','Location created successfully.');
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
        //ambil data lokasi berdasarkan id yang dipilih user
        $location = Location::find($id);

        //return views/admin/lokasi/edit.blade.php
        return view('admin.lokasi.edit', compact('location'));
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
        //ambil data request dari user
        $input = $request->all();

        //ambil data lokasi berdasarkan $id yg dipilih user
        $location = Location::find($id);

        $location->lokasi = $input['nama_lokasi'];

        $location->save();

        return redirect()->route('lokasi.index')
                         ->with('success', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ambil data lokasi berdasarkan $id
        $location = Location::find($id);

        //delete
        $location->delete();

        //redirect ke method index
        return redirect()->route('lokasi.index')
                         ->with('success', 'Location deleted sucessfully');
    }
}
