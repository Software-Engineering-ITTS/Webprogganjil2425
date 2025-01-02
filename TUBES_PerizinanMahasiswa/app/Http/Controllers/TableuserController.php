<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tableuser;


class TableuserController extends Controller
{
    //
    public function login(Request $request)
    {
        if (empty($request->username) || empty($request->password)) {
            return redirect('/')->with('error', 'Username and password are required');
        }
        // return "string";
        $val_data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login = tableuser::where($val_data)->first();
        if ($login) {
            session(['idUser' => $login->idUser, 'level' => $login->level]);
        }
        else {
            return redirect('/')->with('error', 'Username atau password salah');
        }
        return redirect('/home');
    }
    public function logout()
    {
        session()->flush();
        return redirect('/home');
    }
    public function aksiregister(Request $request)
    {
        if (empty($request->username) || empty($request->password)) {
            return redirect('/register')->with('error', 'Username and password are required');
        }

        $val_data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $register = tableuser::where($val_data)->first();
        if ($register) {
            return redirect('/register')->with('error', 'Username sudah digunakan');
        } else {
            $data = [
                'username' => $val_data['username'],
                'password' => $val_data['password'],
                'level' => '2',
            ];
            // print_r($data);

            tableuser::create($data);
            return redirect('/');
        }
    }
    public function edit()
    {
        // return view('edit', [
        //     'buku' => $buku
        // ]);
    }
    public function update()
    {
        // return "string";
        // $val_data = $request->validate([
        //     'JudulBuku' => 'required',
        //     'NamaPengarang' => 'required',
        //     'Harga' => 'required|numeric',
        //     'Img' => 'nullable',
        //     ]);

        // $buku->update($val_data);

        // return redirect('/');
    }
}
