namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login'); // Redirect ke halaman login jika tidak login
        }
    }

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect($this->redirectTo($request));
        }

        return $next($request);
    }
}
