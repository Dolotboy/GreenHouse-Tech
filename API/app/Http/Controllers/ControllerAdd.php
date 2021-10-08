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

    public function indexProblem(Request $request)
    {
        return view('');
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
        $saltedPassword = $request->password . $salt;

        $profile->password = Controller::hashPassword($saltedPassword);
        $profile->salt = $salt;

        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->access = $request->access;
        
        $profile->save();

        Controller::incrementVersion();

        return ("  Le profil a été ajouté");
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function addFavCondition(Request $request, $type)
    {

        if ($type == 1)
        {
            $favorableCondition = new FavorableConditionDate();

            $favorableCondition->type = $request->type;
            $favorableCondition->start = $request->start;
            $favorableCondition->end = $request->end;
            $favorableCondition->location = $request->location;
        }
        else if ($type == 2)
        {
            $favorableCondition = new FavorableConditionNb();

            $favorableCondition->type = $request->type;
            $favorableCondition->min = $request->min;
            $favorableCondition->max = $request->max;
            $favorableCondition->unit = $request->unit;
        }
        
        $favorableCondition->save();

        Controller::incrementVersion();

        return ("La condition favorable a été ajouté");
    }
}
