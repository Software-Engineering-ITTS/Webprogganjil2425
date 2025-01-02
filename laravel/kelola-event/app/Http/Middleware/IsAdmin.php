namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('IsAdmin middleware triggered.');

        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        Log::info('Unauthorized access detected.');
        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
