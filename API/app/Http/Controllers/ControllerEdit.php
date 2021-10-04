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
        $problem = Problem::find($idProblem);

        return view('editProblem', ["problem" => $problem]);
    }

    public function editProblemTest(Request $request, $idProblem)
    {
        $problem = Problem::find($idProblem);

        $problem->typeProblem = $request->input("typeProblem");
        $problem->importanceLvl = $request->input("importanceLvl");
        $problem->description = $request->input("description");

        $problem->save();

        return("Problem has been successfully modified");
        //return ("Le problème #$problem->id a été modifié");
    }

    public function editProfile(Request $request, $idProfile)
    {
        $profile = Profile::find($idProfile);

        return view('editProfile', ["profile" => $profile]);
    }

    public function editProfileTest(Request $request, $idProfile)
    {
        $profile = Profile::find($idProfile);

        $profile->email = $request->input("email");
        $profile->username = $request->input("password");
        $profile->username = $request->input("username");
        $profile->firstName = $request->input("firstName");
        $profile->lastName = $request->input("lastName");

        $profile->save();

        return("Profile has been successfully modified");
        //return ("Le profile #$profile->id a été modifié");
    }

    public function editFavCondDate(Request $request, $idCondition)
    {
        $favorableCondition = FavorableConditionDate::find($idCondition);

        return view('editFavCondDate', ["favorableCondition" => $idCondition]);
    }

    public function editFavCondDateSent(Request $request, $idCondition)
    {
        $favorableCondition = FavorableConditionDate::find($idCondition);

        $favorableCondition->rangeType = $request->input("rangeType");
        $favorableCondition->begin = $request->input("begin");
        $favorableCondition->end = $request->input("end");

        $favorableCondition->save();

        return("Fav Cond Date have been modified");
    }

    public function editFavCondNb(Request $request,$idCondition)
    {
        $favorableCondition = FavorableConditionNb::find($idCondition);

        $favorableCondition->rangeType = $request->input("rangeType");
        $favorableCondition->min = $request->input("min");
        $favorableCondition->max = $request->input("max");
        $favorableCondition->unit = $request->input("unit");

        $favorableCondition->save();

        return("Fav Cond Nb have been modified");
    }
}
