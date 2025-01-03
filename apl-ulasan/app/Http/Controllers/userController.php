<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function user(){
        return view('user.home');
    }
    public function home()
    {
        $feedbacks = Feedback::where('email', Auth::user()->email)->get();
        return view('user.home', compact('feedbacks'));

        // Kirim data ke view user/home.blade.php
        return view('user.home', compact('feedbacks'));
    }
}
