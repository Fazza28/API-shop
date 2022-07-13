<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use GuzzleHttp\Handler\Proxy;

class APITransaksi_detailController extends Controller
{

    // public function getAllTransaksi_detail()
    // {
    //     return Transaksi_detail::select(
    //         'transaksis_detail.id as Transaksi_detail_ID',
    //         'transaksis.id as transaksis_id',
    //         'kategoris.nama_kategori',
    //         'produks.id as produks_id',
    //         'produks.nama_produk',
    //         'transaksis_detail.jumlah'
    //     )
    //         ->join('produks', 'kategoris', 'transaksi_details.produks_id', '=', 'produks.id', 'transaksi_details.transaksi_id', 'transaksis.id')
    //         ->get();
    // }

    // public function getAllTransaksi_detail()
    // {
    //     return Transaksi_detail::select(
    //         'customers.id as customer_id',
    //         'produks.id as Produk_ID',
    //         'customers.nama_lengkap',
    //         'produks.nama_produk',
    //         'transaksi_details.jumlah',
    //         'transaksis.kode_transaksi'
    //     )
    //         ->join('customers', 'transaksis_detail.customer_id', '=', 'customers.id')
    //         ->get();
    // }

    public function getAllTransaksi_detail()
    {
        return Transaksi_detail::all();
    }

    public function getTransaksi_detail(Transaksi_detail $transaksi_detail)
    {
        return Transaksi_detail::find($transaksi_detail);
    }


    public function newTransaksi_detail()
    {
        request()->validate([
            'produk_id' => 'required',
            'jumlah' => 'required',
            'transaksi_id' => 'required'
        ]);

        return Transaksi_detail::create([
            'produk_id' => request('produk_id'),
            'jumlah' => request('jumlah'),
            'transaksi_id' => request('transaksi_id')
        ]);
    }



    public function updateTransaksi_detail(Transaksi_detail $transaksi_detail)
    {
        request()->validate([
            'produk_id' => 'required',
            'jumlah' => 'required',
            'transaksi_id' => 'required'
        ]);

        $success = $transaksi_detail->update([
            'produk_id' => request('produk_id'),
            'jumlah' => request('jumlah'),
            'transaksi_id' => request('transaksi_id')
        ]);

        return [
            'success' => $success,
            'status' => 200
        ];
    }





    public function hapusTransaksi_detail(Transaksi_detail $transaksi_detail)
    {
        $success = $transaksi_detail->delete();
        return [
            'success' => $success,
            'status' => 200
        ];
    }
}
