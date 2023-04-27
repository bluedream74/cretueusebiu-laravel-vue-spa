<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class BasicAuthMiddleware
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
        $url = $request->url();

        if (str_contains($url, '/admin')) {
            $username = $request->getUser();
            $password = $request->getPassword();

            if ($username == 'dd' && $password == 'test') {
                return $next($request);
            }

            abort(401, "Enter username and password.", [
                header('WWW-Authenticate: Basic realm="Sample Private Page"'),
                header('Content-Type: text/plain; charset=utf-8')
            ]);
        }

        return $next($request);
    }
}
