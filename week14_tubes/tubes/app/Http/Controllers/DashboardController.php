<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function inputKehadiran()
    {
        return view('presensi.create');
    }

    public function inputIzin()
    {
        return view('izin.create');
    }

    public function inputLembur()
    {
        return view('lembur.create');
    }
}