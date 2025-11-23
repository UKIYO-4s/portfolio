<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleEmailNotifications
{
    /**
     * Handle an incoming request.
     *
     * Rate limiting: 3 attempts per 5 minutes per email address
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->input('email');

        if (!$email) {
            return $next($request);
        }

        $key = 'checkout:' . sha1($email);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'message' => '処理回数が上限に達しました。しばらく経ってから再度お試しください。',
                'retry_after' => $seconds
            ], 429);
        }

        RateLimiter::hit($key, 300); // 5 minutes = 300 seconds

        return $next($request);
    }
}
