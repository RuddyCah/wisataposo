<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data dari tabel lokasi
        $informations = Information::select('*')->paginate(5);

        //return ke views/admin/lokasi/index.blade.php
        return view(
            'admin.informasi.index',
            ['informations' => $informations]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view ke resources/views/admin/event/create.blade.php
        return view('admin.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi request
        $request->validate([
            'judul_informasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //ambil inputan user, masukkan ke variabel $input. 
        //variabel $input akan berbentuk array, index yg digunakan adalah property name di form html
        $input = $request->all();

        //Deklarasi object/model Information
        $information = new Information;
        $information->judul = $input['judul_informasi'];
        //jika request datanya berupa image, set destinasi path ke folder public/image/
        //ubah nama image dengan format TahunBulanTanggalJamMenitDetik.ekstensi (20211023115620.jpg)
        //pindahkan image ke folder public/image/
        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage"; //value input image diisi dengan nama file yang dipindahkan
        }
        $information->gambar = $input['gambar'];
        $information->konten = $input['deskripsi'];

        //insert data ke database
        $information->save();

        //redirect ke method index
        return redirect()->route('informasi.index')->with('success','Information created successfully.');
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
        //ambil data information berdasarkan id yang dipilih user
        $information = Information::find($id);

        //return views/admin/lokasi/edit.blade.php
        return view('admin.informasi.edit', 
                    [
                        'information' => $information
                    ]            
        );
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
        //validasi request
        $request->validate([
            'judul_informasi' => 'required',
            'deskripsi' => 'required'
        ]);

        //ambil semua request/inputan user
        $input = $request->all();

        $information = Information::find($id);
        $information->judul = $input["judul_informasi"];
        $information->konten = $input["deskripsi"];

        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";

            $information->gambar = $input['gambar'];
        }else{
            unset($input['image']);
        }

        $information->save(); //update

        return redirect()->route('informasi.index')
                         ->with('success', 'Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete dari database
        $information = Information::find($id);
        $information->delete();

        //redirect ke method index
        return redirect()->route('informasi.index')
                         ->with('success', 'Information deleted successfully');
    }
}
