<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use App\Models\Token;

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
                $token = new Token();
                $token->token = Controller::generateToken();
                $token->valid_until = date('d-m-y', strtotime(' + 30 days'));
                $token->idProfile = $profile->idProfile;
                $token->save();
                return response()->json(['message'=> "Profile found", 'success' => true, 'status' => "Login succeeded", 'id' => $token->token], 200);
            }
            return response()->json(['message'=> "Incorrect password", 'success' => false, 'status' => "login Failed", 'id' => null], 404);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null, 'Exception' => $e], 404);
        }
    }

    public function checkToken(Request $request){
        try
        {
            $token = $request->token;
            if($token == null || $token == "")
                return response()->json(['message'=> "Please provide a valid token", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);

            $tokenObject = Token::where('token', $token)->take(1)->get()[0];
            $now = date('d-m-y h:i:s');
            if($now < $tokenObject->valid_until){
                $tokenObject->token = Controller::generateToken();
                $tokenObject->save();
                return response()->json(['message'=> "Authentication succeeded", 'success' => true, 'status' => "Request succeeded", 'id' => $tokenObject->token], 200);
            }
            return response()->json(['message'=> "Token expired", 'success' => false, 'status' => "Request failed", 'id' => null], 400);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
    }
}
