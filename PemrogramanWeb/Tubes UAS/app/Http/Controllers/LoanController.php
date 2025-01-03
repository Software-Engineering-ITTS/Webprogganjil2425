<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function create()
    {
        return view('loans.create');
    }

    public function store(Request $request)
    {
        // Logic for storing loan
    }
}
