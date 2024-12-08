<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::paginate(3);
        return view("barang.index", compact("bukus"));
    }

    public function create()
    {
        return view("barang.form");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'fotos' => 'nullable|max:2048',
            'pengarang' => 'required',
            'kategori' => 'required',
            'stock' => 'required',
            'harga' => 'required',
        ]);

        if($request->file('fotos')){
            $file = $request->fotos;
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
        }
        
        $data = $request->except('_token');
        Buku::create($data);
        return redirect()->route('barang.index');
        
    }

    public function edit($id)
    {
        $bukus = Buku::find($id);
        return view("barang.edit", compact('bukus'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'fotos' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required',
            'stock' => 'required',
            'harga' => 'required',
        ]);

        $bukus = Buku::find($id);

        if ($request->fotos != null && $request->foto != ""){
            $imagepath = public_path('img/'.$bukus->fotos);
            if(File::exist($imagepath)){
                File::delete($imagepath);
            }

            $file = $request->fotos;
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);

            $bukus->update($request->except('_token','fotos'));
        }


        $bukus->judul = $request->judul;
        $bukus->fotos = $request->fotos;
        $bukus->pengarang = $request->pengarang;
        $bukus->kategori = $request->kategori;
        $bukus->stock = $request->stock;
        $bukus->harga = $request->harga;
        $bukus->save();
        return redirect()->route('barang.index');
    }

    public function destroy($id){
        $bukus = Buku::find($id);
        $bukus->delete();
        return redirect()->route('barang.index');
    }
}
