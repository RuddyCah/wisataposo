<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use App\Models\Information;

class UserViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        //ambil data dari tabel lokasi
        $carousels = Carousel::all();
        $destinations = Destination::all(); 
        $categories = Category::all();

        //return ke views/welcome.blade.php
        return view(
            'user.welcome',
            [
                'carousels' => $carousels,
                'destinations' => $destinations,
                'categories' => $categories
            ]
        );
    }

    public function event(Request $request){
        $carousels = Carousel::all();

        //Ambil lokasi id berdasarkan nama lokasi yang diinput user
        $location_id = Location::where('lokasi','LIKE','%'.$request->searchValue.'%')->get('id');

        //Ambil event berdasarkan lokasi id
        $event = Event::select('*')->whereIn('lokasi_id', $location_id)->get();

        return view(
            'user.events',
            [
                'events' => $event,
                'carousels' => $carousels,
                'searchInput' => ucwords($request->searchValue) //ucwords() untuk ubah uppercase di huruf pertama
            ]
        );
    }

    //Get Informasi Umum
    public function informasi(){
        $carousels = Carousel::all();

        //Ambil semua data informasi umum
        $informations = Information::all();

        return view(
            'user.informasi',
            [
                'informations' => $informations,
                'carousels' => $carousels
            ]
        );
    }

}
