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
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }

        if(Controller::comparePassword($saltedPassword, $profile->password) == 1)
            return response()->json(['message'=> "Profile found", 'success' => true, 'status' => "Login succeeded", 'id' => $profile->idProfile], 200);
        return response()->json(['message'=> "Incorrect password", 'success' => false, 'status' => "login Failed", 'id' => null], 404);
    }
}
