<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "produk_id",
        "jumlah",
        "tanggal",
        "kode_transaksi"
    ];
}
