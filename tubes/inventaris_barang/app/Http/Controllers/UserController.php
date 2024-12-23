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
    public function index()
    {
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
            'password' => 'nullable'
        ]);


        if ($val_data->fails()) {
            var_dump($val_data->fails());
            return redirect()->route('karyawan.create');
        }

        $password = $request->filled('password')
            ? $request->get('password')
            : $request->get('username');
        // USE USERNAME AS DEFAULT PASSWORD


        if (!$request->filled('password')) {
            session()->flash('info', 'The password field is empty. The username will be used as the default password.');
        }

        $save = User::create([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($password), // Hash the password
            'role' => 'Karyawan',
        ]);



        if ($save) {
            return redirect()->route('karyawan.index');
        } else {
            // var_dump($save);
            return redirect()->route('karyawan.create');
        }
    }

    public function edit($id)
    {
        $karyawan = DB::table('users')->where('id', $id)->first();

        return view('karyawan.form', [
            'id' => $id,
            'user' => $karyawan
        ]);
    }

    public function update(Request $request)
    {
        try {
            // Validate incoming request
            $val_data = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable',
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

            if ($request->filled('password')) {
                $user->password = bcrypt($request->get('password'));
            }
            $user->save();

            return redirect()->route('karyawan.index')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.edit', $id)
                ->with('error', 'An error occurred while updating the user.')
                ->withInput();
        }
    }



    public function destroy($id)
    {
        // get data buku sesuai id
        $karyawan = DB::table('users')->where('id', $id)->first();

        if ($karyawan) {

            DB::table('users')->where('id', $id)->update([
                'deleted_at' => now()
            ]);

            return redirect()->route('karyawan.index')->with('success', 'Data User berhasil dihapus!');
        }

        return redirect()->route('karyawan.index')->with('error', 'Data User tidak ditemukan!');
    }
}
