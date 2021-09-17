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
}
