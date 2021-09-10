<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableCondition;
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

        $vegetal = new Plant();

        $vegetal->plantName = $request->plantName;
        $vegetal->season = $request->season;
        $vegetal->plantType = $request->plantType;
        $vegetal->groundType = $request->groundType;
        $vegetal->daysConservation = $request->daysConservation;
        $vegetal->functionning = $request->functionning;
        $vegetal->tblPlantSowing_idSowing = $request->tblPlantSowing_idSowing;
        
        $vegetal->save();

        return ("Le produit#$vegetal->id a été ajouté");
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function addProblem(Request $request)
    {
    }

    public function indexFavorite(Request $request)
    {
        return view('');
    }

    public function addFavorite(Request $request)
    {
    }

    public function indexProfil(Request $request)
    {
        return view('');
    }

    public function addProfil(Request $request)
    {
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function addFavCondition(Request $request)
    {
    }
}
