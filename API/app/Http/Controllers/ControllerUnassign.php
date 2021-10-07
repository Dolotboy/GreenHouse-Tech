<?php

namespace App\Http\Controllers;

use App\Models\AssignProblem;
use App\Models\AssignConditionNb;
use App\Models\AssignConditionDate;
use Illuminate\Http\Request;
use Exception;

class ControllerUnassign extends Controller
{
    /* ------------------------- INDEX ---------------------------- */
    
    public function indexFavCondDate()
    {
        return view('searchFavCondDate');
    }

    public function indexFavCondNb()
    {
        return view('searchFavCondNb');
    }

    public function indexProblem()
    {
        return view('searchProblem');
    }


/* ------------------------- ASSIGN ---------------------------- */

    public function assignFavCondDate()
    {
        $unassignFavCondition = AssignConditionDate::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblDateRangeFav_idRangeDate', '=', $idCondition)
        ->get();

        if (is_null($unassignFavCondition))
        {
            return('Error, assignation not found');
        }
        else
        {
            try
            {
                AssignConditionDate::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblDateRangeFav_idRangeDate', '=', $idCondition],
                ])->delete();
                return ("Assignation deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }

            Controller::incrementVersion();
        }
    }

    public function assignFavCondNb()
    {
        $unassignFavCondition = AssignConditionNb::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblNbRangeFav_idRangeNb', '=', $idCondition)
        ->get();

        if (is_null($unassignFavCondition))
        {
            return('Error, assignation not found');
        }
        else
        {
            try
            {
                AssignConditionNb::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblNbRangeFav_idRangeNb', '=', $idCondition],
                ])->delete();
                return ("Assignation deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

    public function unassignProblem($idPlant, $idProblem)
    {
        $unassignProblem = AssignProblem::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblProblem_idProblem', '=', $idProblem)
        ->get();

        if (is_null($unassignProblem))
        {
            return('Error, assignation not found');
        }
        else
        {
            try
            {
                AssignProblem::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblProblem_idProblem', '=', $idProblem],
                ])->delete();
                return ("Assignation deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }

        Controller::incrementVersion();
    }
}
