<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function store(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to register as a customer.');
        }

        if (empty(Auth::id())) {
            return redirect('/customer')->with('error', 'User is not authenticated.');
        }

        // dd(Auth::id()); debugging auth id

        if (Auth::user()->customer) {
            return redirect('/customer')->with('error', 'You can only register as a customer once.');
        }

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
            'address' => $validateData['address'],
            'city' => $validateData['city'],
            'province' => $validateData['province'],
            'country' => $validateData['country'],
            'postal_code' => $validateData['postal_code'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/customer')->with('success', 'Customer has been added');
    }
}
