<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerEdit extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('editPlant');
        /* value="{{ $produit["namePlant"] }}" */
    }

    public function indexProblem(Request $request)
    {
        return view('editSearchProblem');
    }

    public function indexProfile(Request $request)
    {
        return view('editSearchProfile');
    }

    public function indexFavCondition(Request $request)
    {
        return view('editSearchFavCondition');
    }

}
