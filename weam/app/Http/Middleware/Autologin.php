<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Autologin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dd('test fired on Autologin middleware');
        if (isset($_COOKIE['api_token_copy']) && !empty($_COOKIE['api_token_copy']) /*&& !Auth::check()*/) {
            try {

                $token = htmlspecialchars(htmlentities($_COOKIE['api_token_copy']));
                $token_parts = explode('.', $token);

                $token_header = $token_parts[1];
                $token_header_json = base64_decode($token_header);
                $token_header_array = json_decode($token_header_json, true);
                $token_id = $token_header_array['jti'];
                $user_id = DB::table('oauth_access_tokens')->where('id', $token_id)->get()->pluck('user_id');

                if (!$user_id->isEmpty()) {
                    Auth::loginUsingId($user_id, true);
                }
            } catch (\Exception $e) {
                return $next($request);
            }
        }
        return $next($request);
    }
}
