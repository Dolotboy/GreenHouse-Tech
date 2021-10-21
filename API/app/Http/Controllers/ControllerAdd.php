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


class ControllerAdd extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('newPlant');
    }

    public function addPlant(Request $request)
    {
        $plant = new Plant();

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

    public function indexProblem(Request $request)
    {
        return view('');
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
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $problem->idProblem], 200);
    }

    public function indexFavorite(Request $request)
    {
        return view('');
    }

    public function addFavorite($idPlant, $idProfile)
    {
        $favorite = new Favorite();

        if (is_null($idPlant) || 
            is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;

        try
        {
            $favorite->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
    }

    public function indexProfile(Request $request)
    {
        return view('');
    }

    public function addProfile(Request $request)
    {
        $profile = new Profile();
        $salt = Str::random(40);

        if (is_null($request->email) || 
            is_null($request->password) || 
            is_null($request->firstname) || 
            is_null($request->lastname) || 
            is_null($request->access))
        { 
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        else if (is_null($salt))
        { 
            return response()->json(['message'=> "A problem has been encountered while creating the salt", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $profile->email = $request->email;
        $saltedPassword = $request->password . $salt;

        $profile->password = Controller::hashPassword($saltedPassword);
        $profile->salt = $salt;

        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;

        try
        {
            $profile->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $profile->idProfile], 200);
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function addFavCondition(Request $request, $type)
    {
        if (is_null($request->type) || 
            is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) || 
            is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit))
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        if ($type == 1)
        {
            $favorableCondition = new FavorableConditionDate();

            $favorableCondition->type = $request->type;
            $favorableCondition->start = $request->start;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;
        }
        else if ($type == 2)
        {
            $favorableCondition = new FavorableConditionNb();

            $favorableCondition->type = $request->type;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }

        try
        {
            $favorableCondition->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        
        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
    } 
}
