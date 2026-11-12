<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Перевірка, чи це OPTIONS запит (для простоти)
        if ($request->isMethod('OPTIONS')) {
            return response()->json('', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, X-Requested-With, Authorization',
            ]);
        }

        // Проходження до наступного middleware у ланцюжку
        $response = $next($request);

        // Додавання заголовків CORS до відповіді
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, X-Requested-With, Authorization');

        return $response;
    }
}
