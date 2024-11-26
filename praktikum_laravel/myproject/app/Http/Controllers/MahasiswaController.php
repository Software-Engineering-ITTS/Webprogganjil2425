<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Validator;
use File;

class MahasiswaController extends Controller
{
    public function index(){
        return view('alldata');
    }
    public function store(Request $request){

        // $validator = Validator::make($req->all(),[
        //     'nama_customer'=>'required',
        //     'alamat'=>'required',
        //     'username'=>'required',
        //     'password'=>'required',

        // ]);
        // if($validator->fails()){
        //     return Response()->json($validator->errors()->toJson());
        // }

        // $name = $req->file('foto')->getClientOriginalName();
        // $path = $req->file('foto')->store('public/files');
        // $save = new File;
        // $save->name = $name;
        // $save->path = $path;

        // $save = customerModel::create([
        //     'nama_customer' =>$req->get('nama_customer'),
        //     'alamat'        =>$req->get('alamat'),
        //     'username'      =>$req->get('username'),
        //     'password'      =>Hash::Make($req->get('password')),
        //     'foto'          => $name,
        // ]);

        $val_data = Validator::make($request->all(), [
            'NIM' => 'required',
            'NAMA' => 'required',
            'PRODI' => 'required',
            'ALAMAT' => 'required',
            'id_fakultas' => 'required',
        ]);


        if($val_data->fails()){
            return redirect('/', [
                'pesan' => "Validasi gagal"
            ]);
        }
        // $request->validate([
            
        //     'fotoktm' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $mahasiswa = new Mahasiswa();
        // $mahasiswa->fill($val_data);
        $filename = '';

        

        // var_dump("Checking file");
        // if ($request->hasFile('fotoktm')) {
            $image = $request->file('fotoktm'); //->getClientOriginalName();
            
            // $image = $request->file('fotoktm');
            $filename = $image->getClientOriginalName();//time() . '.' . $image->getClientOriginalExtension();

            $path = $request->file('fotoktm')->store('public/files');
            $file = new File;
            $file->name = $filename;
            $file->path = $path;

            
            // $image->move(public_path('/public/files/'), $filename);
            // $filename = $request->getSchemeAndHttpHost() . '/public/files/' . $filename;
            // var_dump($filename . " File is present");
            // $mahasiswa->fotoktm = $filename;
        // }

        $save = mahasiswa::Create([
            'NIM' => $request->get('NIM'),
            'NAMA' => $request->get('NAMA'),
            'ALAMAT' => $request->get('ALAMAT'),
            'PRODI' => $request->get('PRODI'),
            'id_fakultas' => $request->get('id_fakultas'),
            'fotoktm' => $filename,
        ]);
        
        if($save){
            return redirect('/');
        }else{
            // return redirect('/',{{ 'pesan' => "Insert gagal" }});
        }

        // $mahasiswa->save();

        
        // Mahasiswa::create($val_data);


        
    }

    public function edit(){

    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }
}
