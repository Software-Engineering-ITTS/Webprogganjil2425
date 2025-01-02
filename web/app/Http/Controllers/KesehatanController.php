<?php

namespace App\Http\Controllers;

use App\Models\kesehatan;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function index(Request $request)
    {
        $kesehatan = kesehatan::where('id_pegawai', $request->id)->first();

        return view('kesehatan', compact('kesehatan'));
    }
    public function store(Request $request)
    {
        $val_data = $request->validate([
            "id_pegawai" => "required",
            "BeratBadan" => "required",
            "TinggiBadan" => "required",
            'TekananDarah' => "required",
            'SuhuBadan' => "required",
            'keluhan' => "required",
        ]);
        kesehatan::create($val_data);

        return redirect('/');
    }
    public function edit(kesehatan $kesehatan)
    {
        return view('kesehatan', [
            'data' => $kesehatan
        ]);
    }
}
