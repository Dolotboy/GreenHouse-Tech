<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use App\Models\Token;
use \DateTime;
use \DateInterval;

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
                $now = new DateTime(date("y-m-d"));              
                $token->valid_until = $now->add(new DateInterval('P30D'));
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
            $now = new DateTime(date("y-m-d"));
            $valid_until = $tokenObject->valid_until;
            //return response()->json(['now' => $now, 'valid_until' => $valid_until, 'bool' => $now < new DateTime($valid_until)]);
            if($now <= new DateTime($valid_until)){
                $tokenObject->token = Controller::generateToken();
                $tokenObject->save();
                return response()->json(['message'=> "Authentication succeeded", 'success' => true, 'status' => "Request succeeded", 'id' => $tokenObject->token], 200);
            }
            return response()->json(['message'=> "Token expired", 'success' => false, 'status' => "Request failed", 'id' => null], 400);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null, 'Exception' => $e], 404);
        }
    }

    public function confirmEmail(Request $request)
    {
        $response = $this->checkToken($request);
        $decodedResponse = json_decode($response);

        if ($decodedResponse->success)
        {
            // Change email to confirmed
        }
    }
}
