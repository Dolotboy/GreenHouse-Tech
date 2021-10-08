<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    public function checkLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        $profile = Profile::where('email', $email)->take(1)->get()[0];
        $saltedPassword = $password . $profile->salt;

        if(Controller::comparePassword($saltedPassword, $profile->password) == 1)
            return $profile->idProfile;
        return -1;
    }
}
