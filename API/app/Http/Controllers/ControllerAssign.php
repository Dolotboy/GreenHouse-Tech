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
use Illuminate\Http\Response;

class ControllerAssign extends Controller
{

    public function indexFavCondDate()
    {
        return view("assignFavCondDate");
    }

    public function assignFavConditionDate($idPlant,$idCondition)
    {
        $assignFavorableConditionDate = new AssignConditionDate();

        if (is_null($idPlant) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        /**************************** FIND THE PLANT ****************************/
        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if(is_null($plant))
        {
            return response()->json(['message'=> "Error, the plant you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        /**************************** FIND THE CONDITION DATE ****************************/
        try
        {
            $favorableCondtion = FavorableConditionDate::Find($idCondition);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if(is_null($favorableCondtion))
        {
            return response()->json(['message'=> "Error, the condition you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        /**************************** FIND THE ASSOCIATION ****************************/
        try
        {
            $findAssociation = AssignConditionDate::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblRangeDate_idRangeDate', '=', $idCondition)
            ->get();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "Error trying to find if this association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / ConditionDate: $idCondition"], 400);
        }

        if (!$findAssociation->isEmpty())
        {
            return response()->json(['message'=> "Error, the association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / ConditionDate: $idCondition"], 400); 
        }

        $assignFavorableConditionDate->tblPlant_idPlant = $idPlant;
        $assignFavorableConditionDate->tblRangeDate_idRangeDate = $idCondition;

        try
        {
            $assignFavorableConditionDate->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database, either this association already exists or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);

    }
    
    public function indexFavCondNb()
    {
        return view("assignFavCondNb");
    }

    public function assignFavConditionNb($idPlant, $idCondition)
    {
        $assignFavorableConditionNb = new AssignConditionNb(); 

        if (is_null($idPlant) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        /**************************** FIND THE PLANT ****************************/
        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if(is_null($plant))
        {
            return response()->json(['message'=> "Error, the plant you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        /**************************** FIND THE CONDITION NB ****************************/
        try
        {
            $favorableCondtion = FavorableConditionNb::Find($idCondition);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if(is_null($favorableCondtion))
        {
            return response()->json(['message'=> "Error, the condition you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        /**************************** FIND THE ASSOCIATION ****************************/
        try
        {
            $findAssociation = AssignConditionNb::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblRangeNb_idRangeNb', '=', $idCondition)
            ->get();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "Error trying to find if this association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / ConditionNb: $idCondition"], 400);
        }

        if (!$findAssociation->isEmpty())
        {
            return response()->json(['message'=> "Error, the association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / ConditionNb: $idCondition"], 400); 
        }

        $assignFavorableConditionNb->tblPlant_idPlant = $idPlant;
        $assignFavorableConditionNb->tblRangeNb_idRangeNb = $idCondition;

        try
        {
            $assignFavorableConditionNb->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database, either this association already exists or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
    }
       
    public function indexProblem()
    {
        return view("assignProblem");
    }
    public function assignProblem($idPlant, $idProblem)
    {
        $assignProblem = new AssignProblem();

        if (is_null($idPlant) ||
            is_null($idProblem))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        /**************************** FIND THE PLANT ****************************/
        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if(is_null($plant))
        {
            return response()->json(['message'=> "Error, the plant you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        /**************************** FIND THE PROBLEM ****************************/
        try
        {
            $problem = Problem::Find($idProblem);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "The problem doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        if(is_null($problem))
        {
            return response()->json(['message'=> "Error, the problem you entered doesn't exist", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 404);
        }

        /**************************** FIND THE ASSOCIATION ****************************/
        try
        {
            $findAssociation = AssignProblem::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblProblem_idProblem', '=', $idProblem)
            ->get();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "Error trying to find if this association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Problem: $idProblem"], 400);
        }

        if (!$findAssociation->isEmpty())
        {
            return response()->json(['message'=> "Error, the association already exist", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Problem: $idProblem"], 400); 
        }

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        try
        {
            $assignProblem->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database, or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
    } 
}
