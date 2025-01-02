<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalDokumenController extends Controller
{
    public function index()
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
                        'uploader' => optional($document->user)->name ?? 'Unknown User'
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
