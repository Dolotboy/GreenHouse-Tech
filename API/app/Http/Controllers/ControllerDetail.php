<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDetail extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('searchPlant');
    }

    public function searchPlant(Request $request)
    {
    }

    public function indexProblem(Request $request)
    {
        return view('');
    }

    public function searchProblem(Request $request)
    {
    }

    public function indexProfile(Request $request)
    {
        return view('');
    }

    public function searchProfile(Request $request)
    {
    }

    public function indexFavCondition(Request $request)
    {
        return view('');
    }

    public function searchFavCondition(Request $request)
    {
    }
}
