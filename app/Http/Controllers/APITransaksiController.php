<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Customer;
use App\Models\Transaksi;
use GuzzleHttp\Handler\Proxy;

class APITransaksiController extends Controller
{
    public function getAllTransaksi()
    {
        return Transaksi::select(
            'transaksis.id as Transaksi_ID',
            'customers.id as Customer_ID',
            'customers.nama_lengkap',
            'produks.id as Produk_ID',
            'produks.nama_produk',
            'transaksis.kode_transaksi',
            'transaksis.tanggal'

        )
            ->join('customers', 'transaksis.Customer_ID', '=', 'customers.id')
            ->join('produks', 'transaksis.produk_id', '=', 'produks.id')
            ->get();
    }

    public function getTransaksi(Transaksi $transaksi)
    {
        return Transaksi::find($transaksi);
    }

    public function getTransaksiUser(Customer $customer)
    {
        /*  
      select a.*, b.* from poduks a
      inner join kategoris b on a.kategori_id=b.id
      where b.id=request
      */
        return Transaksi::select('*')
            ->join('customers', 'transaksis.customer_id', '=', 'customers.id')
            ->where('customers.id', $customer->id)
            ->get();
    }

    public function newTransaksi()
    {
        request()->validate([
            'customer_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'kode_transaksi' => 'required'
        ]);

        return Transaksi::create([
            'customer_id' => request('customer_id'),
            'produk_id' => request('produk_id'),
            'jumlah' => request('jumlah'),
            'tanggal' => request('tanggal'),
            'kode_transaksi' => request('kode_transaksi')
        ]);
    }



    public function updateTransaksi(Transaksi $transaksi)
    {
        request()->validate([
            'customer_id' => 'required',
            'tanggal' => 'required',
            'kode_transaksi' => 'required'
        ]);

        $success = $transaksi->update([
            'customer_id' => request('customer_id'),
            'tanggal' => request('tanggal'),
            'kode_transaksi' => request('kode_transaksi')
        ]);

        return [
            'success' => $success,
            'status' => 200
        ];
    }





    public function hapusTransaksi(Transaksi $transaksi)
    {
        $success = $transaksi->delete();
        return [
            'success' => $success,
            'status' => 200
        ];
    }
}
