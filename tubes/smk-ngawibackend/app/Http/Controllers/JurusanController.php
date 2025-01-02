<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class JurusanController extends Controller
{
    public function index():JsonResponse{
        $jurusan = Jurusan::all();
        return response()->json([
            'success' => true,
            'message' => 'Get All Jurusan',
            'data' => $jurusan
        ]);
    }

    public function show(Jurusan $jurusan):JsonResponse{
        return response()->json([
            'success' => 'Get Detail Jurusan',
            'data' => $jurusan
        ]);
    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'nama_jurusan' => 'required',
            'deskripsi_jurusan' => 'required'
        ]);

        $valdata['slug_jurusan'] = Str::slug($valdata['nama_jurusan']);
        $jurusan = Jurusan::create($valdata);

        return response()->json([
            'success' => true,
            'message' => 'Jurusan Created Successfully',
            'data' => $jurusan
        ]);

    }

    public function update(Request $request, Jurusan $jurusan):JsonResponse{
        
        $valdata = $request->validate([
            'nama_jurusan' => 'sometimes|unique:jurusans,nama_jurusan,' . $jurusan->id,
            'deskripsi_jurusan' => 'sometimes|required'
        ]);
        
        if (isset($valdata['nama_jurusan'])) {
            $valdata['slug_jurusan'] = Str::slug($valdata['nama_jurusan']);
        }
            
            
        $jurusan->update($valdata);

        return response()->json([
            'success' => true,
            'message' => 'Jurusan Updated Successfully',
            'data' => $jurusan->toArray()
        ]);
    }

    public function destroy(Jurusan $jurusan):JsonResponse{
        $jurusan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Jurusan Deleted Successfully',
            'data' => $jurusan
        ]);
    }
}
