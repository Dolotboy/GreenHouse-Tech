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

class ControllerDelete extends Controller
{
<<<<<<< HEAD
    public function indexPlant(Request $request)
    {
        return view('deletePlant');        
=======
    public function indexPlant()
    {
        return view('');
    }

    public function deletePlant($idPlant)
    {
        $plant = Plant::Find($idPlant);

        if (is_null($plant))
        {
            return('Error, assignation not found');
        }
        else
        {
            try
            {
                Plant::destroy($idPlant);
                return ("Plant deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

    public function indexProblem()
    {
        return view('');
    }

    public function deleteProblem($idProblem)
    {
        $problem = Problem::Find($idProblem);

        if (is_null($problem))
        {
            return('Error, problem not found');
        }
        else
        {
            try
            {
                Problem::destroy($idProblem);
                return ("Problem deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

    public function indexFavorite()
    {
        return view('');
    }

    public function deleteFavorite($idPlant, $idProfile)
    {
        $favorite = Favorite::where('tblPlant_idPlant', '=', $idPlant)
        ->where('tblProfile_idProfile', '=', $idProfile)
        ->get();

        if (is_null($favorite))
        {
            return('Error, favorite not found');
        }
        else
        {
            try
            {
                Favorite::where([
                    ['tblPlant_idPlant', '=', $idPlant],
                    ['tblProfile_idProfile', '=', $idProfile],
                ])->delete();
                //AssignProblem::destroy([$idPlant, $idProblem]);
                return ("Favorite deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

    public function indexProfile()
    {
        return view('');
    }

    public function deleteProfile($idProfile)
    {
        $profile = Problem::Find($idProfile);

        if (is_null($profile))
        {
            return('Error, profile not found');
        }
        else
        {
            try
            {
                Profile::destroy($idProfile);
                return ("Profile deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting'.$e);
            }
        }
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function deleteFavCondition($type, $idCondition)
    {
        if ($type == 1)
        {
            $favorableCondition = FavorableConditionDate::Find($idCondition);

            if (is_null($idCondition))
            {
                return('Error, favorable condition not found');
            }
            else
            {
                try
                {
                    FavorableConditionDate::destroy($idCondition);
                    return ("Favorable condition deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting'.$e);
                }
            }
        }
        else if ($type == 2)
        {
            $favorableCondition = FavorableConditionNb::Find($idCondition);

            if (is_null($idCondition))
            {
                return('Error, favorable condition not found');
            }
            else
            {
                try
                {
                    FavorableConditionNb::destroy($idCondition);
                    return ("Favorable condition deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting'.$e);
                }
            }
        }
>>>>>>> adc715fea949d1df4a734de66b843c7f179a764f
    }
} 
