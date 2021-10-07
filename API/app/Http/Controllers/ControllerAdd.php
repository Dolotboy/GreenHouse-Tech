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
use Illuminate\Support\Str;


class ControllerAdd extends Controller
{

    /* ------------------- PLANT ------------------- */

    public function indexPlant(Request $request)
    {
        return view('newPlant');        
    }

    public function addPlant(Request $request)
    {
        $plant = new Plant();

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

        return ("La plante#$plant->idPlant a été ajouté");
    }

    /* ------------------- PROBLEM ------------------- */

    public function indexProblem(Request $request)
    {
        return view('newProblem');
    }

    public function addProblem(Request $request)
    {
        $problem = new Problem();

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;
        
        $problem->save();

        Controller::incrementVersion();

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

        Controller::incrementVersion();

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
        $salt = Str::random(40);

        $profile->email = $request->email;
        $hashedPassword = $request->password . $salt;

        $profile->password = Hash::make($hashedPassword);
        //$profile->password = $request->password;
        //$profile->password = Hash::make($request->password);
        $profile->salt = $salt;

        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;
        
        $profile->save();

        Controller::incrementVersion();

        return ("Le profil a été ajouté");
    }

/* ------------------- FAVORITE CONDITION DATE ------------------- */

    public function indexFavCondDate(Request $request)
    {
        return view('newFavCondDate');
    }

    public function addFavConditionDate(Request $request)
    {
        $favorableCondition = new FavorableConditionDate();

        $favorableCondition->type = $request->type;
        $favorableCondition->start = $request->start;
        $favorableCondition->end = $request->end;
        $favorableCondition->location = $request->location;

        $favorableCondition->save();

        Controller::incrementVersion();

        return ("La condition favorable DATE a été ajouté");
    }
    
    public function indexFavCondNb(Request $request)
    {
        return view('newFavCondNb');
    }

    public function addFavConditionNb(Request $request)
    {
        $favorableCondition = new FavorableConditionNb();

        $favorableCondition->type = $request->type;
        $favorableCondition->min = $request->min;
        $favorableCondition->max = $request->max;
        $favorableCondition->unit = $request->unit;

        $favorableCondition->save();

        Controller::incrementVersion();

        return ("La condition favorable NB a été ajouté");
    }

}
