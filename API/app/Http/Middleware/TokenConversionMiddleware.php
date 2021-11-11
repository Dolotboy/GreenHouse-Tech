<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Exception;

class TokenConversionMiddleware
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
        //return response()->json(['token' => $request->route('token')]);
        $idProfile = $this::getProfileId($request->route('token'));
        if($idProfile != null){
            $request->route()->setParameter('idProfile', $idProfile);
            //return response()->json(json_encode($request->route()));
            return $next($request);
        }
        else 
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Invalid token", 'id' => null], 404);
    }

    public function getProfileId($token){
        try{
            return Profile::where('api_token', $token)->take(1)->get()[0]->idProfile;
        }
        catch(Exception $e){
            return null;
        }
    }
}
