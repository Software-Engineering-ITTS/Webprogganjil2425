<?php

namespace App\Http\Controllers;

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Models\schedule;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function show()
    {
        $schedules = schedule::all();
        return view('schedule', compact('schedules'));
    }

    public function scheduledoctor(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'hari' => 'required|date',
            'waktu' => 'required',
            'spesialis' => 'required|string',
        ]);
        Schedule::create($validatedData);

        // Redirect ke halaman GET dengan pesan sukses
        return redirect()->route('schedule')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function update(Request $request, $id){
        $schedule = schedule::find($id);
        if(!$schedule){
            return redirect()->route('schedule')->with('error', 'Schedule Not Found');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'hari' => 'required|date',
            'waktu' => 'required',
            'spesialis' => 'required|string',
        ]);
        $schedule->update($validatedData);
        return redirect()->route('schedule')->with('success', 'Jadwal Berhasil Diupdate');
    }

    public function destroy($id){
        // $schedule = schedule::findOrFail($id);
        // Log::info('Schedule ID: ' . $schedule->id);
        $schedule = schedule::find($id);
        if(!$schedule){
            return redirect()->route('schedule')->with('error', 'Schedule Not Found');
        }
        $schedule->delete();
        return redirect()->route('schedule')->with('success', 'Jadwal Berhasil Dihapus!');
    }
}

    //menggunakan if is method karena satu halaman dijadikan 2
    //ini untuk post nya
//     public function scheduledoctor(Request $request)
//     {

//         if ($request->isMethod('post')) {

//             $request->validate([
//                 'nama' => 'required',
//                 'hari' => 'required',
//                 'waktu' => 'required',
//                 'spesialis' => 'required',
//             ]);
//             dd($request->all());



//             schedule::create([
//                 'nama' => $request->nama,
//                 'hari' => $request->hari,
//                 'waktu' => $request->waktu,
//                 'spesialis' => $request->spesialis,
//             ]);

//             dd($schedule);
//             $schedules = schedule::all();

//             $html = '';
//             foreach ($schedules as $schedule) {
//                 $html .= "<tr>
//                         <td>{$schedule->iddokter}</td>
//                         <td>{$schedule->nama}</td>
//                         <td>{$schedule->hari}</td>
//                         <td>{$schedule->waktu}</td>
//                         <td>{$schedule->spesialis}</td>
//                     </tr>";
//             }

//             return response()->json(['success' => 'Jadwal Berhasil Ditambahkan', 'schedules' => $html]);
//         }
//         //untuk get
//         $schedules = schedule::all();
//         return view('schedule', compact('schedules'));
//     }
// }
