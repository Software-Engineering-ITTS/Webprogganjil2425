<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class DetailController extends Controller
{   public function show($id)
    {
        $complaint = Complaint::with('user')->findOrFail($id);
        return view('admin.detail', compact('complaint'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:new,proses,selesai,ditolak']);
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => $request->status]);
        return redirect()->route('admin.dashboard', $id)->with('success', 'Update status berhasil.');
    }
}
