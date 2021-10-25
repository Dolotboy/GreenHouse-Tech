<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Exception;

class AuthenticationAdminMiddleware
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
        $email = "";
        $password = "";
        if(!isset($_SERVER['PHP_AUTH_USER']))
        {
            header('WWW-Authenticate: Basic realm="Test Authentication System"');
            exit;
        }
        else
        {
            $email = $_SERVER['PHP_AUTH_USER'];
            $password = $_SERVER['PHP_AUTH_PW'];
            if($this->authenticate($email, $password))
                return $next($request);
            return response()->json(['message'=> "Wrong email or password or you do not have the rights to access this.", 'success' => false, 'status' => "Request Failed", 'id' => null], 401);
        }
    }

    public function authenticate($email, $password)
    {
        try
        {
            $profile = Profile::where('email', $email)->take(1)->get()[0];
            $saltedPassword = $password . $profile->salt;
            if(password_verify($saltedPassword, $profile->password) == 1 && $profile->access == "admin")
                return true;
            return false;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}
