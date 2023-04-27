<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect("/admin/login");
        }

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
}
