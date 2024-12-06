<?php

namespace App\Http\Controllers;

use App\Models\Stokbuku;    
use Illuminate\Http\Request;

class StokbukuController extends Controller
{
    public function store(Request $request)
    {
       
        $validateData = $request->validate([
            'judul' => 'required',  
            'penulis' => 'required',  
            'harga' => 'required', 
            'tanggal'=> 'required',   
            'cover' =>'required|image',
            'stock' =>'required',
        ]);

        
        Stokbuku::create($validateData);

        
        return redirect('/lihatbuku');
    }
    public function index()
    {
        $stokbuku = Stokbuku::all();

        return view('lihatbuku', compact('stokbuku'));
    }
    public function edit($id)
    {
        $buku = Stokbuku::findOrFail($id);
        return view('editbuku', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
            'cover' => 'nullable',
            'stock' => 'required',
        ]);

        $buku = Stokbuku::findOrFail($id);

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->storeAs(
                'covers',
                $request->file('cover')->getClientOriginalName(),
                'public'
            );
            $buku->cover = $coverPath;
        }

        $buku->judul = $validateData['judul'];
        $buku->penulis = $validateData['penulis'];
        $buku->harga = $validateData['harga'];
        $buku->tanggal = $validateData['tanggal'];
        $buku->stock = $validateData['stock'];
        $buku->save();

        return redirect('/lihatbuku');
    }

    public function destroy($id)
    {
        $buku = Stokbuku::findOrFail($id);
        $buku->delete();
        return redirect('/lihatbuku');
    }

}

