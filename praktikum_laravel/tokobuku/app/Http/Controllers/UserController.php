<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(6); 
        
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(Request $request)
    {
        

        $val_data = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);


        if ($val_data->fails()) {
            var_dump($val_data->fails());
            return redirect()->route('users.create');
        }

        $save = User::Create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        if ($save) {
            return redirect()->route('users.index');
            
        } else {
            // var_dump($save);
            return redirect()->route('users.create');
        }
    }

    public function edit($id){

        return view('users.form');
    }

    public function update(Request $request){

    }

}