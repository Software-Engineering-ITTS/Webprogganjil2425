<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $karyawan = User::where('role', 'karyawan')->paginate(6);
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }
    
}
