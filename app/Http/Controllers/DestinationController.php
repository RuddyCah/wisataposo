<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Location;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil semua data destinasi dari db
        $destinations = Destination::all();

        //return views/admin/destinasi/index.blade.php
        return view(
            'admin.destinasi.index',
            ['destinations' => $destinations]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        //return views/destinasi/create.blade.php
        return view(
            'admin.destinasi.create',
            ['categories' => $categories, 'locations' => $locations]
        );
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
            'nama_kategori' => 'required',
            'nama_lokasi' => 'required',
            'nama_destinasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //ambil inputan user, masukkan ke variabel $input. 
        //variabel $input akan berbentuk array, index yg digunakan adalah property name di form html
        $input = $request->all();

        //Deklarasi object/model Destination
        $destination = new Destination;
        $destination->kategori_id = $input['nama_kategori']; //ambil id lokasi
        $destination->lokasi_id = $input['nama_lokasi']; //ambil id lokasi
        //jika request datanya berupa image, set destinasi path ke folder public/image/
        //ubah nama image dengan format TahunBulanTanggalJamMenitDetik.ekstensi (20211023115620.jpg)
        //pindahkan image ke folder public/image/
        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage"; //value input image diisi dengan nama file yang dipindahkan
        }
        $destination->gambar = $input['gambar'];
        $destination->judul = $input['nama_destinasi'];
        $destination->konten = $input['deskripsi'];

        //insert data ke database
        $destination->save();

        //redirect ke method index
        return redirect()->route('destinasi.index')->with('success','Destination created successfully.');
        //return $input;
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
        //ambil data destinasi berdasarkan id yang dipilih user
        $destination = Destination::find($id);
        $categories = Category::all();
        $locations = Location::all();

        //return views/admin/lokasi/edit.blade.php
        return view('admin.destinasi.edit', 
                    [
                        'destination' => $destination,
                        'categories' => $categories, 
                        'locations' => $locations
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
            'nama_kategori' => 'required',
            'nama_lokasi' => 'required',
            'nama_destinasi' => 'required',
            'deskripsi' => 'required'
        ]);

        //ambil semua request/inputan user
        $input = $request->all();

        $destination = Destination::find($id);
        $destination->judul = $input["nama_destinasi"];
        $destination->konten = $input["deskripsi"];

        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";

            $destination->gambar = $input['gambar'];
        }else{
            unset($input['image']);
        }

        $destination->kategori_id = $input['nama_kategori'];
        $destination->lokasi_id = $input['nama_lokasi'];

        $destination->save(); //update

        return redirect()->route('destinasi.index')
                         ->with('success', 'Destination updated successfully');
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
        $destination = Destination::find($id);
        $destination->delete();

        //redirect ke method index
        return redirect()->route('destinasi.index')
                         ->with('success', 'Destination deleted successfully');    
    }
}
