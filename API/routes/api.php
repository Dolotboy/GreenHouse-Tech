<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// ***************** PLANT *******************

Route::post('/new/plant/addPlant', [ControllerAdd::class, 'addPlant'])->name('addPlant');

Route::post('/edit/plant/editPlant', [ControllerEdit::class, 'EditPlant'])->name('editPlant');

Route::get("search/plant/{id}", [ControllerDetail::class, 'searchPlant'],function ($id){})->name('detailPlant');

Route::get("/delete/plant/{id}", [ControllerDelete::class, 'deletePlant'],function ($id){})->name('deletePlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');

Route::post('/edit/problem/editProblem', [ControllerEdit::class, 'EditProblem'])->name('editProblem');

Route::get("search/problem/{id}", [ControllerDetail::class, 'searchProblem'],function ($id){})->name('detailProblem');

Route::get("/delete/problem/{id}", [ControllerDelete::class, 'deleteProblem'],function ($id){})->name('deleteProblem');

Route::get('/assign/problem/{id}', [ControllerAssign::class, 'assignProblem'],function ($id){})->name('assignProblem');

Route::get('/unassign/problem/{id}', [ControllerUnassign::class, 'unassignProblem'],function ($id){})->name('unassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite/addFavorite', [ControllerAdd::class, 'addFavorite'])->name('addFavorite');

Route::get("/delete/favorite/{id}", [ControllerDelete::class, 'deleteFavorite'],function ($id){})->name('deleteFavorite');

// ***************** FAVORITE *******************

// ***************** PROFIL *******************

Route::post('/new/profil/addProfil', [ControllerAdd::class, 'addProfil'])->name('addProfil');

Route::post('/edit/profil/editVegetable', [ControllerEdit::class, 'EditProfil'])->name('editProfil');

Route::get("search/profil/{id}", [ControllerDetail::class, 'searchProfil'],function ($id){})->name('detailProfil');

Route::get("/delete/profil/{id}", [ControllerDelete::class, 'deleteProfil'],function ($id){})->name('deleteProfil');

// ***************** PROFIL *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition/addFavCondition', [ControllerAdd::class, 'addFavCondition'])->name('addFavCondition');

Route::post('/edit/condition/editFavCondition', [ControllerEdit::class, 'EditFavCondition'])->name('editFavCondition');

Route::get("search/condition/{id}", [ControllerDetail::class, 'searchFavCondition'],function ($id){})->name('detailFavCondition');

Route::get("/delete/condition/{id}", [ControllerDelete::class, 'deleteFavCondition'],function ($id){})->name('deleteFavCondition');

Route::get('/assign/condition/{id}', [ControllerAssign::class, 'assignFavCondition'],function ($id){})->name('assignFavCondition');

Route::get('/unassign/condition/{id}', [ControllerUnassign::class, 'unassignFavCondition'],function ($id){})->name('unassignFavCondition');

// ***************** FAVORABLE CONDITION *******************
