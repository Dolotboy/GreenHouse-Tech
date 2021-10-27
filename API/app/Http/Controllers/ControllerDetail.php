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
use Illuminate\Http\Response;

class ControllerDetail extends Controller
{
    public function indexPlant(Request $request)
    {
        $data = Plant::all();
        
        //return view('searchPlantTest',["plant" =­­­> $data]);
        return view('searchPlantTest',["plant" => $data]);
    }

    public function searchPlant($idPlant)
    {
        if (is_null($idPlant))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        try
        {
            $plant = Plant::find($idPlant);    
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if (is_null($plant)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, plant not found", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "There is no plant or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        if (is_null($plant))
        {
            return response()->json(['message'=> "Error, plants not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }

        $json = json_encode($plant);

        return ("$json");
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function searchProblem($idProblem)
    {
        if (is_null($idProblem))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        try
        {
        $problem = Problem::find($idProblem);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The problem doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        if (is_null($problem))
        {
            return response()->json(['message'=> "Error, problem not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "There is no problem or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        if (is_null($problem))
        {
            return response()->json(['message'=> "Error, problems not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }

        $json = json_encode($problem);

        return ("$json");
    }

    public function indexProfile(Request $request)
    {
        return view('');
    }

    public function searchProfile($idProfile)
    {
        if (is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        try
        {
            $profile = Profile::find($idProfile);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if (is_null($profile))
        {
            return response()->json(['message'=> "Error, profile not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "There is no profile or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        
        if (is_null($profile))
        {    
            return response()->json(['message'=> "Error, profiles not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }

        $json = json_encode($profile);

        return ("$json");
    }

    public function indexFavCondDate(Request $request)
    {
        return view('searchFavCondDate');
    }

    public function searchFavCondition($type, $idCondition)
    {
        if (is_null($type) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
        if ($type == 1)
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);
            $json = json_encode($favorableCondition);
        }
        else if($type == 2)
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);
            $json = json_encode($favorableCondition);
        }
        }
        catch (Exception $e)
        { 
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        return $json;
    }

    public function searchAllFavCondition($type)
    {
        if (is_null($type))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

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
        catch (Exception $e)
        {
            return response()->json(['message'=> "There is no condition or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        if (is_null($favCondition))
        {
            return response()->json(['message'=> "Error, conditions not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "There is no plants or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        if (is_null($plants))
        {
            return response()->json(['message'=> "Error, plants not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
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
        if (is_null($searchCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $searchCondition], 400);
        }

        try
        {
        $plant = Plant::find($searchCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        if (is_null($plant))
        {
            return response()->json(['message'=> "Error, plant not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while retrieving data in relation with the plant#$searchCondition", 'success' => false, 'status' => "Request Failed", 'id' => $searchCondition], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while retrieving families or there is no plant in the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
        if (is_null($families))
        {
            return response()->json(['message'=> "Error, plants not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while retrieving difficulties or there is no plant in the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
        if (is_null($difficulties))
        {
            return response()->json(['message'=> "Error, plants not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
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
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while retrieving types or there is no plant in the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }
        if (is_null($types))
        {
            return response()->json(['message'=> "Error, plants not found", 'success' => false, 'status' => "Request Failed", 'id' => null], 404);
        }

        $json = json_encode($types);

        return $json;
    }

    public function thanus()
    {
        return "<!DOCTYPE html>
        <html>
            <head>
                <title>THANUS 4 EVER</title>
            </head>
        <body style='display: flex; align-item: center; justify-content: center; flex-direction: column;'>
            <h1>Thanus Premier du nom</h1>
            <img src='https://www.shitpostbot.com/resize/585/400?img=%2Fimg%2Fsourceimages%2Fthanos-ass-5b0446183be21.jpeg' style='width: 500px; height: 500px;'></img>
            
            <h1>Capitaine Emasculus Troisième du nom fils de Thanus</h1>
            <img src='https://img-9gag-fun.9cache.com/photo/aeMZbrv_700bwp.webp' style='width: 500px; height: 500px;'></img>
        </body>
        </html>";
    }
}
