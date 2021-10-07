<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;
use App\Http\Controllers\ControllerAssign;
use App\Http\Controllers\ControllerUnassign;

// ***************** HOME *******************

Route::get('/', function () {
    return view('home');
});
// ***************** HOME *******************

// ***************** PLANT *******************

Route::post('/new/plant/', [ControllerAdd::class, 'indexPlant'])->name('newPlant');
Route::get('/new/plant/', [ControllerAdd::class, 'indexPlant'])->name('newPlant');

//Route::post('/edit/plant/', [ControllerEdit::class, 'indexPlant'])->name('editSearchPlant');
Route::get('/edit/plant/', [ControllerEdit::class, 'indexPlant'])->name('editSearchPlant');

//Route::put('/search/plant/', [ControllerDetail::class, 'indexPlant'])->name('searchPlant');
Route::get('/search/plant/', [ControllerDetail::class, 'indexPlant'])->name('searchPlant');

Route::delete('/delete/plant/', [ControllerDelete::class, 'deletePlant'])->name('deletePlant');
Route::get('/delete/plant/', [ControllerDelete::class, 'indexPlant'])->name('deleteSearchPlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');
Route::get('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');

Route::get('/edit/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem');

Route::post('/search/problem', [ControllerDetail::class, 'indexProblem'])->name('searchProblem');

Route::post('/delete/problem', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchProblem');

Route::post('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem');
Route::get('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem');

Route::post('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('deleteUnassignProblem');
Route::get('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('deleteUnassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite');
Route::get('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite');

Route::post('/delete/favorite', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::post('/new/profile', [ControllerAdd::class, 'indexProfile'])->name('newProfile');
Route::get('/new/profile', [ControllerAdd::class, 'indexProfile'])->name('newProfile');

Route::get('/edit/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile');

Route::post('/search/profile', [ControllerDetail::class, 'indexProfile'])->name('searchProfile');

Route::post('/delete/profile', [ControllerDelete::class, 'indexProfile'])->name('deleteSearchProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION DATE *******************

Route::post('/new/conditionDate', [ControllerAdd::class, 'indexFavCondDate'])->name('newFavCondDate');
Route::get('/new/conditionDate', [ControllerAdd::class, 'indexFavCondDate'])->name('newFavCondDate');

Route::get('/edit/conditionDate', [ControllerEdit::class, 'indexFavCondDate'])->name('editSearchFavCondDate');

Route::get('/search/conditionDate', [ControllerDetail::class, 'indexFavCondDate'])->name('searchFavCondDate');

Route::post('/delete/conditionDate', [ControllerDelete::class, 'indexFavCondDate'])->name('deleteSearchFavCondDate');

Route::post('/assign/conditionDate', [ControllerAssign::class, 'indexFavCondDate'])->name('newAssignFavCondDate');
Route::get('/assign/conditionDate', [ControllerAssign::class, 'indexFavCondDate'])->name('newAssignFavCondDate');

Route::post('/unassign/conditionDate', [ControllerUnassign::class, 'indexFavCondDate'])->name('deleteUnassignFavCondDate');
Route::get('/unassign/conditionDate', [ControllerUnassign::class, 'indexFavCondDate'])->name('deleteUnassignFavCondDate');

// ***************** FAVORABLE CONDITION *******************

// ***************** FAVORABLE CONDITION NB *******************

Route::post('/new/conditionNb', [ControllerAdd::class, 'indexFavCondNb'])->name('newFavCondNb');
Route::get('/new/conditionNb', [ControllerAdd::class, 'indexFavCondNb'])->name('newFavCondNb');

Route::get('/edit/conditionNb', [ControllerEdit::class, 'indexFavCondNb'])->name('editSearchFavCondNb');

Route::get('/search/conditionNb', [ControllerDetail::class, 'indexFavCondNb'])->name('searchFavCondNb');

Route::post('/delete/conditionNb', [ControllerDelete::class, 'indexFavCondNb'])->name('deleteSearchFavCondNb');

Route::post('/assign/conditionNb', [ControllerAssign::class, 'indexFavCondNb'])->name('newAssignFavCondNb');
Route::get('/assign/conditionNb', [ControllerAssign::class, 'indexFavCondNb'])->name('newAssignFavCondNb');

Route::post('/unassign/conditionNb', [ControllerUnassign::class, 'indexFavCondNb'])->name('deleteUnassignFavCondNb');
Route::get('/unassign/conditionNb', [ControllerUnassign::class, 'indexFavCondNb'])->name('deleteUnassignFavCondNb');

// ***************** FAVORABLE CONDITION *******************

// ***************** GET ALL *******************

Route::get('/getAll/Plant', [ControllerDetail::class, 'searchAllPlant'])->name('searchAllPlant');

/*Route::get('/getAll/Problem', [ControllerDetail::class, 'searchAllProblem'])->name('detailAllProblem');

Route::get('/getAll/Profile', [ControllerDetail::class, 'searchAllProfile'])->name('detailAllProfile');

Route::get('/getAll/Profile', [ControllerDetail::class, 'searchAllFavCondition'])->name('detailAllFavCondition');*/

// ***************** GET ALL *******************