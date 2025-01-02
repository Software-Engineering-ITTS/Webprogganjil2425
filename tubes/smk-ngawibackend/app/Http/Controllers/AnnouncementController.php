<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index():JsonResponse{
        $announcement = Announcement::all();
        return response()->json([
            'success' => true,
            'message' => 'Get All Announcement',
            'data' => $announcement
        ]);
    }
    public function show(Announcement $announcement):JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Announcement',
            'data' => $announcement
        ]);

    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
            'hasil_seleksi' => 'required|in:diterima,ditolak'
        ]);

        $announcement = Announcement::create([
            ...$valdata,
            'tanggal_pengunguman' => now()
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Announcement Created Successfully',
            'data' => $announcement
        ]);
    }

    public function update(Request $request,Announcement $announcement ):JsonResponse{
        
        $validated = $request->validate([
            'hasil_seleksi' => 'required|in:diterima,ditolak'
        ]);

        $announcement->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Announcement Updated Successfully',
            'data' => $announcement
        ]);
    }

    public function destroy():JsonResponse{
        return response()->json([

        ]);
    }
}
