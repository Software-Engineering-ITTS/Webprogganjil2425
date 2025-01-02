<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;

class AdminController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('user')->whereIn('status', ['new', 'proses'])->get();
        return view('admin.dashboard', compact('complaints'));
    }
}
