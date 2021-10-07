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
        try
        {
            $plant = Plant::find($id);    
        }
        catch (Exception)
        {
            return "The plant doesn't exsit or there is not connection with the database";
        }

        if (is_null($plant))
        {
            return "The plant doesn't exist";
        }

        $json = json_encode($plant);
        return ("$json");
    }

    public function searchAllPlant()
    {
        try
        {
            $plant = Plant::All();
        }
        catch (Exception)
        {
            return "There is no plant in the database or there is not connection with the database";
        }

        if (is_null($plant))
        {
            return "There is not plant in the database";
        }

        $json = json_encode($plant);

        return ("$json");
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function searchProblem($id)
    {
        try
        {
        $problem = Problem::find($id);
        }
        catch (Exception)
        {
            return "The problem doesn't exsit or there is not connection with the database";
        
        }

        if (is_null($problem))
        {
            return "The problem doesn't exist";
        }

        $json = json_encode($problem);
        return ("$json");
    }

    public function searchAllProblem()
    {
        try
        {
        $problem = Problem::All();
        }
        catch (Exception)
        {
            return "There is no problem in the database or there is not connection with the database";
        }
        if (is_null($problem))
        {
            return "There is no problem in the database";
        }

        $json = json_encode($problem);

        return ("$json");
    }

    public function indexProfile(Request $request)
    {
        return view('');
    }

    public function searchProfile($id)
    {
        try
        {
            $profile = Profile::find($id);
        }
        catch (Exception)
        {
            return "The profile doesn't exsit or there is not connection with the database";
        }

        if (is_null($profile))
        {
            return "The profile doesn't exist";
        }

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
        try
        {
            $profile = Profile::All();
        }
        catch (Exception)
        {
            return "There is not profile in the database or there is not connection with the database";
        }
        
        if (is_null($profile))
        {
            return "There is no profile in the database";
        }

        $json = json_encode($profile);

        return ("$json");
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function searchFavCondition($type, $id)
    {
        try
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
        }
        catch (Exception)
        {
            $json = "The condition doesn't exsit or there is not connection with the database";
        }
        if (is_null($favorableCondition))
        {
            return "The condition doesn't exist";
        }

        return $json;
    }

    public function searchAllFavCondition($type)
    {
        try
        {
        if ($type == 1)
        {
            $favCondition = FavorableConditionDate::All();

            $json = json_encode($favCondition);
        }
        else if ($type ==2)
        {
            $favCondition = FavorableConditionNb::All();

            $json = json_encode($favCondition);
        }
        }
        catch (Exception)
        {
            $json = "The condition doesn't exsit or there is not connection with the database";
        }
        if (is_null($favCondition))
        {
            return "There is no condition in the database";
        }

        return ("$json");
    }

    public function indexPackage()
    {
        return view('');
    }

    public function searchAllPackages(){
        try
        {
            $plants = Plant::All();
        }
        catch (Exception)
        {
            return "There is no plant and his data in the database or there is not connection with the database";
        }
        if (is_null($plants))
        {
            return "There is no plant in the database";
        }
        
        $jsons = array();
        for($i = 0; $i < count($plants); $i++){
            $json = ControllerDetail::searchPackage($plants[$i]->idPlant);
            array_push($jsons,json_decode($json));
        }
        return json_encode($jsons);
    }

    public function searchPackage($searchCondition)
    {
        try
        {
        $plant = Plant::find($searchCondition);
        }
        catch (Exception)
        {
            return "The plant doesn't exsit or there is not connection with the database";
        }
        if (is_null($plant))
        {
            return "The plant doesn't exist";
        }

        $json = json_encode($plant);
        $array = json_decode($json,true);

        try
        {
        $problems = array($plant->plantProblems);

        $favConditionDate = array($plant->plantFavConditionDate);

        $favConditionNb = array($plant->plantFavConditionNb);

        $favConditions = array_merge($favConditionDate, $favConditionNb);

        $package = array_merge($array, $problems, $favConditions);
        }
        catch (Exception)
        {
            return "Error while retrieving data in relation with the plant#$searchCondition";
        }

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

    public function searchAllPlantFamilies()
    {
        try
        {
        $families = Plant::select('plantFamily')->groupBy('plantFamily')->get();
        }
        catch (Exception)
        {
            return "Error while retrieving families or there is no plant in the database";
        }
        if (is_null($families))
        {
            return "There is not plant in the database";
        }

        $json = json_encode($families);

        return $json;
    }

    public function searchAllPlantDifficulties()
    {
        try
        {
        $difficulties = Plant::select('plantDifficulty')->groupBy('plantDifficulty')->get();
        }
        catch (Exception)
        {
            return "Error while retrieving difficulties or there is no plant in the database";
        }
        if (is_null($difficulties))
        {
            return "There is not plant in the database";
        }

        $json = json_encode($difficulties);

        return $json;
    }

    public function searchAllPlantTypes()
    {
        try
        {
        $types = Plant::select('plantType')->groupBy('plantType')->get();
        }
        catch (Exception)
        {
            return "Error while retrieving types or there is no plant in the database";
        }
        if (is_null($types))
        {
            return "There is not plant in the database";
        }

        $json = json_encode($types);

        return $json;
    }
}
