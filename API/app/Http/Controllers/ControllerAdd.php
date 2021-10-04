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

    /* ------------------- PLANT ------------------- */

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

    /* ------------------- PROBLEM ------------------- */

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

/* ------------------- FAVORITE ------------------- */

    public function indexFavorite(Request $request)
    {
        return view('newFavourite');
    }

    public function addFavorite($idPlant, $idProfile)
    {
        $favorite = new Favorite();
        
        $favorite->tblPlant_idPlant = $idPlant;
        $favorite->tblProfile_idProfile = $idProfile;
        
        $favorite->save();

        return ("Le favoris a été ajouté");
    }

/* ------------------- PROFILE ------------------- */

    public function indexProfile(Request $request)
    {
        return view('newProfile');
    }

    public function addProfile(Request $request)
    {

        $profile = new Profile();

        $profile->email = $request->input("email");
        $profile->password = $request->input("password");
        $profile->salt = Hash::make($request->input("password"));
        $profile->username = $request->input("username");
        $profile->firstName = $request->input("firstName");
        $profile->lastName = $request->input("lastName");
        
        $profile->save();

        return ("Le profil a été ajouté"); 
    }

/* ------------------- FAVORITE CONDITION DATE ------------------- */

    public function indexFavCondDate(Request $request)
    {
        return view('newFavCondDate');
    }

    public function addFavConditionDate(Request $request)
    {
        $favorableConditionDate = new FavorableConditionDate();

        $favorableConditionDate->rangeType = $request->input("rangeType");
        $favorableConditionDate->begin = $request->input("begin");
        $favorableConditionDate->end = $request->input("end");

        $favorableConditionDate->save();

        return ("La condition favorable Date a été ajouté");
    }

/* ------------------- FAVORITE CONDITION NB ------------------- */

    public function indexFavCondNb(Request $request)
    {
        return view('newFavCondNb');
    }

    public function addFavConditionNb(Request $request)
    {
        $favorableConditionNb = new FavorableConditionNb();

        $favorableConditionNb->rangeType = $request->input("rangeType");
        $favorableConditionNb->min = $request->input("min");
        $favorableConditionNb->max = $request->input("max");
        $favorableConditionNb->unit = $request->input("unit");

        $favorableConditionNb->save();

        return ("La condition favorable Nb a été ajouté");
    }
}
