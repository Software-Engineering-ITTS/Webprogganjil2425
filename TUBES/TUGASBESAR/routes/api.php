<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/events', function() {
    $events = Event::all();  // Mengambil semua event
    return response()->json($events->map(function($event) {
        return [
            'title' => $event->name,
            'start' => $event->event_date . 'T' . $event->start_time,
            'end' => $event->event_date . 'T' . $event->end_time,
            'location' => $event->location,
            'category' => $event->category,
        ];
    }));
});