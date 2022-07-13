<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_produk",
        "kategori_id",
        "deskripsi",
        "harga",
        "gambar",
    ];
}
