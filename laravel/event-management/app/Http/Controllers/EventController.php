<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Auth;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function ListEvent(){
        $user = Auth::user();
        $events = $user->events()->get();
        // dd($events);
        return view('user.dashboard', compact('events'));
    }
    

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date_time' => 'required|date',
            'end_date_time' => 'required|date|after:start_date_time',
            'location' => 'required'
        ]);

        $event = Event::create($request->all());

       
        return redirect()->route('dashboard.admin')->with('success', 'Event created successfully!');
    }

    public function list() {
        $events = Event::all();
        return view('user.events', compact('events'));
    }
}
