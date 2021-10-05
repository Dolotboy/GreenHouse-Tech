<?php

namespace App\Http\Controllers;

use App\Models\AssignConditionNb;
use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\AssignConditionDate;
use App\Models\AssignProblem;
use Illuminate\Http\Request;

class ControllerAssign extends Controller
{

    public function indexFavCondDate()
    {
        return view("assignFavCondDate");
    }

    public function assignFavConditionDate($idPlant,$idCondition)
    {
        $assignFavorableConditionDate = new AssignConditionDate();

        $assignFavorableConditionDate->tblPlant_idPlant = $idPlant;
        $assignFavorableConditionDate->tblDateRangeFav_idRangeDate = $idCondition;

        $assignFavorableConditionDate->save();

        return("La condition favorable date a ete ajoute");
    }
    
    public function indexFavCondNb()
    {
        return view("assignFavCondNb");
    }

    public function assignFavConditionNb($idPlant, $idCondition)
    {
        $assignFavorableConditionNb = new AssignConditionNb();  

        $assignFavorableConditionNb->tblPlant_idPlant = $idPlant;
        $assignFavorableConditionNb->tblNbRangeFav_idRangeNb = $idCondition;

        $assignFavorableConditionNb->save();

        return("La condition favorable nb a ete ajoute");
    }

    public function assignProblem(Request $request, $idPlant, $idProblem)
    {
        $assignProblem = new AssignProblem();

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        $assignProblem->save();

        Controller::incrementVersion();

        return ("Le problème a été assigné");
    }
}
