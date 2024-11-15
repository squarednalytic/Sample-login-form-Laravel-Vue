namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuditTrail;

class AuditTrailMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (auth()->check()) {
            AuditTrail::create([
                'user_id' => auth()->id(),
                'username' => auth()->user()->name,
                'menu_name' => $request->path(),
                'method' => $request->method(),
                'activity_time' => now(),
                'data_changes' => json_encode($request->all()),
            ]);
        }

        return $response;
    }
}
