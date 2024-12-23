<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\BarangCategory;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::active()->with('kategori')->paginate(6);
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BarangCategory::all();
        return view('barang.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'tanggal_diterima' => 'required|date',
            'stock' => 'required|integer',
            'harga' =>  'required|integer',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = DB::table('barangs')->where('id', $id)->first();

        $categories = BarangCategory::all();
        return view('barang.form', compact('barang', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'tanggal_diterima' => 'required|date',
            'stock' => 'required|integer',
            'harga' =>  'required|integer',
        ]);

        $barang = Barang::findOrFail($request->get('id'));
        if ($barang) {
            $barang->update($request->all());
            return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
        }

        return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan!');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $barang = DB::table('barangs')->where('id', $id)->first();

         if ($barang) {
 
             DB::table('barangs')->where('id', $id)->update([
                 'deleted_at' => now()
             ]);
 
             return redirect()->route('barang.index')->with('success', 'Data User berhasil dihapus!');
         }
 
         return redirect()->route('barang.index')->with('error', 'Data User tidak ditemukan!');
    }
}
