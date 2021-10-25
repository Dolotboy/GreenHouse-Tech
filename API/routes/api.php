<?php

use App\Http\Controllers\Controller;
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
Route::get('/new/plant/addPlant', [ControllerAdd::class, 'addPlant'])->name('addPlant');    
Route::post('/new/plant/addPlant', [ControllerAdd::class, 'addPlant'])->name('addPlant');

Route::post('/edit/plant/editPlant/{idPlant}', [ControllerEdit::class, 'editPlantTest'],function ($idPlant){})->name('editPlantSent');
Route::get('/edit/plant/editPlant/{idPlant}', [ControllerEdit::class, 'editPlant'],function ($idPlant){})->name('editPlant');

Route::get("search/plant/{idPlant}", [ControllerDetail::class, 'searchPlant'],function ($idPlant){})->name('detailPlant');

Route::get("searchAll/plant", [ControllerDetail::class, 'searchAllPlant'],function (){})->name('detailAllPlant');

Route::delete("/delete/plant/{idPlant}", [ControllerDelete::class, 'deletePlant'],function ($idPlant){})->name('deletePlantApi');
Route::get("/delete/plant/{idPlant}", [ControllerDelete::class, 'deletePlant'],function ($idPlant){})->name('deletePlantApi');

Route::get("searchAll/plant/families", [ControllerDetail::class, 'searchAllFamilies'],function (){})->name('searchAllFamilies');

Route::get("searchAll/plant/difficulties", [ControllerDetail::class, 'searchAllDifficulties'],function (){})->name('searchAllDifficulties');

// ***************** PLANT *******************

// ***************** PROBLEM *******************
Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');
Route::get('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');

Route::post('/edit/problem/editProblem/{idProblem}', [ControllerEdit::class, 'editProblemTest'],function ($idProblem){})->name('editProblemSent');
Route::get('/edit/problem/editProblem/{idProblem}', [ControllerEdit::class, 'editProblem'],function ($idProblem){})->name('editProblem');

Route::get("search/problem/{idProblem}", [ControllerDetail::class, 'searchProblem'],function ($idProblem){})->name('detailProblem');

Route::get("searchAll/problem", [ControllerDetail::class, 'searchAllProblem'],function (){})->name('detailAllProblem');

Route::delete("/delete/problem/{idProblem}", [ControllerDelete::class, 'deleteProblem'],function ($idProblem){})->name('deleteProblem');
Route::get("/delete/problem/{idProblem}", [ControllerDelete::class, 'deleteProblem'],function ($idProblem){})->name('deleteProblem');

Route::post('/assign/problem/{idPlant}/{idProblem}', [ControllerAssign::class, 'assignProblem'],function ($idPlant, $idProblem){})->name('assignProblem');
Route::get('/assign/problem/{idPlant}/{idProblem}', [ControllerAssign::class, 'assignProblem'],function ($idPlant, $idProblem){})->name('assignProblem');

Route::delete('/unassign/problem/{idPlant}/{idProblem}', [ControllerUnassign::class, 'unassignProblem'],function ($idPlant, $idProblem){})->name('unassignProblem');
Route::get('/unassign/problem/{idPlant}/{idProblem}', [ControllerUnassign::class, 'unassignProblem'],function ($idPlant, $idProblem){})->name('unassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite');
Route::get('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite');

Route::delete("/delete/favorite/{idPlant}/{idProfile}", [ControllerDelete::class, 'deleteFavorite'],function ($idPlant, $idProfile){})->name('deleteFavorite');
Route::get("/delete/favorite/{idPlant}/{idProfile}", [ControllerDelete::class, 'deleteFavorite'],function ($idPlant, $idProfile){})->name('deleteFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::post('/new/profile/addProfile', [ControllerAdd::class, 'addProfile'])->name('addProfile');
Route::get('/new/profile/addProfile', [ControllerAdd::class, 'addProfile'])->name('addProfile');

Route::post('/edit/profile/editProfile/{idProfile}', [ControllerEdit::class, 'editProfileTest'],function ($idProfile){})->name('editProfileSent');
Route::get('/edit/profile/editProfile/{idProfile}', [ControllerEdit::class, 'editProfile'],function ($idProfile){})->name('editProfile');

Route::get("search/profile/{idProfile}", [ControllerDetail::class, 'searchProfile'],function ($idProfile){})->name('detailProfile');

Route::get("searchAll/profile", [ControllerDetail::class, 'searchAllProfile'],function (){})->name('detailAllProfile');

Route::delete("/delete/profile/{idProfile}", [ControllerDelete::class, 'deleteProfile'],function ($idProfile){})->name('deleteProfile');
Route::get("/delete/profile/{idProfile}", [ControllerDelete::class, 'deleteProfile'],function ($idProfile){})->name('deleteProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION DATE *******************

Route::post('/new/condition/addFavCondDate', [ControllerAdd::class, 'addFavConditionDate'])->name('addFavConditionDate');
Route::get('/new/condition/addFavCondDate', [ControllerAdd::class, 'addFavConditionDate'])->name('addFavConditionDate');

Route::post('/edit/condition/editFavCondDate/{idCondition}', [ControllerEdit::class, 'editFavCondDateSent'],function ($idCondition){})->name('editFavCondDateSent');
Route::get('/edit/condition/editFavCondDate/{idCondition}', [ControllerEdit::class, 'editFavCondDate'],function ($idCondition){})->name('editFavCondDate');

Route::get("search/condition/{type}/{idCondition}", [ControllerDetail::class, 'searchFavConditionDate'],function ($type, $idCondition){})->name('searchFavConditionDate');

//Route::get("searchAll/condition/{type}", [ControllerDetail::class, 'searchAllFavCondition'],function ($type){})->name('detailAllFavCondition');

Route::delete("/delete/condition/date/{idCondition}", [ControllerDelete::class, 'deleteFavConditionDate'],function ($idCondition){})->name('deleteFavConditionDate');
Route::get("/delete/condition/date/{idCondition}", [ControllerDelete::class, 'deleteFavConditionDate'],function ($idCondition){})->name('deleteFavConditionDate');

Route::post('/assign/condition/date/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionDate'],function ($idPlant, $idCondition){})->name('assignFavConditionDate');
Route::get('/assign/condition/date/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionDate'],function ($idPlant, $idCondition){})->name('assignFavConditionDate');

Route::delete('/unassign/condition/date/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondDate'],function ($idPlant, $idCondition){})->name('unassignFavCondDate');
Route::get('/unassign/condition/date/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondDate'],function ($idPlant, $idCondition){})->name('unassignFavCondDate');

// ***************** FAVORABLE CONDITION NB *******************

// ***************** FAVORABLE CONDITION NB *******************

Route::post('/new/condition/addFavCondNb', [ControllerAdd::class, 'addFavConditionNb'])->name('addFavConditionNb');
Route::get('/new/condition/addFavCondNb', [ControllerAdd::class, 'addFavConditionNb'])->name('addFavConditionNb');

Route::post('/edit/condition/editFavCondNb/{idCondition}', [ControllerEdit::class, 'editFavCondNbSent'],function ($type, $idCondition){})->name('editFavCondNbSent');
Route::get('/edit/condition/editFavCondNb/{idCondition}', [ControllerEdit::class, 'editFavCondNb'],function ($type, $idCondition){})->name('editFavCondNb');

Route::get("search/condition/{type}/{idCondition}", [ControllerDetail::class, 'searchFavConditionNb'],function ($type, $idCondition){})->name('searchFavConditionNb');
//Route::get("search/condition/{type}/{idCondition}", [ControllerDetail::class, 'searchFavCondition'],function ($type, $idCondition){})->name('detailFavCondition');

//Route::get("searchAll/condition/{type}", [ControllerDetail::class, 'searchAllFavCondition'],function ($type){})->name('detailAllFavCondition');

Route::delete("/delete/condition/number/{idCondition}", [ControllerDelete::class, 'deleteFavConditionNb'],function ($idCondition){})->name('deleteFavConditionNb');
Route::get("/delete/condition/number/{idCondition}", [ControllerDelete::class, 'deleteFavConditionNb'],function ($idCondition){})->name('deleteFavConditionNb');

Route::post('/assign/condition/nb/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionNb'],function ($idPlant, $idCondition){})->name('assignFavConditionNb');
Route::get('/assign/condition/nb/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionNb'],function ($idPlant, $idCondition){})->name('assignFavConditionNb');

Route::delete('/unassign/condition/nb/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondNb'],function ($idPlant, $idCondition){})->name('unassignFavCondNb');
Route::get('/unassign/condition/nb/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondNb'],function ($idPlant, $idCondition){})->name('unassignFavCondNb');


// ***************** PACKAGE *******************

Route::get("search/package/{searchCondition}", [ControllerDetail::class, 'searchPackage'],function ($searchCondition){})->name('searchPackage');
Route::get("searchAll/package/", [ControllerDetail::class, 'searchAllPackages'],function (){})->name('searchAllPackage');

// ***************** PACKAGE *******************

// ******************* VERSION *******************

Route::get("search/last/version", [Controller::class, 'searchLastVersion'])->name('searchLastVersion');

Route::post("increment/last/version", [Controller::class, 'incrementVersion'])->name('incrementVersion');

// ******************* VERSION *******************
