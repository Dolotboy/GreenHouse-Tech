<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDelete extends Controller
{
    public function indexPlant(Request $request)
    {
        return view('deletePlant');        
    }
} 
