<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangCategoryRequest;
use App\Http\Requests\UpdateBarangCategoryRequest;
use App\Models\BarangCategory;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class BarangCategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = BarangCategory::active()->paginate(6);
        return view('kategori.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('kategori.form');
    }

     // Store new category
     public function store(Request $request)
     {
         $request->validate([
             'nama_kategori' => 'required|string|max:255',
         ]);
 
         BarangCategory::create([
             'nama_kategori' => $request->nama_kategori,
         ]);
 
         return redirect()->route('barang-category.index')->with('success', 'Kategori Barang berhasil ditambahkan!');
     }
     public function edit($id)
     {
         $category = DB::table('barang_categories')->where('id', $id)->first();
 
         return view('kategori.form', compact( 'category'));
     }
 
    //  public function update(Request $request, Barang $barang)
    //  {
    //      $request->validate([
    //          'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
    //          'nama_barang' => 'required',
    //          'kategori_id' => 'required',
    //          'tanggal_diterima' => 'required|date',
    //          'stock' => 'required|integer',
    //      ]);
 
    //      $barang->update($request->all());
    //      return redirect()->route('barangs.index')->with('success', 'Barang updated successfully.');
    //  }

     // Update existing category
     public function update(Request $request)
     {
         $request->validate([
             'nama_kategori' => 'required|string|max:255',
         ]);
 
         $category = BarangCategory::find($request->get('id'));
         if ($category) {
             $category->update([
                 'nama_kategori' => $request->nama_kategori,
             ]);
             return redirect()->route('barang-category.index')->with('success', 'Kategori Barang berhasil diperbarui!');
         }
 
         return redirect()->route('barang-category.index')->with('error', 'Kategori Barang tidak ditemukan!');
     }
 
     
     public function destroy($id)
     {
         $category = DB::table('barang_categories')->where('id', $id)->first();
 
         if ($category) {
            DB::table('barang_categories')->where('id', $id)->update([
                'deleted_at' => now()
            ]);

             return redirect()->route('barang-category.index')->with('success', 'Kategori Barang berhasil dihapus!');
         }
 
         return redirect()->route('barang-category.index')->with('error', 'Kategori Barang tidak ditemukan!');
     }
}
