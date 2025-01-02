<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $pengguna = pengguna::where('username',$request->username)->first();
    if($pengguna && $pengguna->password == $request->password){
    return redirect('/menu');
    }else{
        return back();
    }
}
}