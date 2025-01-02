<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardStaffController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('DashboardAdmin.dashboardstaff', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'File_path' => 'required|file|max:10240' // Max 10MB
        ]);

        try {
            $file = $request->file('File_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            Document::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'user_id' => Auth::id(),
                'status' => 'Pending'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil diunggah'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengunggah dokumen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            
            // Delete file from storage
            if (Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
            
            // Delete document record
            $document->delete();

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus dokumen'
            ], 500);
        }
    }

    public function approvalIndex()
    {
        $pendingDocuments = Document::where('status', 'Pending')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('DashboardAdmin.approval-dokumen', compact('pendingDocuments'));
    }

    public function getPendingDocuments()
    {
        try {
            $documents = Document::where('status', 'Pending')
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($document) {
                    return [
                        'id' => $document->id,
                        'title' => $document->title,
                        'fileName' => basename($document->file_path),
                        'description' => $document->description,
                        'uploadDate' => $document->created_at->format('d/m/Y'),
                        'status' => $document->status,
                        'uploader' => $document->user->name
                    ];
                });

            return response()->json([
                'success' => true,
                'documents' => $documents
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat dokumen'
            ], 500);
        }
    }

    public function approve($id)
    {
        try {
            $document = Document::findOrFail($id);
            $document->update([
                'status' => 'Approved',
                'approved_by' => Auth::id(),
                'approved_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil disetujui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyetujui dokumen'
            ], 500);
        }
    }

    public function reject($id)
    {
        try {
            $document = Document::findOrFail($id);
            $document->update([
                'status' => 'Rejected',
                'rejected_by' => Auth::id(),
                'rejected_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil ditolak'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menolak dokumen'
            ], 500);
        }
    }
}
