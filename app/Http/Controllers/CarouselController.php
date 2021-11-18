<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil data Carousel dari tabel carousels di database, simpan di variabel bernama $carousels
        $carousels = Carousel::all();

        //Return ke view tujuan
        return view(
            'admin.carousel.index', //letak viewnya, views/admin/carousel/index.blade.php
            ['carousels' => $carousels] //kirim data carousels agar bisa diakses di view
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return ke view views/admin/carousel/create.blade.php
        return view('admin.carousel.create'); 
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //ambil inputan user, simpan di variabel $input
        $input = $request->all();

        //jika request datanya berupa image, set destinasi path ke folder public/image/
        //ubah nama image dengan format TahunBulanTanggalJamMenitDetik.ekstensi (20211023115620.jpg)
        //pindahkan image ke folder public/image/
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage"; //value input image diisi dengan nama file yang dipindahkan
        }

        //insert data ke database
        Carousel::create($input);

        //redirect ke method index
        return redirect()->route('carousels.index')->with('success','Carousel created successfully.');
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
    public function edit(Carousel $carousel)
    {
        //
        return view('admin.carousel.edit',compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        //update tabel carousel
        $carousel->update($input);
    
        //redirect ke method index
        return redirect()->route('carousels.index')
                         ->with('success','Carousel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        //delete data dari tabel carousel
        $carousel->delete();

        //redirect ke method index
        return redirect()->route('carousels.index')
                         ->with('success','Carousel deleted successfully');
    }
}
