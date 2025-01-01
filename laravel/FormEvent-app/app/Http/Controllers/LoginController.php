<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected function redirectTo()
    {
        return '/dashboard';
    }
}

