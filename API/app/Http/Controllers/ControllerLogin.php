<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;

class ControllerLogin extends Controller
{
    public function checkLogin(Request $request){
        try
        {
            $email = $request->email;
            $password = $request->password;
            $profile = Profile::where('email', $email)->take(1)->get()[0];
            $saltedPassword = $password . $profile->salt;
        
            if(Controller::comparePassword($saltedPassword, $profile->password) == 1){
                $token = Controller::generateToken();
                $profile->api_token = $token;
                $profile->save();
                return response()->json(['message'=> "Profile found", 'success' => true, 'status' => "Login succeeded", 'id' => $token], 200);
            }
            return response()->json(['message'=> "Incorrect password", 'success' => false, 'status' => "login Failed", 'id' => null], 404);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
    }

    public function checkToken(Request $request){
        try
        {
            $token = $request->token;
            if($token == null || $token == "")
                return response()->json(['message'=> "Please provide a valid token", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);

            $profile = Profile::where('api_token', $token)->take(1)->get()[0];
            return response()->json(['message'=> "Authentication succeeded", 'success' => true, 'status' => "Request succeeded", 'id' => $profile->idProfile], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
    }
}
