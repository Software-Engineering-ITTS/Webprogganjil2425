<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Returns;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function create()
    {
        return view('returns.create');
    }

    public function store(Request $request)
    {
        // Logic for storing return
    }
}
