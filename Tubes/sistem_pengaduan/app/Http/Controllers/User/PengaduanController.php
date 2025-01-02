<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('user.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('complaints', 'public');
        }

        Complaint::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
