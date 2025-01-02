<?php

namespace App\Http\Controllers;

use App\Models\EventUser;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('admin.dashboard', compact('events'));
    }

    public function createEvent(Request $request) {
        $event = Event::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully!');
    }

    public function viewParticipants($eventId) {
        $participants = EventUser::where('event_id', $eventId)->with('user')->get();
        return view('admin.participants', compact('participants'));
    }

    public function verifyAttendance($id) {
        $attendance = EventUser::find($id);
        return view('admin.verify', compact('attendance'));
    }

    
}
