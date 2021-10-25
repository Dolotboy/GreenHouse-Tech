<?php

namespace App\Http\Controllers;

use App\Models\AssignProblem;
use App\Models\AssignConditionNb;
use App\Models\AssignConditionDate;
use Illuminate\Http\Request;
use Exception;

class ControllerUnassign extends Controller
{
    /* ------------------------- INDEX PAGE ---------------------------- */
    
    public function indexFavCondDate()
    {
        return view('unassignFavCondDate');
    }

    public function indexFavCondNb()
    {
        return view('unassignFavCondNb');
    }

    public function indexProblem()
    {
        return view('unassingProblem');
    }

/* ------------------------- UNASSIGN DATE ---------------------------- */

    public function unassignFavCondDate($idPlant, $idCondition)
    {
        $unassignFavCondition = AssignConditionDate::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblRangeDate_idRangeDate', '=', $idCondition)
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
                    ['tblRangeDate_idRangeDate', '=', $idCondition],
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

/* ------------------------- UNASSIGN NUMBER ---------------------------- */

    public function unassignFavCondNb($idPlant, $idCondition)
    {
        $unassignFavCondition = AssignConditionNb::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblRangeNb_idRangeNb', '=', $idCondition)
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
                    ['tblRangeNb_idRangeNb', '=', $idCondition],
                ])->delete();
                return ("Assignation deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

/* ------------------------- UNASSIGN PROBLEM ---------------------------- */

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
