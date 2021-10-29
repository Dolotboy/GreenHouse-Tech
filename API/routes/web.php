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

Route::get('/new/plant/', [ControllerAdd::class, 'indexPlant'])->name('newPlant');                 // Ajoute une plante

Route::get('/search/plant/', [ControllerEdit::class, 'indexPlant'])->name('editSearchPlant');      // Va chercher la plante

Route::get('/edit/plant/{idPlant}', [ControllerEdit::class, 'editPlant'],function ($idPlant){})->name('editPlant');

// ***************** PLANT *******************

// ***************** PROBLEM *******************

Route::get('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');

Route::get('/search/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem');

Route::get('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem');

Route::get('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('searchUnassignProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::get('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite');

Route::get('/delete/favorite', [ControllerDelete::class, 'indexFavorite'])->name('deleteSearchFavorite');

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::get('/new/profile', [ControllerAdd::class, 'indexProfile'])->name('newProfile');

Route::get('/search/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile');

Route::get('/delete/profile', [ControllerDelete::class, 'indexProfile'])->name('deleteSearchProfile');

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION DATE *******************

Route::get('/new/conditionDate', [ControllerAdd::class, 'indexFavCondDate'])->name('newFavCondDate');

Route::get('/search/conditionDate', [ControllerEdit::class, 'indexFavCondDate'])->name('editSearchFavCondDate');

Route::get('/delete/conditionDate', [ControllerDelete::class, 'indexFavCondDate'])->name('deleteSearchFavCondDate');

Route::get('/assign/conditionDate', [ControllerAssign::class, 'indexFavCondDate'])->name('newAssignFavCondDate');

Route::get('/unassign/conditionDate', [ControllerUnassign::class, 'indexFavCondDate'])->name('deleteUnassignFavCondDate');

// ***************** FAVORABLE CONDITION *******************

// ***************** FAVORABLE CONDITION NB *******************

Route::get('/new/conditionNb', [ControllerAdd::class, 'indexFavCondNb'])->name('newFavCondNb');

Route::get('/search/conditionNb', [ControllerEdit::class, 'indexFavCondNb'])->name('editSearchFavCondNb');

Route::get('/delete/conditionNb', [ControllerDelete::class, 'indexFavCondNb'])->name('deleteSearchFavCondNb');

Route::get('/assign/conditionNb', [ControllerAssign::class, 'indexFavCondNb'])->name('newAssignFavCondNb');

Route::get('/unassign/conditionNb', [ControllerUnassign::class, 'indexFavCondNb'])->name('deleteUnassignFavCondNb');

// ***************** FAVORABLE CONDITION *******************

// ***************** GET ALL *******************

Route::get('/getAll/Plant', [ControllerDetail::class, 'searchAllPlant'])->name('searchAllPlant');

