<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//Start Authenticated Routes
Auth::routes();

//Define url localhost:8000/dashboard arahkan ke resources/views/admin/dashboard.blade.php
Route::get('/dashboard', function() {
    return view('admin.dashboard.index');
})->name('home')->middleware('auth');

//Routes untuk menu Carousel
Route::resource('carousels', 'App\Http\Controllers\CarouselController');

//End Authenticated Routes
