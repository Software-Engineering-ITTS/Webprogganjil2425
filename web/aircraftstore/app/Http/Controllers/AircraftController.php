<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;

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
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('photo')->store('aircraft_photos', 'public');

        Aircraft::create([
            'name' => $validate['name'],
            'type' => $validate['type'],
            'nationalorigin' => $validate['nationalorigin'],
            'manufactured' => $validate['manufactured'],
            'price' => $validate['price'],
            'photo' => $path,
        ]);
        return redirect()->route('admin.addproduct')->with('success', 'Aircraft Added');

    }
}
