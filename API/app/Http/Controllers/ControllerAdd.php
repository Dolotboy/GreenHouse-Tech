<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;

class ControllerAdd extends Controller
{

    /* ------------------- PLANT ------------------- */

    public function indexPlant(Request $request)
    {
        return view('newPlant');        
    }

    public function addPlant(Request $request)
    {
        $plant = new Plant();
        //$request = json_decode(file_get_contents("php://input"));

        if (is_null($request->plantImg) || 
            is_null($request->plantName) || 
            is_null($request->plantType) || 
            is_null($request->plantFamily) || 
            is_null($request->plantSeason) || 
            is_null($request->plantGroundType) || 
            is_null($request->plantDaysConservation) || 
            is_null($request->plantDescription) || 
            is_null($request->plantDifficulty) || 
            is_null($request->plantBestNeighbor))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        
        $plant->plantImg = $request->plantImg;
        $plant->plantName = $request->plantName;
        $plant->plantType = $request->plantType;
        $plant->plantFamily = $request->plantFamily;
        $plant->plantSeason = $request->plantSeason;
        $plant->plantGroundType = $request->plantGroundType;
        $plant->plantDaysConservation = $request->plantDaysConservation;
        $plant->plantDescription = $request->plantDescription;
        $plant->plantDifficulty = $request->plantDifficulty;
        $plant->plantBestNeighbor = $request->plantBestNeighbor;
        
        try
        {
            $plant->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $plant->idPlant], 200);
    }

    /* ------------------- PROBLEM ------------------- */

    public function indexProblem(Request $request)
    {
        return view('newProblem');
    }

    public function addProblem(Request $request)
    {
        $problem = new Problem();

        if (is_null($request->problemName) || 
            is_null($request->problemType) || 
            is_null($request->problemSolution))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;
        
        try
        {
            $problem->save();
            Controller::incrementVersion();

            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $problem->idProblem], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
    }

/* ------------------- FAVORITE ------------------- */

    public function indexFavorite(Request $request)
    {
        return view('newFavourite');
    }

    public function addFavorite($idPlant, $idProfile)
    {
        $favorite = new Favorite();

        if (is_null($idPlant) || 
            is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }
        /**************************** FIND THE PLANT ****************************/
        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if(is_null($plant))
        {
            return response()->json(['message'=> "Error, the plant you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        /**************************** FIND THE PROFILE ****************************/
        try
        {
            $profile = Profile::Find($idProfile);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if(is_null($profile))
        {
            return response()->json(['message'=> "Error, the profile you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
        }

        /**************************** FIND THE ASSOCIATION ****************************/
        try
        {
            $findAssociation = Favorite::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblProfile_idProfile', '=', $idProfile)
            ->get();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "Error trying to find if this favorite already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }

        if (!$findAssociation->isEmpty())
        {
            return response()->json(['message'=> "Error, the favorite already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400); 
        }

        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;

        try
        {
            $favorite->save();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => "Plant: $idPlant / Profile: $idProfile"], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }
        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => "Plant: $idPlant / Profile: $idProfile"], 200);
    }

    public function addFavoriteToken($idPlant,$request, $idProfile)
    {
        $favorite = new Favorite();
        //return response()->json(['1' => $idPlant, '2' => $request, '3' => $idProfile]);

        if (is_null($idPlant) || 
            is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }
        /**************************** FIND THE PLANT ****************************/
        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if(is_null($plant))
        {
            return response()->json(['message'=> "Error, the plant you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        /**************************** FIND THE PROFILE ****************************/
        try
        {
            $profile = Profile::Find($idProfile);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if(is_null($profile))
        {
            return response()->json(['message'=> "Error, the profile you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
        }

        /**************************** FIND THE ASSOCIATION ****************************/
        try
        {
            $findAssociation = Favorite::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblProfile_idProfile', '=', $idProfile)
            ->get();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "Error trying to find if this favorite already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }

        if (!$findAssociation->isEmpty())
        {
            return response()->json(['message'=> "Error, the favorite already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400); 
        }

        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;

        try
        {
            $favorite->save();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => "Plant: $idPlant / Profile: $idProfile"], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }
        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => "Plant: $idPlant / Profile: $idProfile"], 200);
    }

/* ------------------- PROFILE ------------------- */

    public function indexProfile(Request $request)
    {
        return view('newProfile');
    }

    public function addProfile(Request $request)
    {
        $profile = new Profile();
        $salt = Str::random(40);

        if (is_null($request->email) || 
            is_null($request->password) || 
            is_null($request->firstName) || 
            is_null($request->lastName))
        { 
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        else if (is_null($salt))
        { 
            return response()->json(['message'=> "A problem has been encountered while creating the salt", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $profile->email = $request->email;
        $saltedPassword = $request->password . $salt;
        $token = Controller::generateToken();

        $profile->password = Controller::hashPassword($saltedPassword);
        $profile->salt = $salt;

        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = "user";
        $profile->emailConfirmed = false;

        try
        {
            $profile->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();
        Mail::to($profile->email)->send(new AccountCreated($profile)); /*->cc("exemple@gmail.com")*/
        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $profile->idProfile], 200);
    }

/* ------------------- FAVORITE CONDITION DATE ------------------- */

    public function indexFavCondDate(Request $request)
    {
        return view('newFavCondDate');
    }

    public function addFavConditionDate(Request $request)
    {
        $favorableCondition = new FavorableConditionDate();

        if (is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) ||
            is_null($request->type))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $favorableCondition->type = $request->type;
        $favorableCondition->start = $request->start;
        $favorableCondition->end = $request->end;
        $favorableCondition->location = $request->location;

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $favorableCondition->idRangeDate], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
    }
    
    public function indexFavCondNb(Request $request)
    {
        return view('newFavCondNb');
    }

    public function addFavConditionNb(Request $request)
    {
        $favorableCondition = new FavorableConditionNb();

        if (is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit) ||
            is_null($request->type))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $favorableCondition->type = $request->type;
        $favorableCondition->min = $request->min;
        $favorableCondition->max = $request->max;
        $favorableCondition->unit = $request->unit;

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $favorableCondition->idRangeNb], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
    }
}
