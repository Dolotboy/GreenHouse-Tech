<?php

namespace App\Http\Controllers;

use App\Models\AssignProblem;
use App\Models\AssignConditionNb;
use App\Models\AssignConditionDate;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class ControllerUnassign extends Controller
{
    public function unassignFavCondition($type, $idPlant, $idCondition)
    {
        if (is_null($type) ||
            is_null($idPlant) ||
            is_null($idCondition))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }
        if ($type == 1)
        {
            $unassignFavCondition = AssignConditionDate::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblRangeDate_idRangeDate', '=', $idCondition)
            ->get();
    
            if (is_null($unassignFavCondition))
            {
                return('Error, assignation not found or there is no connection with the database');
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
                    return('Error while deleting or there is no connection with the database'.$e);
                }
            }
        }
        else if ($type == 2)
        {
            $unassignFavCondition = AssignConditionNb::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblRangeNb_idRangeNb', '=', $idCondition)
            ->get();
    
            if (is_null($unassignFavCondition))
            {
                return('Error, assignation not found or there is no connection with the database');
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
                    return('Error while deleting or there is no connection with the database'.$e);
                }
            }
        }

        Controller::incrementVersion();
    }

    public function unassignProblem($idPlant, $idProblem)
    {
        if (is_null($idPlant) ||
            is_null($idProblem))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        $unassignProblem = AssignProblem::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblProblem_idProblem', '=', $idProblem)
        ->get();

        if (is_null($unassignProblem))
        {
            return('Error, assignation not found or there is no connection with the database');
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
                return('Error while deleting or there is no connection with the database'.$e);
            }
        }

        Controller::incrementVersion();
    }
}
