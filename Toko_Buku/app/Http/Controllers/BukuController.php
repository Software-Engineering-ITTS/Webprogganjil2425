<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //

    public function index()
    {
        $bukus = Buku::all();
        return view('getbuku', compact('bukus'));
    }
    public function beliBuku(Request $request, $id)
    {
        $buku = Buku::find($id);
        if ($buku && $buku->stock > 0) {
            $buku->stock -= 1; // mengurangi stok
            $buku->save();

            return redirect('/sukses');
        }
        return back()->withErrors(['msg' => 'Stok habis!']);
        //  dd($request);
    }
}
