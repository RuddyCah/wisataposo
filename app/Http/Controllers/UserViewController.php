<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Event;
use App\Models\Location;

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
            'welcome',
            [
                'carousels' => $carousels,
                'destinations' => $destinations,
                'categories' => $categories
            ]
        );
    }

    public function event(Request $request){
        $carousels = Carousel::all();
        $location_id = Location::where('lokasi','LIKE','%'.$request->searchValue.'%')->get('id');

        $event = Event::select('*')->whereIn('lokasi_id', $location_id)->get();

        return view(
            'events',
            [
                'events' => $event,
                'carousels' => $carousels
            ]
        );
    }

}
