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
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Condition: $idCondition"], 400);
        }
        if ($type == 1)
        {
            $unassignFavCondition = AssignConditionDate::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblRangeDate_idRangeDate', '=', $idCondition)
            ->get();
    
            if (is_null($unassignFavCondition))
            {
                return response()->json(['message'=> "The association doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Condition: $idCondition"], 400);
            }
            else
            {
                try
                {
                    AssignConditionDate::where([
                        ['tblPlant_idPlant', '=', $idPlant],
                        ['tblRangeDate_idRangeDate', '=', $idCondition],
                    ])->delete();
                    return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
                }
                catch(Exception $e)
                {   
                    return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Condition: $idCondition"], 400);
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
                return response()->json(['message'=> "The association doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Condition: $idCondition"], 400);
            }
            else
            {
                try
                {
                    AssignConditionNb::where([
                        ['tblPlant_idPlant', '=', $idPlant],
                        ['tblRangeNb_idRangeNb', '=', $idCondition],
                    ])->delete();
                    return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
                }
                catch(Exception $e)
                {  
                    return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Condition: $idCondition"], 400);
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
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $unassignProblem = AssignProblem::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblProblem_idProblem', '=', $idProblem)
        ->get();

        if (is_null($unassignProblem))
        {
            return response()->json(['message'=> "The association doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Problem: $idProblem"], 400);
        }
        else
        {
            try
            {
                AssignProblem::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblProblem_idProblem', '=', $idProblem],
                ])->delete();
                return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
            }
            catch(Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Problem: $idProblem"], 400);
            }
        }

        Controller::incrementVersion();
    } 
}
