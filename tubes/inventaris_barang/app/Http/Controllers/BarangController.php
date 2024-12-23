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
        ]);

        Barang::create($request->all());
        return redirect()->route('barangs.index')->with('success', 'Barang created successfully.');
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
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'tanggal_diterima' => 'required|date',
            'stock' => 'required|integer',
        ]);

        $barang->update($request->all());
        return redirect()->route('barangs.index')->with('success', 'Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // get data buku sesuai id
         $karyawan = DB::table('barangs')->where('id', $id)->first();

         if ($karyawan) {
 
             DB::table('barangs')->where('id', $id)->update([
                 'deleted_at' => now()
             ]);
 
             return redirect()->route('karyawan.index')->with('success', 'Data User berhasil dihapus!');
         }
 
         return redirect()->route('karyawan.index')->with('error', 'Data User tidak ditemukan!');
    }
}
