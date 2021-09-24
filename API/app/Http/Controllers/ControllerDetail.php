<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\AssignProblem;
use Illuminate\Http\Request;
use Exception;

class ControllerDetail extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('newPlant');
    }

    public function searchPlant($id)
    {
        $plant = Plant::find($id);    
        $json = json_encode($plant);
        return ("$json");
    }

    public function searchAllPlant()
    {
        $plant = Plant::All();

        $json = json_encode($plant);

        return ("$json");
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function searchProblem($id)
    {
        $problem = Problem::find($id);

        $idProblem = $problem->idProblem;
        $typeProblem = $problem->typeProblem;
        $importanceLvl = $problem->importanceLvl;
        $description = $problem->description;
        $createdAt = $problem->created_at;
        $updatedAt = $problem->updated_at;

        
        $array = array('idProblem' => $idProblem, 'typeProblem' => $typeProblem, 'importanceLvl' => $importanceLvl, 'description' => $description, 'created_at' => $createdAt, 'updated_at' => $updatedAt);
        $json = json_encode($array);
    
        return ("$json");
    }

    public function searchAllProblem()
    {
        $problem = Problem::All();

        $json = json_encode($problem);

        return ("$json");
    }

    public function indexProfile(Request $request)
    {
        return view('');
    }

    public function searchProfile($id)
    {
        $profile = Profile::find($id);

        $idProfile = $profile->idProfile;
        $email = $profile->email;
        $username = $profile->username;
        $firstName = $profile->firstName;
        $lastName = $profile->lastName;
        $createdAt = $profile->created_at;
        $updatedAt = $profile->updated_at;

        
        $array = array('idProfile' => $idProfile, 'email' => $email, 'username' => $username, 'firstName' => $firstName, 'lastName' => $lastName, 'created_at' => $createdAt, 'updated_at' => $updatedAt);
        $json = json_encode($array);
    
        return ("$json");
    }

    public function searchAllProfile()
    {
        $profile = Profile::All();

        $json = json_encode($profile);

        return ("$json");
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function searchFavCondition($type, $id)
    {
        if ($type == 1)
        {
            $favorableCondition = FavorableConditionDate::find($id);

            $idRangeDate = $favorableCondition->idRangeDate;
            $rangeType = $favorableCondition->rangeType;
            $begin = $favorableCondition->begin;
            $end = $favorableCondition->end;
            $createdAt = $favorableCondition->created_at;
            $updatedAt = $favorableCondition->updated_at;

            $array = array('idRangeDate' => $idRangeDate, 'rangeType' => $rangeType, 'begin' => $begin, 'end' => $end, 'created_at' => $createdAt, 'updated_at' => $updatedAt);

        }
        else if($type == 2)
        {
            $favorableCondition = FavorableConditionNb::find($id);

            $idRangeNb = $favorableCondition->idRangeNb;
            $rangeType = $favorableCondition->rangeType;
            $min = $favorableCondition->min;
            $max = $favorableCondition->max;
            $unit = $favorableCondition->unit;
            $createdAt = $favorableCondition->created_at;
            $updatedAt = $favorableCondition->updated_at;

            $array = array('idRangeNb' => $idRangeNb, 'rangeType' => $rangeType, 'min' => $min, 'max' => $max, 'unit' => $unit, 'created_at' => $createdAt, 'updated_at' => $updatedAt);
        }

        $json = json_encode($array);
    
        return ("$json");
    }

    public function searchAllFavCondition($type)
    {
        if ($type == 1)
        {
            $favCondition = FavorableConditionDate::All();

            $json = json_encode($favCondition);
    
            return ("$json");
        }
        else if ($type ==2)
        {
            $favCondition = FavorableConditionNb::All();

            $json = json_encode($favCondition);
    
            return ("$json");
        }
    }

    public function indexPackage()
    {

    }

    public function searchPackage($searchCondition)
    {
        $plant = Plant::find($searchCondition);

        $idPlant = $plant->idPlant;
        $imgPlant = $plant->imgPlant;
        $plantName = $plant->plantName;
        $plantType = $plant->plantType;
        $plantFamily = $plant->plantFamily;
        $season = $plant->season;
        $groundType = $plant->groundType;
        $daysConservation = $plant->daysConservation;
        $description = $plant->description;
        $tblPlantSowing_idSowing = $plant->tblPlantSowing_idSowing;
        $createdAt = $plant->created_at;
        $updatedAt = $plant->updated_at;

        
        $array = array('idPlant' => $idPlant, 'imgPlant' => $imgPlant, 'plantName' => $plantName, 'season' => $season, 'groundType' => $groundType, 'daysConservation' => $daysConservation, 'description' => $description, 'tblPlantSowing_idSowing' => $tblPlantSowing_idSowing, 'created_at' => $createdAt, 'updated_at' => $updatedAt);

        /*$problemAssociation = AssignProblem::where('tblPlant_idPlant', '=', $searchCondition)
        ->get();*/

        $problems = array($plant->plantProblems);

        //$favCondition = array_merge($plant->plantFavConditionDate, $plant->plantFavConditionNb);

        $favConditionDate = array($plant->plantFavConditionDate);

        $favConditionNb = array($plant->plantFavConditionNb);

        $favConditions = array_merge($favConditionDate, $favConditionNb);

        $package = array_merge($array, $problems, $favConditions);

        $json = json_encode($package);

        return $json;
        /*$problem = Problem::find($problemAssociation->idProblem);

        $idProblem = $problem->idProblem;
        $typeProblem = $problem->typeProblem;
        $importanceLvl = $problem->importanceLvl;
        $description = $problem->description;
        $createdAt = $problem->created_at;
        $updatedAt = $problem->updated_at;
        
        $array2 = array('idProblem' => $idProblem, 'typeProblem' => $typeProblem, 'importanceLvl' => $importanceLvl, 'description' => $description, 'created_at' => $createdAt, 'updated_at' => $updatedAt);
        $json2 = json_encode($array2);

        return ("$json $json2");

        // Laravel Doc Model
        // many to many*/
    }
}
