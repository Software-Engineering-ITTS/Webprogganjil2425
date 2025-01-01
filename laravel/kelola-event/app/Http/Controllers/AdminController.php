<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventUser;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::all(); // Menampilkan semua event
        return view('admin.dashboard', compact('events'));
    }

    public function createEvent(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully!');
    }

    public function manageEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $registrations = EventUser::where('event_id', $event->id)->with('user')->get();
        return view('admin.manage-event', compact('event', 'registrations'));
    }

    public function confirmAttendance($registrationId)
    {
        $registration = EventUser::findOrFail($registrationId);
        $registration->update(['is_confirmed' => true]);
        return redirect()->back()->with('success', 'Attendance confirmed!');
    }
}
