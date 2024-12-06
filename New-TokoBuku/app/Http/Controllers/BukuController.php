<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buatbuku(){
        return view('buatbuku');
    }
    public function beli(Request $request){
        
    }
}
