<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserViewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes untuk user
Route::get('/', [UserViewController::class, 'welcome'])->name('welcome');
Route::post('/events', [UserViewController::class, 'event']);
Route::get('/info-umum', [UserViewController::class, 'informasi']); 
Route::get('/pencarian', [UserViewController::class, 'HasilPencarian']); 
Route::get('/ide-liburan', [UserViewController::class, 'IdeLiburan']); 
Route::get('/lihat-kategori', [UserViewController::class, 'SemuaKategori']); 
Route::get('/destinasi-wisata', [UserViewController::class, 'DestinasiWisata']); 
Route::get('/destinasi-wisata/{destination}', [UserViewController::class, 'DestinasiByID'])->name('lihat-destinasi'); 
Route::get('/kategori-wisata/{category}', [UserViewController::class, 'DestinasiByCategory'])->name('kategori-wisata'); 

//Start Authenticated Routes
// Routes untuk admin
Auth::routes();

//Define url localhost:8000/dashboard arahkan ke resources/views/admin/dashboard.blade.php
Route::get('/dashboard', function() {
    return view('admin.dashboard.index');
})->name('home')->middleware('auth');

//Routes untuk menu Carousel
//->middleware('auth') mengharuskan user untuk login terlebih dahulu untuk membuka halaman/menu carousel
//jika user belum login, dan tembak ke link menu carousel, maka akan dilempar ke halaman login
Route::resource('carousels', 'App\Http\Controllers\CarouselController')->middleware('auth');

//Routes untuk menu Kategori
Route::resource('kategori', 'App\Http\Controllers\CategoryController')->middleware('auth');

//Routes untuk menu Lokasi
Route::resource('lokasi', 'App\Http\Controllers\LocationController')->middleware('auth');

//Routes untuk menu Destinasi
Route::resource('destinasi', 'App\Http\Controllers\DestinationController')->middleware('auth');

//Routes untuk menu Event
Route::resource('event', 'App\Http\Controllers\EventController')->middleware('auth');

//Routes untuk menu Informasi Umum
Route::resource('informasi', 'App\Http\Controllers\InformationController')->middleware('auth');

//End Authenticated Routes

//Start General User Routes

