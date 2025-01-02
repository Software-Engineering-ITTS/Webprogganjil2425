<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kondisi_Mesins;
use App\Models\Mesins;
use Illuminate\Http\Request;

class MesinsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesin = Mesins::with('category')->get();
        $category = Category::all();
        return view('content.mesin', compact('mesin', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:mesins,nama',
            'deskripsi' => 'required|max:500',
            'category_id' => 'required',
            'status' => 'string|in:Mesin On,Mesin Off',
        ]);

        if (!$request->has('status')) {
            $request->merge(['status' => 'Mesin Off']);
        }

        $val_data = $request->all();
        Mesins::create($val_data);

        return redirect('/mesin')->with('success', 'Mesin Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|unique:mesins,nama,' . $id . ',id',
            'deskripsi' => 'required|max:500',
            'category_id' => 'required',
            'status' => 'string|in:Mesin On,Mesin Off',
        ]);

        if (!$request->has('status')) {
            $request->merge(['status' => 'Mesin Off']);
        }

        $mesin = Mesins::findOrFail($id);
        $val_data = $request->all();
        $mesin->update($val_data);

        return redirect('/mesin')->with('success', 'Mesin Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mesin = Mesins::findOrFail($id); // Akan otomatis melempar 404 jika tidak ditemukan
        $mesin->delete();

        return redirect()->route('mesin.index')->with('success', 'Mesin Deleted Successfully.');
    }
}
