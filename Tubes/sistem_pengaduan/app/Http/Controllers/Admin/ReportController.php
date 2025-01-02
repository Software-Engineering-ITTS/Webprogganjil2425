<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;

class ReportController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('user')->whereIn('status', ['selesai','ditolak'])->get();
        return view('admin.index', compact('complaints'));
    }
}
