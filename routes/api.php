<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIKategoriController;
use App\Http\Controllers\APIProdukController;
use App\Http\Controllers\APICustomerController;
use App\Http\Controllers\APITransaksiController;
use App\Http\Controllers\APITransaksi_detailController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API: KATEGORI
Route::get('/kategori', [APIKategoriController::class, 'getAllKategori']);
Route::get('/kategori/{kategori}', [APIKategoriController::class, 'getKategori']);
Route::post('/kategori', [APIKategoriController::class, 'addKategori']);
Route::put('/kategori/{kategori}', [APIKategoriController::class, 'updateKategori']);
Route::delete('/kategori/{kategori}', [APIKategoriController::class, 'hapusKategori']);

// API: PRODUK
Route::get('/produk', [APIProdukController::class, 'getAllProduk']);
Route::get('/produk/{produk}', [APIProdukController::class, 'getProduk']);
Route::post('/produk', [APIProdukController::class, 'addProduk']);
Route::get('/produk/kategori/{kategori}', [APIProdukController::class, 'getProdukKat']);
Route::put('/produk/{produk}', [APIProdukController::class, 'updateProduk']);
Route::delete('/produk/{produk}', [APIProdukController::class, 'hapusProduk']);

// API: CUSTOMER
Route::get('/user', [APICustomerController::class, 'getAllCustomer']);
Route::get('/user/{customer}', [APICustomerController::class, 'getCustomer']);
Route::post('/user', [APICustomerController::class, 'addCustomer']);
Route::put('/user/{customer}', [APICustomerController::class, 'updateCustomer']);
Route::delete('/user/{customer}', [APICustomerController::class, 'hapusCustomer']);

// API: TRANSAKSI
Route::get('/transaksi', [APITransaksiController::class, 'getAllTransaksi']);
Route::get('/transaksi/{transaksi}', [APITransaksiController::class, 'getTransaksi']);
Route::post('/transaksi', [APITransaksiController::class, 'newTransaksi']);
Route::get('/transaksi/user/{customer}', [APITransaksiController::class, 'getTransaksiUser']);
Route::put('/transaksi/{transaksi}', [APITransaksiController::class, 'updateTransaksi']);
Route::delete('/transaksi/{transaksi}', [APITransaksiController::class, 'hapusTransaksi']);

// API: TRANSAKSI_DETAIL
// Route::get('/transaksi_detail', [APITransaksi_detailController::class, 'getAllTransaksi_detail']);
