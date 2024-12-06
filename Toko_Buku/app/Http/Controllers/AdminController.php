<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        if($request->username == 'admin' && $request->password == 'admin'){
            session(['admin_logged_in' => true]);
            return redirect('/admin/dashboard');
        }
        return back()->withErrors(['msg' => 'Username atau Password salah!']);
    }

    public function logout(){
        session()->forget('admin_logged_in');
        return redirect('/');
    }

    public function dashboard(){
        if(!session('admin_logged_in')){
            return redirect('/admin/login');
        }

        $bukus = Buku::all();
        return view('getbuku', compact('bukus'));
    }
    public function addBook(Request $request){
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'img' => 'required|url',
        ]);

        Buku::create($request->all());
        return redirect('/admin/dashboard')->with('success', 'Buku Berhasil Ditambah');
    }
}
