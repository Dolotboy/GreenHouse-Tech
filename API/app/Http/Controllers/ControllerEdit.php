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
use Illuminate\Http\Response;

class ControllerEdit extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('searchPlant');
    }

    public function indexProblem(Request $request)
    {
        return view('searchProblem');
    }

    public function indexProfile(Request $request)
    {
        return view('searchProfile');
    }

    public function indexFavCondDate(Request $request)
    {
        return view('searchFavCondDate');
    }

    public function indexFavCondNb(Request $request)
    {
        return view('searchFavCondNb');
    }

    public function editPlant(Request $request, $idPlant)
    {
        $plant = Plant::find($idPlant);

        if (is_null($request->plantImg) || 
            is_null($request->plantName) || 
            is_null($request->plantType) || 
            is_null($request->plantFamily) || 
            is_null($request->plantSeason) || 
            is_null($request->plantGroundType) || 
            is_null($request->plantDaysConservation) || 
            is_null($request->plantDescription) || 
            is_null($request->plantDifficulty) || 
            is_null($request->plantBestNeighbor) ||
            is_null($idPlant))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        try
        {
            $plant = Plant::find($idPlant);    
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }
        
        if (is_null($plant)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, plant not found", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
            //return new Response(['message' => 'test'], 422);
        }

        return view('editPlant', ["plant" => $plant]);
    }

    public function editPlantSent(Request $request, $idPlant)
    {
        $plant = Plant::find($idPlant);
 
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
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idPlant], 200);
    }

    public function editProblem(Request $request, $idProblem)
    {
        $problem = Problem::find($idProblem);

        return view('editProblem', ["problem" => $problem]);
    }

    public function editProblemSent(Request $request, $idProblem)
    {
        if (is_null($request->problemName) || 
            is_null($request->problemType) || 
            is_null($request->problemSolution) ||
            is_null($idProblem))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        try
        {
            $problem = Problem::find($idProblem);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The problem doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        
        }
        
        if (is_null($problem))
        {
            return response()->json(['message'=> "Error, problem not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 404);
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
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProblem], 200);
    }

    public function editProfile(Request $request, $idProfile)
    {
        $profile = Profile::find($idProfile);

        return view('editProfile', ["profile" => $profile]);
    }

    public function editProfileSent(Request $request, $idProfile)
    {
        if (is_null($request->email) || 
            is_null($request->firstName) || 
            is_null($request->lastName) ||
            is_null($request->access))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        try
        {
            $profile = Profile::find($idProfile);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if (is_null($profile))
        {
            return response()->json(['message'=> "Error, profile not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
        }

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;

        try
        {
            $profile->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProfile], 200);
    }

    public function editFavCondDate(Request $request, $idCondition)
    {
        try
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        return view('editFavCondDate', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondDateSent(Request $request, $idCondition)
    {
        if (is_null($request->type) || 
            is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        $favorableCondition->type = $request->input("type");
        $favorableCondition->start = $request->input("start");
        $favorableCondition->end = $request->input("end");
        $favorableCondition->location = $request->input("location");

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }
    }

    public function editFavCondNb(Request $request, $idCondition)
    {
        try
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        return view('editFavCondNb', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondNbSent(Request $request,$idCondition)
    {
        if (is_null($request->type) || 
            is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        $favorableCondition->type = $request->input("type");
        $favorableCondition->min = $request->input("min");
        $favorableCondition->max = $request->input("max");
        $favorableCondition->unit = $request->input("unit");

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idCondition], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }
    }
} 
