<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
        ]);

        Event::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully!');
    }

    public function list() {
        $events = Event::all();
        return view('user.events', compact('events'));
    }
}
