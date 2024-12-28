<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store (Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required'
        ]);

        $customer = Customer::create([
            'fullname' => $validateData['fullname'],
            'phone_number' => $validateData['phone_number'],
            'address'=> $validateData['address'],
            'city' => $validateData['city'],
            'province' => $validateData['province'],
            'country'=> $validateData['country'],
            'postal_code'=> $validateData['postal_code'],
        ]);


        return redirect('/customer')->with('success', 'Customer has been added');
    }
}
