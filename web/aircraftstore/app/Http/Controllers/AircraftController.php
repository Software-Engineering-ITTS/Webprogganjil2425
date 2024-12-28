<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Aircraft;

class AircraftController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'nationalorigin' => 'required',
            'manufactured' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);

        Aircraft::create($validate);
        return redirect()->route('/addproduct')->with('success', 'Aircraft Added');
    }
}
