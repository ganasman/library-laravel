<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
    'judul',
    'penulis',
    'kategori',
    'terbit',
    'stok',
    'status',
    'deskripsi',
    ];
}
