<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function user(){
       // Ambil semua data feedback dari database
       $feedbacks = Feedback::all();

       $totalFeedback = $feedbacks->count();

       // Hitung rata-rata rating
       $averageRating = $feedbacks->avg('rating');

       // Hitung feedback baru hari ini
       $newToday = Feedback::whereDate('created_at', Carbon::today())->count();

       // Kirim data ke view admin/index.blade.php
       return view('admin.ulasan', compact('feedbacks', 'totalFeedback', 'averageRating', 'newToday'));
    }
}
