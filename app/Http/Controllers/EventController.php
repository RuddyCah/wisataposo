<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data kategori dari database
        $events = Event::select('*')->paginate(5);

        //return view ke resources/views/admin/kategori/index.blade.php
        return view(
            'admin.event.index',
            ['events' => $events]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        //return view ke resources/views/admin/event/create.blade.php
        return view('admin.event.create', ['locations' => $locations]);
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
            'nama_event' => 'required',
            'nama_lokasi' => 'required',
            'tanggal_event' => 'required',
            'info' => 'required'
        ]);

        //ambil inputan user, masukkan ke variabel $input. 
        //variabel $input akan berbentuk array, index yg digunakan adalah property name di form html
        $input = $request->all();

        //Deklarasi object/model Event
        $event = new Event;
        $event->nama_event = $input['nama_event']; //ambil id lokasi
        $event->lokasi_id = $input['nama_lokasi']; //ambil id lokasi
        $event->tanggal = $input['tanggal_event'];
        $event->info = $input['info'];

        //insert data ke database
        $event->save();

        //redirect ke method index
        return redirect()->route('event.index')->with('success','Event created successfully.');
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
        //ambil data event berdasarkan id yang dipilih user
        $event = Event::find($id);
        $locations = Location::all();

        //return views/admin/event/edit.blade.php
        return view('admin.event.edit', 
                    [
                        'event' => $event,
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
            'nama_event' => 'required',
            'nama_lokasi' => 'required',
            'tanggal_event' => 'required',
            'info' => 'required'
        ]);

        //ambil semua request/inputan user
        $input = $request->all();

        $event = Event::find($id);
        $event->nama_event = $input["nama_event"];
        $event->lokasi_id = $input["nama_lokasi"];
        $event->tanggal = $input['tanggal_event'];
        $event->info = $input['info'];

        $event->save(); //update

        return redirect()->route('event.index')
                         ->with('success', 'Event updated successfully');
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
        $event = Event::find($id);
        $event->delete();

        //redirect ke method index
        return redirect()->route('event.index')
                         ->with('success', 'Event deleted successfully');    
    }
}
