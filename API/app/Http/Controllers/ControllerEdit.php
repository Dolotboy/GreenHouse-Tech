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
    public function indexPlant(Request $request)
    {
        return view('editSearchPlant');
        /* value="{{ $produit["namePlant"] }}" */
    }

    public function indexProblem(Request $request)
    {
        return view('editSearchProblem');
    }

    public function indexProfile(Request $request)
    {
        return view('editSearchProfile');
    }

    public function indexFavCondition(Request $request)
    {
        return view('editSearchFavCondition');
    }

    public function editPlant(Request $request, $idPlant)
    {
        $plant = Plant::find($idPlant);

        return view('editPlant', ["plant" => $plant]);
    }

    public function editPlantTest(Request $request, $idPlant)
    {
        $plant = Plant::find($idPlant);

        $plant->imgPlant = $request->input("imgPlant");
        $plant->plantName = $request->input("plantName");
        $plant->plantType = $request->input("plantType");
        $plant->plantFamily = $request->input("plantFamily");
        $plant->season = $request->input("season");
        $plant->groundType = $request->input("groundType");
        $plant->daysConservation = $request->input("daysConservation");
        $plant->description = $request->input("description");
        $plant->tblPlantSowing_idSowing = $request->input("tblPlantSowing_idSowing");   

        $plant->save();
        
        return ("Succesfully modified a plant !");
    }

    public function editProblem(Request $request, $idProblem)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $problem = Problem::find($idProblem);

        $problem->typeProblem = $request->typeProblem;
        $problem->importanceLvl = $request->importanceLvl;
        $problem->description = $request->description;

        $problem->save();

        return ("Le problème#$problem->id a été modifié");
    }

    public function editProfile(Request $request, $idProfile)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $profile = Profile::find($idProfile);

        $profile->email = $request->email;
        $profile->username = $request->username;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;

        $profile->save();

        return ("Le profile#$profile->id a été modifié");
    }

    public function editFavCondition($type, $idCondition)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);

            $favorableCondition->rangeType = $request->rangeType;
            $favorableCondition->begin = $request->begin;
            $favorableCondition->end = $request->end;
        }
        else if ($type == 2)
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);

            $favorableCondition->rangeType = $request->rangeType;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }
        
        $favorableCondition->save();

        return ("La condition favorable a été sauvegardé");
    }
}
