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

    public function show($id)
    {
        $aircraft = Aircraft::findOrFail($id);
        return view('admin.listproduct', compact('aircraft'));
    }

    public function edit($id)
    {
        $aircraft = Aircraft::findOrFail($id);
        return view('admin.edit', compact('aircraft'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'nationalorigin' => 'required',
            'manufactured' => 'required',
            'price' => 'required',
            'photo' => 'nullable|image',
        ]);

        $aircraft = Aircraft::findOrFail($id);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('aircraft_photos', 'public');
            $validated['photo'] = $path;
        }

        $aircraft->update($validated);

        return redirect()->route('admin.listproduct')->with('success', 'Aircraft updated successfully!');
    }

    public function destroy($id)
    {
        $aircraft = Aircraft::findOrFail($id);
        $aircraft->delete();

        return redirect()->route('admin.listproduct')->with('success', 'Aircraft deleted successfully!');
    }
}
