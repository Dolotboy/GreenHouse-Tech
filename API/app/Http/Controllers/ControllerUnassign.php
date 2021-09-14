<?php

namespace App\Http\Controllers;

use App\Models\AssignProblem;
use Illuminate\Http\Request;
use Exception;

class ControllerUnassign extends Controller
{
    public function unassignFavCondition($type, $idPlant, $idProblem)
    {
    }

    public function unassignProblem($idPlant, $idProblem)
    {
        //$unassignProblem = AssignProblem::find($idPlant, $idProblem);
        //$unassignProblem = AssignProblem::find([$idPlant, $idProblem]);
        //$unassignProblem = AssignProblem::find(collect([$idPlant, $idProblem]));
        //$unassignProblem = AssignProblem::find(collect(['1', '4']));

        $unassignProblem = AssignProblem::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblProblem_idProblem', '=', $idProblem)
        ->get();

        /*$unassignProblem = AssignProblem::where([
            ['idPlant', '=', $idPlant],
            ['idProblem', '<>', $idProblem],
        ]);*/


        //https://laravel.com/docs/6.x/collections 
        // https://laracasts.com/discuss/channels/laravel/fatal-error-uncaught-typeerror-mb-strpos-argument-1-haystack-must-be-of-type-string-null-given

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
