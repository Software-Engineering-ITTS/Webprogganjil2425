<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index() {
        $users = User::all();

        return view("admin.dataanggota", compact("users"));
    }
}
