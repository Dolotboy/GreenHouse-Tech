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
        if (is_null($idPlant) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $assignFavorableConditionDate = new AssignConditionDate();

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
        if (is_null($idPlant) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $assignFavorableConditionNb = new AssignConditionNb();  

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
        if (is_null($idPlant) ||
            is_null($idProblem))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $assignProblem = new AssignProblem();

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        try
        {
            $assignProblem->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database,, either this association already exists or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
    } 
}
