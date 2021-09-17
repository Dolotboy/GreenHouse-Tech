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

class ControllerAdd extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('newPlant');        
    }

    public function addPlant(Request $request)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $plant = new Plant();

        $plant->plantName = $request->plantName;
        $plant->season = $request->season;
        $plant->plantType = $request->plantType;
        $plant->groundType = $request->groundType;
        $plant->daysConservation = $request->daysConservation;
        $plant->functioning = $request->functioning;
        $plant->tblPlantSowing_idSowing = $request->tblPlantSowing_idSowing;
        
        $plant->save();

        return ("La plante#$plant->idPlant a été ajouté");
    }

    public function indexProblem(Request $request)
    {
        return view('newProblem');
    }

    public function addProblem(Request $request)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $problem = new Problem();

        $problem->typeProblem = $request->typeProblem;
        $problem->importance = $request->importance;
        $problem->description = $request->description;
        
        $problem->save();

        return ("Le problème#$problem->idProblem a été ajouté");
    }

    public function indexFavorite(Request $request)
    {
        return view('newFavourite');
    }

    public function addFavorite(Request $request)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $favorite = new Favorite();

        $favorite->tblPlant_idPlant = $request->tblPlant_idPlant;
        $favorite->tblProfile_idProfile = $request->tblProfile_idProfile;
        
        $favorite->save();

        return ("Le favoris a été ajouté");
    }

    public function indexProfile(Request $request)
    {
        return view('newProfile');
    }

    public function addProfile(Request $request)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $profile = new Profile();

        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->salt = Hash::make($request->password);
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        
        $profile->save();

        return ("Le profil a été ajouté");
    }

    public function indexFavCondition(Request $request)
    {
        return view('newFavCond');
    }

    public function addFavCondition(Request $request, $type)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $favorableCondition = new FavorableConditionDate();

            $favorableCondition->variableEvalue = $request->variableEvalue;
            $favorableCondition->begin = $request->begin;
            $favorableCondition->end = $request->end;
        }
        else if ($type == 2)
        {
            $favorableCondition = new FavorableConditionNb();

            $favorableCondition->rangeType = $request->rangeType;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }
        
        $favorableCondition->save();

        return ("La condition favorable a été ajouté");
    }
}
