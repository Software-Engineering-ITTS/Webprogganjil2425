namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Pastikan view ini ada
    }

    public function createEvent(Request $request)
    {
        // Logic untuk membuat event
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully!');
    }

    public function manageEvent($eventId)
    {
        // Logic untuk menampilkan detail event
        return view('admin.manage-event', ['eventId' => $eventId]);
    }

    public function confirmAttendance($registrationId)
    {
        // Logic untuk mengkonfirmasi kehadiran
        return back()->with('success', 'Attendance confirmed!');
    }
}
