<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{
    public function index()
    {
        $aset = Aset::latest()->get();

        return view('app', compact('aset'));
    }
    public function store(Request $request)
    {
        $val_data = $request->validate([
            'kode_barang'=> 'required',
            'nama_aset' => 'required',
            'spesifikasi' => 'required',
            'gambar_aset' => 'required',
            'kategori_aset' => 'required',
            'departement' => 'required',
        ]);
        Aset::create($val_data);

        return redirect('/app');
    }
    public function edit(Aset $aset)
    {
        return view('asetupdate', [
            'data' => $aset
        ]);
    }

    public function update(Request $request, Aset $aset)
    {
        $val_data = $request->validate([
            'kode_barang' => 'required',
            'nama_aset' => 'required',
            'spesifikasi' => 'required',
            'gambar_aset' => 'nullable|image',
            'kategori_aset' => 'required',
            'departement' => 'required',
        ]);

        if ($request->hasFile('gambar_aset')) {
            
            if ($aset->gambar_aset) {
                $old_image_path = public_path('img/' . $aset->gambar_aset);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
    
            $new_image = $request->file('gambar_aset');
            $image_name = time() . '.' . $new_image->getClientOriginalExtension();
            $new_image->move(public_path('img'), $image_name);
            $val_data['gambar_aset'] = $image_name;
        }
    
        $aset->update($val_data);
        return redirect('/app')->with('success', 'Data aset berhasil diperbarui.');
    }
    
    public function destroy(Aset $aset)
    {
        Aset::destroy($aset->id);
        return redirect('/app');
    }
}
