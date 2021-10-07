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
use Exception;

class ControllerAssign extends Controller
{
    public function assignFavCondition($type, $idPlant, $idCondition)
    {
        if (is_null($type) ||
            is_null($idPlant) ||
            is_null($idCondition))
        {
             return "One of the field is empty, you must fill them all";
        }

        if ($type == 1)
        {
            $assignFavorableCondition = new AssignConditionDate();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblDateRangeFav_idRangeDate = $idCondition;
        }
        else if ($type == 2)
        {
            $assignFavorableCondition = new AssignConditionNb();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblNbRangeFav_idRangeNb = $idCondition;  
        }
        
        try
        {
            $assignFavorableCondition->save();
        }
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("La condition a été assigné");
    }

    public function assignProblem($idPlant, $idProblem)
    {
        if (is_null($idPlant) ||
            is_null($idProblem))
        {
         return "One of the field is empty, you must fill them all";
        }

        $assignProblem = new AssignProblem();

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        try
        {
            $assignProblem->save();
        }
        catch (Exception)
        {
            return "We've encountered problems while saving data in the database or there is no connection with the database";
        }

        Controller::incrementVersion();

        return ("Le problème a été assigné");
    }
}
