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

class ControllerEdit extends Controller
{
    public function indexPlant()
    {
        return view('');
    }

    public function editPlant(Request $request, $idPlant)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $plant = Plant::find($idPlant);

        $plant->imgPlant = $request->imgPlant;
        $plant->plantName = $request->plantName;
        $plant->plantType = $request->plantType;
        $plant->plantFamily = $request->plantFamily;
        $plant->plantSeason = $request->plantSeason;
        $plant->plantGroundType = $request->plantGroundType;
        $plant->plantDaysConservation = $request->plantDaysConservation;
        $plant->plantDescription = $request->plantDescription;
        $plant->plantState = $request->plantState;
        $plant->plantDifficulty = $request->plantDifficulty;
        $plant->plantLifeTime = $request->plantLifeTime;
        $plant->plantBestNeighbor = $request->plantBestNeighbor;

        $plant->save();

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

        $problem = Problem::find($idProblem);

        $problem->problemType = $request->problemType;
        $problem->importanceLvl = $request->importanceLvl;
        $problem->problemSolution = $request->problemSolution;

        $problem->save();

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

        $profile = Profile::find($idProfile);

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;

        $profile->save();

        Controller::incrementVersion();

        return ("Le profile#$profile->idProfile a été modifié");
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function editFavCondition($type, $idCondition)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);

            $favorableCondition->type = $request->type;
            $favorableCondition->start = $request->start;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;
        }
        else if ($type == 2)
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);

            $favorableCondition->type = $request->type;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }
        
        $favorableCondition->save();

        Controller::incrementVersion();

        return ("La condition favorable a été sauvegardé");
    }
}
