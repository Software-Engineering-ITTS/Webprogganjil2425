<?php



namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    

public function create()
{
    
    $events = Event::whereDate('event_date', '>=', now())->get();
    
   
    return view('user/daftar', compact('events'));
}


    
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);
    
       
        $alreadyRegistered = Registration::where('event_id', $request->event_id)
                                         ->where('user_id', Auth::id())
                                         ->exists();
    
        if ($alreadyRegistered) {
            return redirect()->route('register.create')
                ->with('error', 'Anda sudah terdaftar di event ini.');
        }
    
     
        Registration::create([
            'event_id' => $request->event_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
    
        return redirect()->route('register.create')->with('success', 'Pendaftaran berhasil');
    }
    
    
}
