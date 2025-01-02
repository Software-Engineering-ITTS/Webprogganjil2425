<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardadminController extends Controller
{
    public function showdashboardadmin(){
        return view('dashboardadmin');
    }
}
