<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
        'namaevent' => 'required',
        'tanggalevent' => 'required',
        ]);
        // Simpan data ke database
        event::create($validatedData);

        // Redirect ke halaman sukses
        $events = event::all();

        return view('menuadmin', ['data' => $events]);
    }
    
    public function edit(event $event){
        return view('join',['data'=>$event]);
    }
}
