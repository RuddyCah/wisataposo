<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use App\Models\Information;
use Illuminate\Database\Query\Builder;

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
        $destinations = Destination::select('*')->limit(10)->get(); 
        $categories = Category::select('*')->limit(10)->get();

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

    //Untuk menampilkan Hasil Pencarian dari Menu Navbar
    //Hasil pencarian menampilkan data Destinasi Wisata dan Informasi Umum
    //Hasil pencarian berdasarkan lokasi, kategori, judul, dan konten
    public function HasilPencarian(Request $request){

        $inputUser = $request->navSearchValue;

        //Jika user mencari lokasi, Ambil lokasi id berdasarkan nama lokasi yang diinput user
        $location_id = Location::where('lokasi','LIKE','%'.$inputUser.'%')->get('id');

        //Jika user mencari kategori, Ambil kategori id berdasarkan nama kategori yang diinput user
        $category_id = Category::where('kategori', 'LIKE', '%'.$inputUser.'%')->get('id');

        //Ambil destinasi wisata
        $destinations = Destination::select('judul','gambar','konten')
                                                ->whereIn('lokasi_id', $location_id)
                                                ->orWhereIn('kategori_id', $category_id)
                                                ->orWhere('judul', 'LIKE', '%'.$inputUser.'%')
                                                ->orWhere('konten', 'LIKE', '%'.$inputUser.'%');

        //Ambil Informasi Umum
        $informations = Information::select('judul','gambar','konten')->where('judul', 'LIKE', '%'.$inputUser.'%')
                                                ->orWhere('konten', 'LIKE', '%'.$inputUser.'%');

        //Gabungkan tabel destinasi dan informasi
        $results = $destinations->union($informations)->paginate(2);

        // return $results;

        return view(
            'user.search',
            [
                'results' => $results,
                'searchInput' => ucwords($inputUser) //ucwords() untuk ubah uppercase di huruf pertama
            ]
        );
    }

    public function IdeLiburan(){
        $carousels = Carousel::all();
        $destinations = Destination::select('*')->limit(10)->get();

        // return $results;

        return view(
            'user.ideliburan',
            [
                'destinations' => $destinations,
                'carousels' => $carousels
            ]
        );
    }

    public function SemuaKategori(){
        $carousels = Carousel::all();
        $categories = Category::all();

        return view(
            'user.kategori',
            [
                'categories' => $categories,
                'carousels' => $carousels
            ]
        );
    }

    public function DestinasiWisata(){
        $carousels = Carousel::all();
        $destinations = Destination::all();
        $popularDestinations = Destination::select('*')
                                            ->orderBy('total_views', 'desc')
                                            ->limit(10)
                                            ->get();
        $categories = Category::all();

        return view(
            'user.destinasiwisata',
            [
                'destinations' => $destinations,
                'carousels' => $carousels,
                'categories' => $categories,
                'popularDestinations' => $popularDestinations
            ]
        );
    }

}
