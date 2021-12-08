<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['judul','konten','gambar_judul','kategori_id', 'lokasi_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'kategori_id');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location', 'lokasi_id');
    }
}
