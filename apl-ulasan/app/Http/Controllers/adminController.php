<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function user(){
       // Ambil semua data feedback dari database
       $feedbacks = Feedback::all();

       // Kirim data ke view user/home.blade.php
       return view('admin.ulasan', compact('feedbacks'));
    }
}
