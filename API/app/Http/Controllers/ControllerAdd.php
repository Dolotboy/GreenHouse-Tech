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
        //$request =  json_decode(file_get_contents('php://input'));

        $plant = new Plant();

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

        return ("La plante#$plant->idPlant a été ajouté");
    }

    public function indexProblem(Request $request)
    {
        return view('newProblem');
    }

    public function addProblem(Request $request)
    {
        //$request =  json_decode(file_get_contents('php://input'));

        $problem = new Problem();

        $problem->typeProblem = $request->input("typeProblem");
        $problem->importanceLvl = $request->input("importanceLvl");
        $problem->description = $request->input("description");
        
        $problem->save();

        return ("Le problème#$problem->idProblem a été ajouté");
    }

    public function indexFavorite(Request $request)
    {
        return view('newFavourite');
    }

    public function addFavorite(/*Request $reques*/ $idPlant, $idProfile)
    {
        $favorite = new Favorite();
        
        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;

        /*$favorite->tblPlant_idPlant = $request->input("tblPlant_idPlant");
        $favorite->tblProfile_idProfile = $request->input("tblProfile_idProfile");*/

        /*
        {   
            "tblPlant_idPlant": 1,  
            "tblProfile_idProfile": 1 
        }  
       */ 
        
        $favorite->save();

        return ("Le favoris a été ajouté");
    }

    public function indexProfile(Request $request)
    {
        return view('newProfile');
    }

    public function addProfile(Request $request)
    {
        //$request =  json_decode(file_get_contents('php://input'));

        $profile = new Profile();

        $profile->email = $request->input("email");
        $profile->password = $request->input("password");
        $profile->salt = Hash::make($request->password);
        $profile->username = $request->input("username");
        $profile->firstName = $request->input("firstName");
        $profile->lastName = $request->input("lastName");
        
        $profile->save();

        return ("Le profil a été ajouté");
    }

    public function indexFavCondition(Request $request)
    {
        return view('newFavCond');
    }

    public function addFavCondition(Request $request, $type)
    {
        //$request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $favorableCondition = new FavorableConditionDate();

            $favorableCondition->rangeType = $request->input("rangeType");
            $favorableCondition->begin = $request->input("begin");
            $favorableCondition->end = $request->input("end");
        }
        else if ($type == 2)
        {
            $favorableCondition = new FavorableConditionNb();

            $favorableCondition->rangeType = $request->input("rangeType");
            $favorableCondition->min = $request->input("min");
            $favorableCondition->max = $request->input("max");
            $favorableCondition->unit = $request->input("unit");
        }
        
        $favorableCondition->save();

        return ("La condition favorable a été ajouté");
    }
}
