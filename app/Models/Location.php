<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['lokasi'];

    public function destination(){
        return $this->hasMany('App\Models\Destination');
    }
}
