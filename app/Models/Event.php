<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['lokasi_id', 'nama_event', 'tanggal', 'info'];

    public function location(){
        return $this->belongsTo('App\Models\Location', 'lokasi_id');
    }
}
