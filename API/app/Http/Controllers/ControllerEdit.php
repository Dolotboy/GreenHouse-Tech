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
    }

    public function indexProblem(Request $request)
    {
        return view('editSearchProblem');
    }

    public function indexProfile(Request $request)
    {
        return view('editSearchProfile');
    }

    public function indexFavCondDate(Request $request)
    {
        return view('editSearchFavCondDate');
    }


    public function indexFavCondNb(Request $request)
    {
        return view('editSearchFavCondNb');
    }

    public function editPlant(Request $request, $idPlant)
    {
        $plant = Plant::find($idPlant);

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

        $plant->save();

        Controller::incrementVersion();
        
        //return ("La plante#$plant->idPlant a été modifié");
        return ("Succesfully modified a plant !");
    }

    public function editProblem(Request $request, $idProblem)
    {
        $problem = Problem::find($idProblem);

        return view('editProblem', ["problem" => $problem]);
    }

    public function editProblemSent(Request $request, $idProblem)
    {
        $problem = Problem::find($idProblem);

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;

        $problem->save();

        Controller::incrementVersion();

        return ("Le problème#$problem->idProblem a été modifié");
    }

    public function editProfile(Request $request, $idProfile)
    {
        $profile = Profile::find($idProfile);

        return view('editProfile', ["profile" => $profile]);
    }

    public function editProfileSent(Request $request, $idProfile)
    {
        $profile = Profile::find($idProfile);

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;

        $profile->save();

        Controller::incrementVersion();

        return ("Le profile#$profile->idProfile a été modifié");
    }

    public function editFavCondDate(Request $request, $idCondition)
    {
        $favorableCondition = FavorableConditionDate::find($idCondition);

        return view('editFavCondDate', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondDateSent(Request $request, $idCondition)
    {
        $favorableCondition = FavorableConditionDate::find($idCondition);

        $favorableCondition->type = $request->input("type");
        $favorableCondition->start = $request->input("start");
        $favorableCondition->end = $request->input("end");

        $favorableCondition->save();

        return("Fav Cond Date have been modified");
    }

    public function editFavCondNb(Request $request, $idCondition)
    {
        $favorableCondition = FavorableConditionNb::find($idCondition);

        return view('editFavCondNb', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondNbSent(Request $request,$idCondition)
    {
        $favorableCondition = FavorableConditionNb::find($idCondition);

        $favorableCondition->type = $request->input("type");
        $favorableCondition->min = $request->input("min");
        $favorableCondition->max = $request->input("max");
        $favorableCondition->unit = $request->input("unit");

        $favorableCondition->save();

        return("Fav Cond Nb have been modified");

    }
}
