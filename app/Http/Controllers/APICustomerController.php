<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class APICustomerController extends Controller
{
    public function getAllCustomer()
    {
        return Customer::all();
    }

    public function getCustomer(Customer $customer)
    {
        return Customer::where(' email', $customer)->first();
    }



    public function addCustomer()
    {
        request()->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'uid' => 'required'
        ]);

        return Customer::create([
            'nama_lengkap' => request('nama_lengkap'),
            'no_hp' => request('no_hp'),
            'alamat_lengkap' => request('alamat_lengkap'),
            'email' => request('email'),
            'password' => request('password'),
            'uid' => request('uid')
        ]);
    }

    public function updateCustomer(Customer $customer)
    {
        request()->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $success = $customer->update([
            'nama_lengkap' => request('nama_lengkap'),
            'no_hp' => request('no_hp'),
            'alamat_lengkap' => request('alamat_lengkap'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        return [
            'success' => $success,
            'status' => 200
        ];
    }

    public function hapusCustomer(Customer $customer)
    {
        $success = $customer->delete();
        return [
            'success' => $success,
            'status' => 200
        ];
    }
}
