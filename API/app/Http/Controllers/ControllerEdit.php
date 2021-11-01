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
    public function indexPlant()
    {
        return view('');
    }

    public function editPlant(Request $request, $idPlant)
    {

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

    public function indexProblem()
    {
        return view('');
    }

    public function editProblem(Request $request, $idProblem)
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

    public function indexProfile()
    {
        return view('');
    }

    public function editProfile(Request $request, $idProfile)
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

    public function indexFavCondition()
    {
        return view('');
    }

    public function editFavCondition(Request $request, $type, $idCondition)
    {

        if (is_null($request->type) || 
            is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) || 
            is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if ($type == 1)
        {
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

            $favorableCondition->type = $request->type;
            $favorableCondition->start = $request->start;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;  

            try
            {
                $favorableCondition->save();
            }
            catch (Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
            }
        }
        else if ($type == 2)
        {
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

            $favorableCondition->type = $request->type;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;  

            try
            {
                $favorableCondition->save();
            }
            catch (Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
            }
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idCondition], 200);
    }

    public function addAdmin(Request $request)
    {
        $data = Profile::find($request);

        $profile->access = "admin";

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
} 
