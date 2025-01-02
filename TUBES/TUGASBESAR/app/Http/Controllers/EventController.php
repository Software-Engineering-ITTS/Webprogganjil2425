<?php


namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    
public function index()
{
    
    $events = Event::where('user_id', Auth::id())->get(); 

   
    return view('admin/dashboard', compact('events'));
}

    
    public function create()
    {
        return view('admin/create_events');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'location' => 'required|string',
            'category' => 'required|string',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        
        Event::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'category' => $request->category,
            'max_participants' => $request->max_participants,
            'price' => $request->price,
            'user_id' => Auth::id(), 
        ]);

        return redirect('/admin/dashboard')->with('success', 'Event berhasil dibuat');
    }

    
    public function showParticipants($eventId)
{
    $event = Event::with('participants')->findOrFail($eventId);
    return view('admin.view_participants', compact('event'));
}



    
public function edit($eventId)
{
    $event = Event::findOrFail($eventId);
    return view('admin/edit_event', compact('event'));
}


public function update(Request $request, $eventId)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'event_date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        'location' => 'required|string',
        'category' => 'required|string',
        'max_participants' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0', 
    ]);

    
    $event = Event::findOrFail($eventId);

    
    $event->update([
        'name' => $request->name,
        'event_date' => $request->event_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'location' => $request->location,
        'category' => $request->category,
        'max_participants' => $request->max_participants,
        'price' => $request->price, 
    ]);

    
    return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui');
}


public function showEvents()
{
    
    $events = Event::all();

    
    return view('user.daftar', compact('events'));
}


public function destroy($eventId)
{
    $event = Event::findOrFail($eventId);

    
    if ($event->user_id !== Auth::id()) {
        return redirect('/admin/dashboard')->with('error', 'Anda tidak memiliki izin untuk menghapus event ini.');
    }

    $event->delete();

    return redirect('/admin/dashboard')->with('success', 'Event berhasil dihapus');
}

public function showCalendar()
{
    $events = Event::where('user_id', Auth::id())->get();

    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalender Event</title>
        
        <!-- FullCalendar CSS -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
        
        <style>
            /* FullCalendar customizations to make the calendar dark using Tailwind utilities */
            .fc-toolbar {
                @apply bg-gray-800 text-white border-b border-gray-700;
            }
            .fc-button {
                @apply bg-gray-700 text-white border-none;
            }
            .fc-button:hover {
                @apply bg-gray-600;
            }
            .fc-daygrid-day {
                @apply bg-gray-800 border border-gray-700;
            }
            .fc-daygrid-day.fc-day-today {
                @apply bg-gray-700;
            }
            .fc-event {
                @apply bg-blue-600 text-white border-none;
            }
            .fc-event:hover {
                @apply bg-blue-500;
            }
        </style>
    </head>
    <body class="bg-gray-900 text-white flex justify-center items-center min-h-screen p-4">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl font-extrabold text-center mb-6">Kalender Event</h1>
            <div id="calendar" class="rounded-lg shadow-xl bg-gray-800 p-4"></div>
        </div>

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var calendarEl = document.getElementById("calendar");

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay"
                    },
                    events: ' . $this->getEventsJson($events) . '
                });

                calendar.render();
            });
        </script>
    </body>
    </html>';

    return response($html);
}


private function getEventsJson($events)
{
    $formattedEvents = [];
    foreach ($events as $event) {
        $formattedEvents[] = [
            'title' => $event->name,
            'start' => $event->event_date . 'T' . $event->start_time,
            'end'   => $event->event_date . 'T' . $event->end_time,
            'url'   => route('event.edit', $event->id)
        ];
    }
    return json_encode($formattedEvents);
}


}

