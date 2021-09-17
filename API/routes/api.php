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

Route::put('/edit/plant/editPlant/{idPlant}', [ControllerEdit::class, 'editPlant'],function ($idPlant){})->name('editPlant');

//Route::middleware(['cors'])->group(function () { Route::get("search/plant/{id}", [ControllerDetail::class, 'searchPlant'],function ($id){})->name('detailPlant'); });

Route::get("search/plant/{id}", [ControllerDetail::class, 'searchPlant'],function ($id){})->name('detailPlant');

Route::get("searchAll/plant", [ControllerDetail::class, 'searchAllPlant'],function (){})->name('detailAllPlant');

Route::delete("/delete/plant/{id}", [ControllerDelete::class, 'deletePlant'],function ($id){})->name('deletePlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');

Route::put('/edit/problem/editProblem/{idProblem}', [ControllerEdit::class, 'editProblem'],function ($idProblem){})->name('editProblem');

Route::get("search/problem/{id}", [ControllerDetail::class, 'searchProblem'],function ($id){})->name('detailProblem');

Route::get("searchAll/problem", [ControllerDetail::class, 'searchAllProblem'],function (){})->name('detailAllProblem');

Route::delete("/delete/problem/{id}", [ControllerDelete::class, 'deleteProblem'],function ($id){})->name('deleteProblem');

Route::post('/assign/problem/{idPlant}/{idProblem}', [ControllerAssign::class, 'assignProblem'],function ($idPlant, $idProblem){})->name('assignProblem');

Route::delete('/unassign/problem/{idPlant}/{idProblem}', [ControllerUnassign::class, 'unassignProblem'],function ($idPlant, $idProblem){})->name('unassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite');

Route::delete("/delete/favorite/{idPlant}/{idProfile}", [ControllerDelete::class, 'deleteFavorite'],function ($idPlant, $idProfile){})->name('deleteFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::post('/new/profile/addProfile', [ControllerAdd::class, 'addProfile'])->name('addProfile');

Route::put('/edit/profile/editProfile/{idProfile}', [ControllerEdit::class, 'editProfile'],function ($idProfile){})->name('editProfile');

Route::get("search/profile/{id}", [ControllerDetail::class, 'searchProfile'],function ($id){})->name('detailProfile');

Route::get("searchAll/profile", [ControllerDetail::class, 'searchAllProfile'],function (){})->name('detailAllProfile');

Route::delete("/delete/profile/{id}", [ControllerDelete::class, 'deleteProfile'],function ($id){})->name('deleteProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition/addFavCondition/{type}', [ControllerAdd::class, 'addFavCondition'],function ($type){})->name('addFavCondition');

Route::put('/edit/condition/editFavCondition/{type}/{idCondition}', [ControllerEdit::class, 'editFavCondition'],function ($type, $idCondition){})->name('editFavCondition');

Route::get("search/condition/{type}/{idCondition}", [ControllerDetail::class, 'searchFavCondition'],function ($type, $idCondition){})->name('detailFavCondition');

Route::get("searchAll/condition/{type}", [ControllerDetail::class, 'searchAllFavCondition'],function ($type){})->name('detailAllFavCondition');

Route::delete("/delete/condition/{type}/{idCondition}", [ControllerDelete::class, 'deleteFavCondition'],function ($type, $idCondition){})->name('deleteFavCondition');

Route::post('/assign/condition/{type}/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavCondition'],function ($type, $idPlant, $idCondition){})->name('assignFavCondition');

Route::delete('/unassign/condition/{type}/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondition'],function ($type, $idPlant, $idCondition){})->name('unassignFavCondition');

// ***************** FAVORABLE CONDITION *******************
