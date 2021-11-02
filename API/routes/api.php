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
use App\Http\Controllers\ControllerLogin;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// ***************** PLANT *******************

Route::get("search/plant/{idPlant}", [ControllerDetail::class, 'searchPlant'],function ($idPlant){})->name('detailPlant');

Route::get("searchAll/plant", [ControllerDetail::class, 'searchAllPlant'],function (){})->name('detailAllPlant');

Route::get("searchAll/plant/families", [ControllerDetail::class, 'searchAllPlantFamilies'],function (){})->name('searchAllPlantFamilies');

Route::get("searchAll/plant/difficulties", [ControllerDetail::class, 'searchAllPlantDifficulties'],function (){})->name('searchAllPlantDifficulties');

Route::get("searchAll/plant/types", [ControllerDetail::class, 'searchAllPlantTypes'],function (){})->name('searchAllPlantTypes');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::get("search/problem/{idProblem}", [ControllerDetail::class, 'searchProblem'],function ($idProblem){})->name('detailProblem');

Route::get("searchAll/problem", [ControllerDetail::class, 'searchAllProblem'],function (){})->name('detailAllProblem');

// ***************** PROBLEM *******************

// ***************** PROFILE *******************

Route::post('/new/profile/addProfile', [ControllerAdd::class, 'addProfile'])->name('addProfile');

Route::get("search/profile/{idProfile}", [ControllerDetail::class, 'searchProfile'],function ($idProfile){})->name('detailProfile');

Route::get("searchAll/profile", [ControllerDetail::class, 'searchAllProfile'],function (){})->name('detailAllProfile');

Route::get("searchAll/favorite/{idProfile}", [ControllerDetail::class, 'searchAllFavorites'],function ($idProfile){})->name('searchAllFavorites');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION *******************
// ***************** FAVORABLE CONDITION DATE *******************

Route::get("search/condition/date/{idCondition}", [ControllerDetail::class, 'searchFavConditionDate'],function ($idCondition){})->name('searchFavConditionDate');

Route::get("searchAll/condition/date", [ControllerDetail::class, 'searchAllFavConditionDate'],function (){})->name('detailAllFavConditionDate');

// ***************** FAVORABLE CONDITION NB *******************


Route::get("search/condition/nb/{idCondition}", [ControllerDetail::class, 'searchFavConditionNb'],function ($type, $idCondition){})->name('searchFavConditionNb');

Route::get("searchAll/condition/nb", [ControllerDetail::class, 'searchAllFavConditionNb'],function (){})->name('detailAllFavConditionNb');

// ***************** FAVORABLE CONDITION NB *******************

// ***************** PACKAGE *******************

Route::get("search/package/{searchCondition}", [ControllerDetail::class, 'searchPackage'],function ($searchCondition){})->name('searchPackage');

Route::get("searchAll/package/", [ControllerDetail::class, 'searchAllPackages'],function (){})->name('searchAllPackage');

// ***************** PACKAGE *******************

// ******************* VERSION *******************

Route::get("search/last/version", [Controller::class, 'searchLastVersion'])->name('searchLastVersion');

// ******************* VERSION *******************

// ******************* LOGIN *******************

Route::post("login/checkLogin", [ControllerLogin::class, 'checkLogin'])->name('checkLogin');

// ******************* LOGIN *******************

// ******************* IMPORTANT *******************

Route::get("thanus", [ControllerDetail::class, "thanus"])->name("thanus");

// ******************* IMPORTANT *******************

Route::middleware('passkey')->group(function () {
    Route::post('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite'); // Add the favorite
    Route::delete("/delete/favorite/{idPlant}/{idProfile}", [ControllerDelete::class, 'deleteFavorite'],function ($idPlant, $idProfile){})->name('deleteFavorite'); // Delete the favorite
});

Route::middleware('passkeyAdmin')->group(function () {
    Route::post('/new/favorite/{idPlant}/{idProfile}', [ControllerAdd::class, 'addFavorite'],function ($idPlant, $idProfile){})->name('addFavorite');
    Route::post("increment/last/version", [Controller::class, 'incrementVersion'])->name('incrementVersion');
    Route::post('/assign/condition/nb/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionNb'],function ($idPlant, $idCondition){})->name('assignFavConditionNb'); // Assign the fav condition nb to a plant
    Route::post('/assign/condition/date/{idPlant}/{idCondition}', [ControllerAssign::class, 'assignFavConditionDate'],function ($idPlant, $idCondition){})->name('assignFavConditionDate'); // Assign the fav condition date to a plant
    Route::post('/assign/problem/{idPlant}/{idProblem}', [ControllerAssign::class, 'assignProblem'],function ($idPlant, $idProblem){})->name('assignProblem'); // Add the assocation of a plant and a problem
    Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem'); // Add the problem
    Route::post('/new/plant/addPlant', [ControllerAdd::class, 'addPlant'])->name('addPlant'); // Add the plant
    Route::post('/new/condition/addFavCondNb', [ControllerAdd::class, 'addFavConditionNb'])->name('addFavConditionNb'); // Add the condition nb
    Route::post('/new/condition/addFavCondDate', [ControllerAdd::class, 'addFavConditionDate'])->name('addFavConditionDate'); // Add the condition date

    Route::delete("/delete/favorite/{idPlant}/{idProfile}", [ControllerDelete::class, 'deleteFavorite'],function ($idPlant, $idProfile){})->name('deleteFavorite'); // Delete the favorite
    Route::delete("/delete/condition/number/{idCondition}", [ControllerDelete::class, 'deleteFavConditionNb'],function ($idCondition){})->name('deleteFavConditionNb'); // Delete the condition nb
    Route::delete("/delete/condition/date/{idCondition}", [ControllerDelete::class, 'deleteFavConditionDate'],function ($idCondition){})->name('deleteFavConditionDate'); // Delete the condition date
    Route::delete('/unassign/condition/nb/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondNb'],function ($idPlant, $idCondition){})->name('unassignFavConditionNb'); // Unassign the fav condition nb
    Route::delete('/unassign/condition/date/{idPlant}/{idCondition}', [ControllerUnassign::class, 'unassignFavCondDate'],function ($idPlant, $idCondition){})->name('unassignFavConditionDate'); // Unassign the fav condition date
    Route::delete("/delete/profile/{idProfile}", [ControllerDelete::class, 'deleteProfile'],function ($idProfile){})->name('deleteProfile'); // Delete the profile
    Route::delete("/delete/problem/{idProblem}", [ControllerDelete::class, 'deleteProblem'],function ($idProblem){})->name('deleteProblem'); // Delete the problem
    Route::delete('/unassign/problem/{idPlant}/{idProblem}', [ControllerUnassign::class, 'unassignProblem'],function ($idPlant, $idProblem){})->name('unassignProblem'); // Delete the assocation of a plant and a problem
    Route::delete("/delete/plant/{idPlant}", [ControllerDelete::class, 'deletePlant'],function ($idPlant){})->name('deletePlant'); // Delete the plant

    Route::put('/edit/plant/editPlant/{idPlant}', [ControllerEdit::class, 'editPlantSent'],function ($idPlant){})->name('editPlantSent'); // Edit the plant
    Route::put('/edit/problem/editProblem/{idProblem}', [ControllerEdit::class, 'editProblemSent'],function ($idProblem){})->name('editProblemSent'); // Edit the problem
    Route::put('/edit/profile/editProfile/{idProfile}', [ControllerEdit::class, 'editProfileSent'],function ($idProfile){})->name('editProfileSent'); // Edit the profile   
    Route::put('/edit/condition/editFavCondNb/{idCondition}', [ControllerEdit::class, 'editFavCondNbSent'],function ($type, $idCondition){})->name('editFavCondNbSent');
    Route::put('/edit/condition/editFavCondDate/{idCondition}', [ControllerEdit::class, 'editFavCondDateSent'],function ($idCondition){})->name('editFavCondDateSent'); // Edit the condition date
    Route::put('/new/admin/addAdmin/{idProfile}', [ControllerEdit::class, 'addAdmin'],function ($idProfile){})->name('addAdmin'); // Add an admin

});