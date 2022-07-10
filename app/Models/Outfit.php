<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;

    protected $table = "outfits";

    protected $fillable = ['nama', 'gambar', 'harga', 'stok', 'kategori', 'detail'];
}
