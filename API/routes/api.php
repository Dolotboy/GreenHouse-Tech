<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;
use App\Http\Controllers\ControllerAssign;
use App\Http\Controllers\ControllerUnassign;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// ***************** PLANT *******************

Route::post('/new/plant/addPlant', [ControllerAdd::class, 'addPlant'])->name('addPlant');

Route::put('/edit/plant/editPlant', [ControllerEdit::class, 'editPlant'])->name('editPlant');

Route::get("search/plant/{id}", [ControllerDetail::class, 'searchPlant'],function ($id){})->name('detailPlant');

Route::delete("/delete/plant/{id}", [ControllerDelete::class, 'deletePlant'],function ($id){})->name('deletePlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');

Route::put('/edit/problem/editProblem', [ControllerEdit::class, 'editProblem'])->name('editProblem');

Route::get("search/problem/{id}", [ControllerDetail::class, 'searchProblem'],function ($id){})->name('detailProblem');

Route::delete("/delete/problem/{id}", [ControllerDelete::class, 'deleteProblem'],function ($id){})->name('deleteProblem');

Route::post('/assign/problem/{idPlant}/{idProblem}', [ControllerAssign::class, 'assignProblem'],function ($idPlant, $idProblem){})->name('assignProblem');

Route::delete('/unassign/problem/{idPlant}/{idProblem}', [ControllerUnassign::class, 'unassignProblem'],function ($idPlant, $idProblem){})->name('unassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite');

Route::delete("/delete/favorite/{id}", [ControllerDelete::class, 'deleteFavorite'],function ($id){})->name('deleteFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::post('/new/profile/addProfile', [ControllerAdd::class, 'addProfile'])->name('addProfile');

Route::put('/edit/profile/editVegetable', [ControllerEdit::class, 'editProfile'])->name('editProfile');

Route::get("search/profile/{id}", [ControllerDetail::class, 'searchProfile'],function ($id){})->name('detailProfile');

Route::delete("/delete/profile/{id}", [ControllerDelete::class, 'deleteProfile'],function ($id){})->name('deleteProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition/addFavCondition/{type}', [ControllerAdd::class, 'addFavCondition'],function ($type){})->name('addFavCondition');

Route::put('/edit/condition/editFavCondition', [ControllerEdit::class, 'editFavCondition'])->name('editFavCondition');

Route::get("search/condition/{type}/{id}", [ControllerDetail::class, 'searchFavCondition'],function ($type, $id){})->name('detailFavCondition');

Route::delete("/delete/condition/{id}", [ControllerDelete::class, 'deleteFavCondition'],function ($id){})->name('deleteFavCondition');

Route::post('/assign/condition/{type}/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavCondition'],function ($type, $idPlant, $idCondition){})->name('assignFavCondition');

Route::delete('/unassign/condition/{type}/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondition'],function ($type, $idPlant, $idCondition){})->name('unassignFavCondition');

// ***************** FAVORABLE CONDITION *******************
