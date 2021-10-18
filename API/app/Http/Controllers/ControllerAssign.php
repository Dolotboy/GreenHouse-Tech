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
    public function assignFavCondition($type, $idPlant, $idCondition)
    {
        if ($type == 1)
        {
            $assignFavorableCondition = new AssignConditionDate();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblRangeDate_idRangeDate = $idCondition;
        }
        else if ($type == 2)
        {
            $assignFavorableCondition = new AssignConditionNb();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblRangeNb_idRangeNb = $idCondition;  
        }
        
        $assignFavorableCondition->save();

        Controller::incrementVersion();

        return ("La condition a été assigné");
    }

    public function assignProblem(Request $request, $idPlant, $idProblem)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $assignProblem = new AssignProblem();

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        $assignProblem->save();

        Controller::incrementVersion();

        return ("Le problème a été assigné");
    }
}
