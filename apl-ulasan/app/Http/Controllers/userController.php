<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function user(){
        return view('user.home');
    }
    public function home()
    {
        // Ambil semua data feedback dari database
        $feedbacks = Feedback::all();

        // Kirim data ke view user/home.blade.php
        return view('user.home', compact('feedbacks'));
    }
}
