<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;


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

//Route::post('/delete/plant/', [ControllerDelete::class, 'indexPlant'])->name('deleteSearchPlant');
Route::get('/delete/plant/', [ControllerDelete::class, 'indexPlant'])->name('deleteSearchPlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');
Route::get('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');

//Route::post('/edit/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem');
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

Route::post('/edit/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile');

Route::post('/search/profile', [ControllerDetail::class, 'indexProfile'])->name('searchProfile');

Route::post('/delete/profile', [ControllerDelete::class, 'indexProfile'])->name('deleteSearchProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition', [ControllerAdd::class, 'indexFavCondition'])->name('newFavCondition');
Route::get('/new/condition', [ControllerAdd::class, 'indexFavCondition'])->name('newFavCondition');

//Route::post('/edit/condition', [ControllerEdit::class, 'indexFavCondition'])->name('editSearchFavCondition');
Route::get('/edit/condition', [ControllerEdit::class, 'indexFavCondition'])->name('editSearchFavCondition');

Route::post('/search/condition', [ControllerDetail::class, 'indexFavCondition'])->name('searchFavCondition');

Route::post('/delete/condition', [ControllerDelete::class, 'indexFavCondition'])->name('deleteSearchFavCondition');

Route::post('/assign/condition', [ControllerAssign::class, 'indexFavCondition'])->name('newAssignFavCondition');
Route::get('/assign/condition', [ControllerAssign::class, 'indexFavCondition'])->name('newAssignFavCondition');

Route::post('/unassign/condition', [ControllerUnassign::class, 'indexFavCondition'])->name('deleteUnassignFavCondition');
Route::get('/unassign/condition', [ControllerUnassign::class, 'indexFavCondition'])->name('deleteUnassignFavCondition');

// ***************** FAVORABLE CONDITION *******************

// ***************** GET ALL *******************

Route::get('/getAll/Plant', [ControllerDetail::class, 'searchAllPlant'])->name('searchAllPlant');

/*Route::get('/getAll/Problem', [ControllerDetail::class, 'searchAllProblem'])->name('detailAllProblem');

Route::get('/getAll/Profile', [ControllerDetail::class, 'searchAllProfile'])->name('detailAllProfile');

Route::get('/getAll/Profile', [ControllerDetail::class, 'searchAllFavCondition'])->name('detailAllFavCondition');*/

// ***************** GET ALL *******************