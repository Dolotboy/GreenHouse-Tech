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

        $plant = Plant::find($idPlant);

        $plant->plantImg = $request->plantImg;
        $plant->plantName = $request->plantName;
        $plantType = $request->plantType;
        $plantFamily = $request->plantFamily;
        $plant->plantSeason = $request->plantSeason;
        $plant->plantGroundType = $request->plantGroundType;
        $plant->plantDaysConservation = $request->plantDaysConservation;
        $plant->plantDescription = $request->plantDescription;
        $plant->plantDifficulty = $request->plantDifficulty;
        $plant->plantBestNeighbor = $request->plantBestNeighbor;

        $plant->save();

        return ("La plante#$plant->idPlant a été modifié");
    }

    public function indexProblem()
    {
        return view('');
    }

    public function editProblem(Request $request, $idProblem)
    {

        $problem = Problem::find($idProblem);

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;

        $problem->save();

        return ("Le problème#$problem->idProblem a été modifié");
    }

    public function indexProfile()
    {
        return view('');
    }

    public function editProfile(Request $request, $idProfile)
    {

        $profile = Profile::find($idProfile);

        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;

        $profile->save();

        return ("Le profile#$profile->idProfile a été modifié");
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function editFavCondition($type, $idCondition)
    {

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

        return ("La condition favorable a été sauvegardé");
    }
}
