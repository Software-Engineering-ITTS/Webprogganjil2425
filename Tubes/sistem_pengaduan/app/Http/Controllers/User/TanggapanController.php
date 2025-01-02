<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complaint;

class TanggapanController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $complaints = Complaint::where('user_id', $userId)->get();
        return view('user.tanggapan', compact('complaints'));
    }


    public function show($id)
    {
        $complaint = Complaint::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        return view('user.show', compact('complaint'));
    }

}
