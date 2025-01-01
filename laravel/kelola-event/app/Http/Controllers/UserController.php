<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function dashboard()
    {
        $events = Event::all(); // Menampilkan semua event
        return view('user.dashboard', compact('events'));
    }

    public function register(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $registration = EventUser::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'nim' => $request->nim,
            'attendance_code' => Str::random(8), // Kode unik
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Registration successful! Your code: ' . $registration->attendance_code);
    }

    public function confirmAttendance(Request $request)
    {
        $registration = EventUser::where('attendance_code', $request->attendance_code)
                                  ->where('user_id', auth()->id())
                                  ->firstOrFail();

        $photoPath = $request->file('attendance_photo')->store('attendance_photos', 'public');
        $registration->update([
            'attendance_photo' => $photoPath,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Attendance confirmed!');
    }
}
