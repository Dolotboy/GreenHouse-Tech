<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\Family;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\AccountModified;

class ControllerEdit extends Controller
{
    public function indexPlant(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchPlant');
    }

    public function indexFamily(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchFamily');
    }

    public function indexProblem(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchProblem');
    }

    public function indexProfile(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchProfile');
    }

    public function indexFavCondDate(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchFavCondDate');
    }

    public function indexFavCondNb(Request $request, $lang)
    {
        App::setLocale($lang);
        return view('searchFavCondNb');
    }

    public function editPlant(Request $request, $lang, $idPlant)
    {
        try
        {
            $plant = Plant::find($idPlant);    
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        try
        {
            $family = Family::All();
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "There is no family or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        
        if (is_null($plant)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, plant not found", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }

        App::setLocale($lang);
        return view('editPlant', ["plant" => $plant, "family" => $family]);
    }

    public function editPlantSent(Request $request, $idPlant)
    {
        if (is_null($request->plantImg) || 
        is_null($request->plantName) || 
        is_null($request->plantType) || 
        is_null($request->plantFamily) || 
        is_null($request->plantSeason) || 
        is_null($request->plantGroundType) || 
        is_null($request->plantDaysConservation) || 
        is_null($request->plantDescription) || 
        is_null($request->plantDifficulty) || 
        is_null($request->plantBestNeighbor) ||
        is_null($idPlant))
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
 
        $plant->plantImg = $request->plantImg;
        $plant->plantName = $request->plantName;
        $plant->plantType = $request->plantType;
        $plant->plantFamily = $request->plantFamily;
        $plant->plantSeason = $request->plantSeason;
        $plant->plantGroundType = $request->plantGroundType;
        $plant->plantDaysConservation = $request->plantDaysConservation;
        $plant->plantDescription = $request->plantDescription;
        $plant->plantDifficulty = $request->plantDifficulty;
        $plant->plantBestNeighbor = $request->plantBestNeighbor; 

        try
        {
            $plant->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idPlant], 200);
    }

    public function editFamily(Request $request, $lang, $idFamily)
    {
        try
        {
            $family = Family::find($idFamily);    
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The family doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idFamily], 400);
        }
        
        if (is_null($family)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, family not found", 'success' => false, 'status' => "Request Failed", 'id' => $idFamily], 404);
        }

        App::setLocale($lang);
        return view('editFamily', ["family" => $family]);
    }

    public function editFamilySent(Request $request, $idFamily)
    {
        if (is_null($request->familyName) || 
            is_null($idFamily))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idFamily], 400);
        }

        try
        {
            $family = Family::find($idFamily);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idFamily], 400);
        }
 
        $family->familyName = $request->familyName;

        try
        {
            $family->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idFamily], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idFamily], 200);
    }

    public function editProblem(Request $request, $lang, $idProblem)
    {
        try
        {
            $problem = Problem::find($idProblem);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The problem doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        if (is_null($problem)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, problem not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 404);
        }

        App::setLocale($lang);
        return view('editProblem', ["problem" => $problem]);
    }

    public function editProblemSent(Request $request, $idProblem)
    {
        if (is_null($request->problemName) || 
            is_null($request->problemType) || 
            is_null($request->problemSolution) ||
            is_null($idProblem))
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

        $problem->problemName = $request->problemName;
        $problem->problemType = $request->problemType;
        $problem->problemSolution = $request->problemSolution;

        try
        {
            $problem->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProblem], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }


    }

    public function editProfile(Request $request, $lang, $idProfile)
    {
        try
        {
            $profile = Profile::find($idProfile);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if (is_null($profile)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, profile not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
        }

        App::setLocale($lang);
        return view('editProfile', ["profile" => $profile]);
    }

    public function editProfileSent(Request $request, $idProfile)
    {
        if (is_null($request->email) || 
            is_null($request->firstName) || 
            is_null($request->lastName) ||
            is_null($idProfile))
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

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;

        try
        {
            $profile->save();
            Controller::incrementVersion();
            //Mail::to($profile->email)->send(new AccountModified($profile)); /*->cc("exemple@gmail.com")*/
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProfile], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }
    }

    public function editProfileSentToken($unusedParameter, Request $request, $idProfile)
    {
        if (is_null($request->email) || 
            is_null($request->firstName) || 
            is_null($request->lastName) ||
            is_null($idProfile))
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

        $profile->email = $request->email;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;

        try
        {
            $profile->save();
            Controller::incrementVersion();
            //Mail::to($profile->email)->send(new AccountModified($profile)); /*->cc("exemple@gmail.com")*/
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProfile], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }
    }

    public function editFavCondDate(Request $request, $lang, $idCondition)
    {
        try
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        App::setLocale($lang);
        return view('editFavCondDate', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondDateSent(Request $request, $idCondition)
    {
        if (is_null($request->type) || 
            is_null($request->start) || 
            is_null($request->end) || 
            is_null($request->location) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            $favorableCondition = FavorableConditionDate::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        $favorableCondition->type = $request->input("type");
        $favorableCondition->start = $request->input("start");
        $favorableCondition->end = $request->input("end");
        $favorableCondition->location = $request->input("location");

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idCondition], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }
    }

    public function editFavCondNb(Request $request, $lang, $idCondition)
    {
        try
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition)) // Mostly when it doesn't exist
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        App::setLocale($lang);
        return view('editFavCondNb', ["favorableCondition" => $favorableCondition]);
    }

    public function editFavCondNbSent(Request $request,$idCondition)
    {
        if (is_null($request->type) || 
            is_null($request->min) || 
            is_null($request->max) || 
            is_null($request->unit) ||
            is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            $favorableCondition = FavorableConditionNb::find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($favorableCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        $favorableCondition->type = $request->input("type");
        $favorableCondition->min = $request->input("min");
        $favorableCondition->max = $request->input("max");
        $favorableCondition->unit = $request->input("unit");

        try
        {
            $favorableCondition->save();
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idCondition], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }
    }

    public function indexAddAdmin($lang)
    {
        App::setLocale($lang);
        return view('assignAdmin');
    }

    public function addAdmin(Request $request, $idProfile)
    {
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

        $profile->access = "admin";

        try
        {
            $profile->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $profile->idProfile], 200);
    }

    public function indexRemoveAdmin($lang)
    {
        App::setLocale($lang);
        return view('unassignAdmin');
    }

    public function removeAdmin(Request $request, $idProfile)
    {
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

        $profile->access = "user";

        try
        {
            $profile->save();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        Controller::incrementVersion();

        return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $profile->idProfile], 200);
    }
} 
