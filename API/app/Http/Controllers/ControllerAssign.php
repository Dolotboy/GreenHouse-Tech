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
    public function assignFavCondition(/*Request $request,*/ $type, $idPlant, $idCondition)
    {
        //$request =  json_decode(file_get_contents('php://input'));

        if ($type == 1)
        {
            $assignFavorableCondition = new AssignConditionDate();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblDateRangeFav_idRangeDate = $idCondition;

            /*$assignFavorableCondition->tblPlant_idPlant = $request->tblPlant_idPlant;
            $assignFavorableCondition->tblDateRangeFavorableCondition_idRangeDate = $request->tblDateRangeFavorableCondition_idRangeDate;

            {     
                "tblPlant_idPlant": 1,    
                "tblDateRangeFavorableCondition_idRangeDate": 1 
            }    
            */
        }
        else if ($type == 2)
        {
            $assignFavorableCondition = new AssignConditionNb();

            $assignFavorableCondition->tblPlant_idPlant = $idPlant;
            $assignFavorableCondition->tblNbRangeFav_idRangeNb = $idCondition;

            /*$assignFavorableCondition->tblPlant_idPlant = $request->tblPlant_idPlant;
            $assignFavorableCondition->tblRangeFavorableConditionNb_idRangeNb = $request->tblRangeFavorableConditionNb_idRangeNb;

            {     
                "tblPlant_idPlant": 1,    
                "tblRangeFavorableConditionNb_idRangeNb": 2 
            } 
            */   
        }
        
        $assignFavorableCondition->save();

        return ("La condition a été assigné");
    }

    public function assignProblem(Request $request, $idPlant, $idProblem)
    {
        $request =  json_decode(file_get_contents('php://input'));

        $assignProblem = new AssignProblem();

        $assignProblem->tblPlant_idPlant = $idPlant;
        $assignProblem->tblProblem_idProblem = $idProblem;

        $assignProblem->save();

        return ("Le problème a été assigné");
    }
}
