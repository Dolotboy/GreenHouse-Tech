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

class ControllerDelete extends Controller
{
    public function indexPlant()
    {
        return view('');
    }

    public function deletePlant($idPlant)
    {
        if (is_null($idPlant))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $plant = Plant::Find($idPlant);
        }
        catch (Exception)
        {
            return "The plant doesn't exist or there is no connection with the database";
        }

        if (is_null($plant))
        {
            return('Error, plant not found');
        }
        else
        {
            try
            {
                Plant::destroy($idPlant);
                Controller::incrementVersion();
                return ("Plant deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting or there is no connection with the database'.$e);
            }
        }
    }

    public function indexProblem()
    {
        return view('');
    }

    public function deleteProblem($idProblem)
    {
        if (is_null($idProblem))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $problem = Problem::Find($idProblem);
        }
        catch (Exception)
        {
            return "The problem doesn't exist or there is no connection with the database";
        }

        if (is_null($problem))
        {
            return('Error, problem not found');
        }
        else
        {
            try
            {
                Problem::destroy($idProblem);
                Controller::incrementVersion();
                return ("Problem deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting or there is no connection with the database'.$e);
            }
        }
    }

    public function indexFavorite()
    {
        return view('');
    }

    public function deleteFavorite($idPlant, $idProfile)
    {
        if (is_null($idPlant) ||
            is_null($idProfile))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $favorite = Favorite::where('tblPlant_idPlant', '=', $idPlant)
            ->where('tblProfile_idProfile', '=', $idProfile)
            ->get();
        }
        catch (Exception)
        {
            return "The favorite doesn't exist or there is no connection with the database";
        }

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
                Controller::incrementVersion();
                return ("Favorite deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting or there is no connection with the database'.$e);
            }
        }
    }

    public function indexProfile()
    {
        return view('');
    }

    public function deleteProfile($idProfile)
    {
        if (is_null($idProfile))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        try
        {
            $profile = Problem::Find($idProfile);
        }
        catch (Exception)
        {
            return "The profile doesn't exist or there is no connection with the database";
        }

        if (is_null($profile))
        {
            return('Error, profile not found');
        }
        else
        {
            try
            {
                Profile::destroy($idProfile);
                Controller::incrementVersion();
                return ("Profile deleted !");
            }
            catch(Exception $e)
            {
                return('Error while deleting or there is no connection with the database'.$e);
            }
        }
    }

    public function indexFavCondition()
    {
        return view('');
    }

    public function deleteFavCondition($type, $idCondition)
    {
        if (is_null($type) ||
            is_null($idCondition))
        {
            return new Response("One of the field is empty, you must fill them all or the field's name aren't right", 400);
        }

        if ($type == 1)
        {
            try
            {
                $favorableCondition = FavorableConditionDate::Find($idCondition);
            }
            catch (Exception)
            {
                return "The condition doesn't exist or there is no connection with the database";
            }

            if (is_null($idCondition))
            {
                return('Error, favorable condition not found');
            }
            else
            {
                try
                {
                    FavorableConditionDate::destroy($idCondition);
                    Controller::incrementVersion();
                    return ("Favorable condition deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting or there is no connection with the database'.$e);
                }
            }
        }
        else if ($type == 2)
        {
            try
            {
                $favorableCondition = FavorableConditionNb::Find($idCondition);
            }
            catch (Exception)
            {
                return "The condition doesn't exist or there is no connection with the database";
            }

            if (is_null($idCondition))
            {
                return('Error, favorable condition not found');
            }
            else
            {
                try
                {
                    FavorableConditionNb::destroy($idCondition);
                    Controller::incrementVersion();
                    return ("Favorable condition deleted !");
                }
                catch(Exception $e)
                {
                    return('Error while deleting or there is no connection with the database'.$e);
                }
            }
        }
    }
} 
