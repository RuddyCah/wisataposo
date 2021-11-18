<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data kategori dari database
        $categories = Category::all();

        //return view ke resources/views/admin/kategori/index.blade.php
        return view(
            'admin.kategori.index',
            ['categories' => $categories]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view ke resources/views/admin/kategori/create.blade.php
        return view('admin.kategori.create');
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //ambil inputan user, masukkan ke variabel $input. 
        //variabel $input akan berbentuk array $input = ['nama_kategori', 'gambar']
        //'nama_kategori' dan 'gambar' adalah value dari property name di form tambah kategori
        $input = $request->all();

        //jika request datanya berupa image, set destinasi path ke folder public/image/
        //ubah nama image dengan format TahunBulanTanggalJamMenitDetik.ekstensi (20211023115620.jpg)
        //pindahkan image ke folder public/image/
        if ($image = $request->file('gambar')) { //'gambar' sesuai dengan property name di form tambah kategori
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage"; //value input image diisi dengan nama file yang dipindahkan
        }

        //deklarasi masing2 kolom tabel categories, diisi dengan inputan user
        $category = new Category;
        $category->kategori = $input['nama_kategori'];
        //isi kolom gambar
        $category->gambar = $input['gambar'];
        //insert data ke database
        $category->save();

        //redirect ke method index
        return redirect()->route('kategori.index')->with('success','Category created successfully.');
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
        $category = Category::find($id);
        //return ke view kategori/edit.blade.php
        return view('admin.kategori.edit', compact('category'));
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
        //ambil semua request/inputan user
        $input = $request->all();

        $category = Category::find($id);
        $category->kategori = $input['nama_kategori'];

        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";

            $category->gambar = $input['gambar'];
        }else{
            unset($input['image']);
        }

        $category->save(); //update

        return redirect()->route('kategori.index')
                         ->with('success', 'Category updated successfully');
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
        $category = Category::find($id);
        $category->delete();

        //redirect ke method index
        return redirect()->route('kategori.index')
                         ->with('success', 'Category deleted successfully');
    }
}
