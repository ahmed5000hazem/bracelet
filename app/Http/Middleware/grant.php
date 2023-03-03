<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class grant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $namespace, $area): Response
    {
        $action = $area? $namespace . '-'. $area : $namespace;
        if (auth()->user()->isAbleTo($action)){
            return $next($request);
        }
        abort(403);
    }
}
