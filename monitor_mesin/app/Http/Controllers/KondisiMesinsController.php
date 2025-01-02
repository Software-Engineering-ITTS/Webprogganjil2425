<?php

namespace App\Http\Controllers;

use App\Models\Kondisi_Mesins;
use App\Models\Mesins;
use Illuminate\Http\Request;

class KondisiMesinsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi_mesin = Kondisi_Mesins::all();
        $mesin = Mesins::all();
        return view('content.kondisi_mesin', compact('kondisi_mesin', 'mesin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mesin_id' => 'required',
            'temperature' => 'required|numeric|min:30|max:80',
            'notes' => 'required|max:100',
        ]);

        if ($request->temperature >= 30 && $request->temperature <= 50) {
            $data['status'] = "Normal";
        } else if ($request->temperature > 50 && $request->temperature <= 80) {
            $data['status'] = "Overheat";
        } else {
            $data['status'] = null;
        }

        $data['last_checked'] = now();

        $val_data = $request->all();
        Kondisi_Mesins::create($val_data);

        return redirect('/kondisi_mesin')->with('success', 'Kondisi Mesin Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'temperature' => 'required|numeric|min:30|max:80',
            'notes' => 'nullable|string',
        ]);

        $kondisi_mesin = Kondisi_Mesins::findOrFail($id);

        // Tentukan status berdasarkan temperature
        $temperature = $request->input('temperature');
        $status = ($temperature >= 30 && $temperature <= 50) ? 'normal' : 'overheat';

        $val_data = $request->all();
        $val_data['status'] = $status;
        $val_data['last_checked'] = now();

        $kondisi_mesin->update($val_data);

        return redirect('/kondisi_mesin')->with('success', 'Kondisi Mesin Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $book = Books::findOrFail($id); // Akan otomatis melempar 404 jika tidak ditemukan
        // $book->delete();

        // return response()->json(['success' => true]);
    }
}
