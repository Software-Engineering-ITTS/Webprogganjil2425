<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index() {
        $registrations = Registration::with('event')->get();
        return view('admin.registrations', compact('registrations'));
    }

    public function register(Request $request) {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required',
            'nim' => 'required',
        ]);

        Registration::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'nim' => $request->nim,
        ]);

        return redirect()->route('events.list')->with('success', 'Registered successfully!');
    }

    public function verify(Request $request) {
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
        ]);

        $registration = Registration::find($request->registration_id);
        $registration->verification_code = Str::random(8); // Generate random code
        $registration->save();

        return redirect()->route('registrations.index')->with('success', 'Attendance verified!');
    }

    public function submitAttendance(Request $request) {
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'proof_photo' => 'required|image|max:2048',
        ]);

        $path = $request->file('proof_photo')->store('proof_photos', 'public');

        $registration = Registration::find($request->registration_id);
        $registration->proof_photo = $path;
        $registration->save();

        return redirect()->route('events.list')->with('success', 'Attendance submitted!');
    }
}
