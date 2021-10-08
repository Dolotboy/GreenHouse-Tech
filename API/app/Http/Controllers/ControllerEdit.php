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
        $request =  json_decode(file_get_contents('php://input'));

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
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $plant = Plant::find($idPlant);    
        }
        catch (Exception)
        {
            return "The plant doesn't exist or there is not connection with the database";
        }
        
        if (is_null($plant)) // Mostly when it doesn't exist
        {
            return new Response("The plant doesn't exist", 404);
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
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("La plante#$plant->idPlant a été modifié");
    }

    public function indexProblem()
    {
        return view('');
    }

    public function editProblem(Request $request, $idProblem)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if (is_null($request->problemName) || 
            is_null($request->problemType) || 
            is_null($request->problemSolution) ||
            is_null($idProblem))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $problem = Problem::find($idProblem);
        }
        catch (Exception)
        {
            return "The problem doesn't exist or there is not connection with the database";
        
        }
        
        if (is_null($problem))
        {
            return new Response("The problem doesn't exist", 404);
        }

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;

        try
        {
            $problem->save();
        }
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("Le problème#$problem->idProblem a été modifié");
    }

    public function indexProfile()
    {
        return view('');
    }

    public function editProfile(Request $request, $idProfile)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if (is_null($request->email) || 
            is_null($request->firstName) || 
            is_null($request->lastName) ||
            is_null($request->access))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $profile = Profile::find($idProfile);
        }
        catch (Exception)
        {
            return "The profile doesn't exist or there is not connection with the database";
        }

        if (is_null($profile))
        {
            return new Response("The profile doesn't exist", 404);
        }

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;

        try
        {
            $profile->save();
        }
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("Le profile#$profile->idProfile a été modifié");
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function editFavCondition(Request $request, $type, $idCondition)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if (is_null($request->type) || 
            is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) || 
            is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        if ($type == 1)
        {
            try
            {
                $favorableCondition = FavorableConditionDate::find($idCondition);
            }
            catch (Exception)
            {
                $json = "The condition doesn't exist or there is not connection with the database";
            }

            if (is_null($favorableCondition))
            {
                return new Response("The condition doesn't exist", 404);
            }

            $favorableCondition->type = $request->type;
            $favorableCondition->start = $request->start;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;
        }
        else if ($type == 2)
        {
            try
            {
                $favorableCondition = FavorableConditionNb::find($idCondition);
            }
            catch (Exception)
            {
                $json = "The condition doesn't exist or there is not connection with the database";
            }

            if (is_null($favorableCondition))
            {
                return new Response("The condition doesn't exist", 404);
            }

            $favorableCondition->type = $request->type;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }
        
        try
        {
            $favorableCondition->save();
        }
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("La condition favorable a été sauvegardé");
    }
}
