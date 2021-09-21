<?php

namespace App\Http\Controllers;

use App\Models\AssignProblem;
use App\Models\AssignConditionNb;
use App\Models\AssignConditionDate;
use Illuminate\Http\Request;
use Exception;

class ControllerUnassign extends Controller
{
    public function unassignFavCondition($type, $idPlant, $idCondition)
    {
        if ($type == 1)
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
                    //AssignProblem::destroy([$idPlant, $idProblem]);
                    return ("Assignation deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting'.$e);
                }
            }
        }
        else if ($type == 2)
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
                    //AssignProblem::destroy([$idPlant, $idProblem]);
                    return ("Assignation deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting'.$e);
                }
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
                //AssignProblem::destroy([$idPlant, $idProblem]);
                return ("Assignation deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }
}