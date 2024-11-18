<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ActivityByUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(5); // keep online for 1 min
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            $array = $request->all();

            $string = json_encode($array);
            // if ($request->method() != "GET") {
                try {
                    if (Schema::hasTable('admin_user_log')) {
                        DB::table("admin_user_log")->insert([
                            'user_id' => Auth::user()->id,
                            'user_name' => Auth::user()->username,
                            'email' => Auth::user()->email,
                            'url' => $request->fullUrl(),
                            'user_type' => "Regualar",
                            "method" => $request->method(),
                            'user_ip' => $request->ip(),
                            "agent_info" => $request->header('User-Agent'),
                            "created_at" => Carbon::now(),
                            "payload" => $string,

                        ]);
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
            // }
        }
        return $next($request);
    }
}
