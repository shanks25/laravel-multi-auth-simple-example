<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $error = 0 ;
        if ($request->ajax()) {
            if ($request->bearerToken() != config('services.NODE_TOKEN')) {
                return response()->json(['msg'=>'Invalid Auth Header'], 403);
            }

            return $next($request);
        }
    

        if (!Auth::guard('admin')->user()) {
            $error = 1 ;
            return redirect()->route('admin.login');
        }



        return $next($request);
    }
}
