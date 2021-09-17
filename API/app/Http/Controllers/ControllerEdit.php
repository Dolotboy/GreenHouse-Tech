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
        $request =  json_decode(file_get_contents('php://input'));

        $plant = Plant::find($idPlant);

        $plant->imgPlant = $request->imgPlant;
        $plant->plantName = $request->plantName;
        $plant->season = $request->season;
        $plant->groundType = $request->groundType;
        $plant->daysConservation = $request->daysConservation;
        $plant->description = $request->description;
        $plant->tblPlantSowing_idSowing = $request->tblPlantSowing_idSowing;

        $plant->save();

        return ("Le produit#$plant->id a été modifié");
    }

    public function indexProblem()
    {
        return view('');
    }

    public function editProblem(Request $request, $idProblem)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $problem = Problem::find($idProblem);

        $problem->typeProblem = $request->typeProblem;
        $problem->importanceLvl = $request->importanceLvl;
        $problem->description = $request->description;

        $problem->save();

        return ("Le produit#$problem->id a été modifié");
    }

    public function indexProfile()
    {
        return view('');
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

        return ("Le produit#$profile->id a été modifié");
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function editFavCondition()
    {
        
    }
}
