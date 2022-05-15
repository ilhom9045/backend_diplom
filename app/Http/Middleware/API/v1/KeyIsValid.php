<?php

namespace App\Http\Middleware\API\v1;

use Closure;
use Illuminate\Http\Request;

class KeyIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $API_KEY = "api_key";
        $KEY = "sadawdawdwadawdaw";
        if ($request->header($API_KEY) != $KEY) {
            $arr = [];
            $arr["status"] = false;
            $arr["message"] = "api_key das`t valide";
            return response($arr, 401);
        }
        return $next($request);
    }
}
