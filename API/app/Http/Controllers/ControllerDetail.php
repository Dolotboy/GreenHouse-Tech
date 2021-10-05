<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\AssignProblem;
use App\Models\Version;
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
        $json = json_encode($problem);
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
            $json = json_encode($favorableCondition);
        }
        else if($type == 2)
        {
            $favorableCondition = FavorableConditionNb::find($id);
            $json = json_encode($favorableCondition);
        }
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

    public function searchAllPackages(){
        $plants = Plant::All();
        $jsons = array();
        for($i = 0; $i < count($plants); $i++){
            $json = ControllerDetail::searchPackage($plants[$i]->idPlant);
            array_push($jsons,json_decode($json));
        }
        return json_encode($jsons);
    }

    public function searchPackage($searchCondition)
    {
        $plant = Plant::find($searchCondition);
        $json = json_encode($plant);
        $array = json_decode($json,true);

        $problems = array($plant->plantProblems);

        $favConditionDate = array($plant->plantFavConditionDate);

        $favConditionNb = array($plant->plantFavConditionNb);

        $favConditions = array_merge($favConditionDate, $favConditionNb);

        $package = array_merge($array, $problems, $favConditions);

        $json = json_encode($package);
        $json = str_replace("\"0\":[", "\"problems\":[", $json);
        $json = str_replace("\"1\":[", "\"favorableConditionDate\":[", $json);
        $json = str_replace("\"2\":[", "\"favorableConditions\":[", $json);

        return $json;
    }

    public function indexVersion()
    {
        return view('');
    }

    public function searchAllFamilies()
    {
        $families = Plant::select('plantFamily')->groupBy('plantFamily')->get();

        $json = json_encode($families);

        return $json;
    }
}
