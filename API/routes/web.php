<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;

Route::get('/', function () {
    return view('home');
});

// ***************** PLANT *******************

Route::get('/new/plant', [ControllerAdd::class, 'indexPlant'])->name('newPlant');

Route::post('/edit/plant', [ControllerEdit::class, 'indexPlant'])->name('editSearchPlant');

Route::post('/search/plant', [ControllerDetail::class, 'indexPlant'])->name('searchPlant');

Route::post('/delete/plant', [ControllerDelete::class, 'indexPlant'])->name('deleteSearchPlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::post('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');

Route::post('/edit/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem');

Route::post('/search/problem', [ControllerDetail::class, 'indexProblem'])->name('searchProblem');

Route::post('/delete/problem', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchProblem');

Route::post('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem');

Route::post('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('deleteUnassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite');

Route::post('/delete/favorite', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::post('/new/profile', [ControllerAdd::class, 'indexProfile'])->name('newProfile');

Route::post('/edit/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile');

Route::post('/search/profile', [ControllerDetail::class, 'indexProfile'])->name('searchProfile');

Route::post('/delete/profile', [ControllerDelete::class, 'indexProfile'])->name('deleteSearchProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition', [ControllerAdd::class, 'indexFavCondition'])->name('newFavCondition');

Route::post('/edit/condition', [ControllerEdit::class, 'indexFavCondition'])->name('editSearchFavCondition');

Route::post('/search/condition', [ControllerDetail::class, 'indexFavCondition'])->name('searchFavCondition');

Route::post('/delete/condition', [ControllerDelete::class, 'indexFavCondition'])->name('deleteSearchFavCondition');

Route::post('/assign/condition', [ControllerAssign::class, 'indexFavCondition'])->name('newAssignFavCondition');

Route::post('/unassign/condition', [ControllerUnassign::class, 'indexFavCondition'])->name('deleteUnassignFavCondition');

// ***************** FAVORABLE CONDITION *******************
