<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $karyawan = User::where('role', 'karyawan')->paginate(6);
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }
    public function create()
    {
        return view('karyawan.form');
    }
// TODO need to change and adjusted

    

    public function store(Request $request)
    {
        
        $val_data = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);


        if ($val_data->fails()) {
            var_dump($val_data->fails());
            return redirect()->route('karyawan.create');
        }

        

        $save = User::Create([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => "Karyawan",

        ]);

        if ($save) {
            return redirect()->route('karyawan.index');
            
        } else {
            // var_dump($save);
            return redirect()->route('karyawan.create');
        }
    }

    public function edit($id){
        $karyawan = DB::table('users')->where('id', $id)->first();

        return view('karyawan.form', [
            'id' => $id,
            'user' => $karyawan
        ]);
    }

    public function update(Request $request){
        try{
        $val_data = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',            
        ]);

        $id = $request->get('id');

        if ($val_data->fails()) {
            return redirect()->route('karyawan.edit', $id)
                ->withErrors($val_data)
                ->withInput();
        }

        $user = User::findOrFail($id);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');


    $user->save();

    return redirect()->route('karyawan.index'); 

    }catch(\Exception $e){
        return redirect()->route('karyawan.edit', $id);
    }
    }
    

    public function destroy($id)
    {
        // get data buku sesuai id
        $karyawan = DB::table('users')->where('id', $id)->first();

        if ($karyawan) {
            
            DB::table('karyawan')->where('id', $id)->update([
                'deleted_at' => now()
            ]);

            return redirect()->route('karyawan.index')->with('success', 'Data User berhasil dihapus!');
        }

        return redirect()->route('karyawan.index')->with('error', 'Data User tidak ditemukan!');
    }
}
