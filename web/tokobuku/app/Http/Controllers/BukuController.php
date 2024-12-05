<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    public function store (Request $request) {

        $request->validate([
            'judul'
        ]);
    }

}
