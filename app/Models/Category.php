<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['kategori', 'gambar'];

    public function destination(){
        return $this->hasMany('App\Models\Destination');
    }
}
