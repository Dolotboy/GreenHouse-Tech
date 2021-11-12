<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Problem;
use App\Models\FavorableConditionDate;
use App\Models\FavorableConditionNb;
use App\Models\Favorite;
use App\Models\Profile;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; 
use App\Mail\AccountDeleted; 

class ControllerDelete extends Controller
{
    public function indexPlant()
    { 
        return view('deleteSearchPlant');
    }

    public function deletePlant($idPlant)
    {
        if (is_null($idPlant))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The plant doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
        }

        if (is_null($plant))
        {
            return response()->json(['message'=> "Error, plant not found", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 404);
        }
            try
            {
                DB::table('tblPlant_tblProblem')->where('tblPlant_idPlant', $idPlant)->delete();
                DB::table('tblPlant_tblRangeDate')->where('tblPlant_idPlant', $idPlant)->delete();
                DB::table('tblPlant_tblRangeNb')->where('tblPlant_idPlant', $idPlant)->delete();
                DB::table('tblFavorites')->where('tblPlant_idPlant', $idPlant)->delete();
            }
            catch (Exception $e)
            {
                return response()->json(['message'=> "Error while deleting data in relation with the plant#$idPlant", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
            }

            try
            {
                Plant::destroy($idPlant);
                Controller::incrementVersion();
                return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idPlant], 200);
            }
            catch(Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idPlant], 400);
            }
    }

    public function indexProblem()
    {
        return view('deleteSearchProblem');
    }

    public function deleteProblem($idProblem)
    {
        if (is_null($idProblem))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        try
        {
            $problem = Problem::Find($idProblem);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The problem doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
        }

        if (is_null($problem))
        {
            return response()->json(['message'=> "Error, problem not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 404);
        }
        else
        {
            try
            {
                DB::table('tblPlant_tblProblem')->where('tblProblem_idProblem', $idProblem)->delete();
            }
            catch (Exception $e)
            {
                return response()->json(['message'=> "Error while deleting data in relation with the problem#$idProblem", 'success' => false, 'status' => "Request Failed", 'id' => $idProblem], 400);
            }

            try
            {
                Problem::destroy($idProblem);
                Controller::incrementVersion();
                return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
            }
            catch(Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
            }
        }
    }

    public function indexFavorite()
    {
        return view('deleteSearchFavorite');
    }

    public function deleteFavorite($idPlant, $unUsedParameter, $idProfile)
    {
        if (is_null($idPlant) ||
            is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }

        try
        {
            $favorite = Favorite::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblProfile_idProfile', '=', $idProfile)
            ->get();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The favorite doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 400);
        }

        if (is_null($favorite))
        {
            return response()->json(['message'=> "Error, favorite not found", 'success' => false, 'status' => "Request Failed", 'id' => "Plant: $idPlant / Profile: $idProfile"], 404);
        }
        else
        {
            try
            {
                Favorite::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblProfile_idProfile', '=', $idProfile],
                ])->delete();
                Controller::incrementVersion();
                return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => "Plant: $idPlant / Profile: $idProfile"], 200);
            }
            catch(Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
            }
        }
    }

    public function indexProfile()
    {
        return view('deleteSearchProfile');
    }

    public function deleteProfile(Request $request, $idProfile)
    {
        if (is_null($idProfile))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        try
        {
            $profile = Profile::Find($idProfile);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The profile doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
        }

        if (is_null($profile))
        {
            return response()->json(['message'=> "Error, profile not found", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 404);
        }
        else
        {
            try
            {
                DB::table('tblFavorites')->where('tblProfile_idProfile', $idProfile)->delete();
            }
            catch (Exception $e)
            {
                return response()->json(['message'=> "Error while deleting data in relation with the profile#$idProfile", 'success' => false, 'status' => "Request Failed", 'id' => $idProfile], 400);
            }

            try
            {
                Profile::destroy($idProfile);
                Controller::incrementVersion();
                Mail::to($profile->email)->send(new AccountDeleted($profile)); /*->cc("exemple@gmail.com")*/
                return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => $idProfile], 200);
            }
            catch(Exception $e)
            {
                return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
            }
        }
    }

    public function indexFavCondition()
    {
        return view('deleteSearchFavCondition');
    }

    public function deleteFavConditionDate($idCondition)
    {
        if (is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            $favorableCondition = FavorableConditionDate::Find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($idCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        try
        {
            DB::table('tblPlant_tblRangeDate')->where('tblRangeDate_idRangeDate', $idCondition)->delete();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while deleting data in relation with the condition#$idCondition", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            FavorableConditionDate::destroy($idCondition);
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);

        }
    }

    public function deleteFavConditionNb($idCondition)
    {
        if (is_null($idCondition))
        {
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }
        
        try
        {
            $favorableCondition = FavorableConditionNb::Find($idCondition);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "The condition doesn't exist or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        if (is_null($idCondition))
        {
            return response()->json(['message'=> "Error, condition not found", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 404);
        }

        try
        {
            DB::table('tblPlant_tblRangeNb')->where('tblRangeNb_idRangeNb', $idCondition)->delete();
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Error while deleting data in relation with the condition#$idCondition", 'success' => false, 'status' => "Request Failed", 'id' => $idCondition], 400);
        }

        try
        {
            FavorableConditionNb::destroy($idCondition);
            Controller::incrementVersion();
            return response()->json(['message'=> "Everything worked good !", 'success' => true, 'status' => "Request successfull", 'id' => null], 200);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> "We've encountered problems while deleting data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }  
    }
}
