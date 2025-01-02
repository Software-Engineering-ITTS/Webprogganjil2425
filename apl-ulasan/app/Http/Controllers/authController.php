<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' =>$request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }elseif(Auth::user()->role == 'user'){
                return redirect('user/home');
            }

        }else{
            return redirect('')->withErrors ('Email atau Password salah')->withInput();
        }
    }

    // Register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user->save()) {
            return redirect('/')->with('success', 'Akun berhasil dibuat');
        }
        return redirect('/register')->with('error', 'Email atau Password salah');
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
