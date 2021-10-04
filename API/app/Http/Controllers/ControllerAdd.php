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
    public function indexPlant(Request $request)
    {
        return view('newPlant');
    }

    public function addPlant(Request $request)
    {
        $plant = new Plant();

        $plant->imgPlant = $request->imgPlant;
        $plant->plantName = $request->plantName;
        $plant->plantType = $request->plantType;
        $plant->plantFamily = $request->plantFamily;
        $plant->season = $request->season;
        $plant->groundType = $request->groundType;
        $plant->daysConservation = $request->daysConservation;
        $plant->description = $request->description;
        $plant->tblPlantSowing_idSowing = $request->tblPlantSowing_idSowing;
        $plant->plantState = $request->plantState;
        $plant->equipment = $request->equipment;
        $plant->difficulty = $request->difficulty;
        $plant->lifeTime = $request->lifeTime;
        $plant->bestNeighbor = $request->bestNeighbor;
        
        $plant->save();

        Controller::incrementVersion();

        return ("La plante#$plant->idPlant a été ajouté");
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function addProblem(Request $request)
    {
        $problem = new Problem();

        $problem->imgProblem = $request->imgProblem;
        $problem->typeProblem = $request->typeProblem;
        $problem->importanceLvl = $request->importanceLvl;
        $problem->description = $request->description;
        
        $problem->save();

        Controller::incrementVersion();

        return ("Le problème#$problem->idProblem a été ajouté");
    }

    public function indexFavorite(Request $request)
    {
        return view('');
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

    public function indexProfile(Request $request)
    {
        return view('');
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

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function addFavCondition(Request $request, $type)
    {
        $request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $favorableCondition = new FavorableConditionDate();

            $favorableCondition->rangeType = $request->rangeType;
            $favorableCondition->begin = $request->begin;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;
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

        Controller::incrementVersion();

        return ("La condition favorable a été ajouté");
    }
}
