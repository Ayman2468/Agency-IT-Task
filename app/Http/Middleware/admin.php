<?php

namespace App\Http\Middleware;

use App\Traits\NotAllowed;
use Closure;
use Illuminate\Http\Request;

class admin
{
    use NotAllowed;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var \App\Models\User $user **/
        $user = auth('sanctum')->user();
        if ($user->tokenCan('admin')) {
            return $next($request);
        } else {
            return $this->NotAllowed();
        }
    }
}
