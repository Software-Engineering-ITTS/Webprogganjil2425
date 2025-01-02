<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index():JsonResponse{
        $pendaftaran = Pendaftaran::all();

        return response()->json([
            'success' => true,
            'message' => 'Get All Pendaftaran',
            'data' => $pendaftaran
        ]);
    }
    public function show(Pendaftaran $pendaftaran):JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Get All Pendaftaran',
            'data' => $pendaftaran
        ]);
    }

    public function store(Request $request):JsonResponse{
        $validated = $request->validate([
            'jurusan_id' => ['required', 'exists:jurusans,id'],
        ]);
    
        $pendaftaran = Pendaftaran::create([
            ...$validated,
            'user_id' => auth()->id(),
            'tanggal_pendaftaran' => now(),
            'status_pendaftaran' => 'dalam proses'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Created Successfully',
            'data' => $pendaftaran
        ]);
    }    
    public function destroy(Pendaftaran $pendaftaran):JsonResponse{
        
        $pendaftaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Created Successfully',
            'data' => $pendaftaran
        ]);
    }

}
