<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;

class feedbackController extends Controller
{
    public function index() {
        // Ambil semua data feedback dari database
        $feedbacks = Feedback::all();

        // Kirim data ke view
        return view('user.feedback', compact('feedbacks'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
    ]);

    // Jika ada file gambar yang di-upload, simpan ke storage
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('feedback_images', 'public');
    }

    // Simpan data ke database
    Feedback::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'rating' => $validatedData['rating'],
        'comment' => $validatedData['comment'],
        'image' => $imagePath, // Path gambar yang disimpan
    ]);

    // Redirect kembali ke halaman dengan pesan sukses
    return redirect('/feedback')->with('success', 'Feedback berhasil dikirim!');
}}
