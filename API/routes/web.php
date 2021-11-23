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
})->name('home');
// ***************** HOME *******************

// ***************** PLANT *******************

Route::get('/new/plant/', [ControllerAdd::class, 'indexPlant'])->name('newPlant'); // Display the page with form to add plant

Route::get('/search/plant/', [ControllerEdit::class, 'indexPlant'])->name('editSearchPlant'); // Display the page with search a plant form

Route::get('/edit/plant/{idPlant}', [ControllerEdit::class, 'editPlant'],function ($idPlant){})->name('editPlant'); // Display the page with edit plant form

// ***************** PLANT *******************

// ***************** FAMILY ******************

Route::get('/new/family/', [ControllerAdd::class, 'indexFamily'])->name('newFamily'); // Display the page with form to add family

Route::get('/search/family/', [ControllerEdit::class, 'indexFamily'])->name('editSearchFamily'); // Display the page with search a family form

Route::get('/edit/family/{idFamily}', [ControllerEdit::class, 'editFamily'],function ($idFamily){})->name('editFamily'); // Display the page with edit family form

// ***************** FAMILY ******************

// ***************** PROBLEM *******************

Route::get('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem'); // Display new problem form

Route::get('/search/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem'); // Display the page with search a problem form

Route::get('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem'); // Display the page with search an association of plant and problem

Route::get('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('searchUnassignProblem'); // Display the page with search an association of plant and problem

Route::get('/edit/problem/{idPlant}', [ControllerEdit::class, 'editProblem'],function ($idProblem){})->name('editProblem'); // Display the page with edit problem form

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::get('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite'); // Display the page with favorite form

Route::get('/delete/favorite', [ControllerDelete::class, 'indexFavorite'])->name('deleteSearchFavorite'); // Display the page with favorite form

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::get('/new/profile', [ControllerAdd::class, 'indexProfile'])->name('newProfile'); // Display the page with the profile form

Route::get('/search/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile'); // Display the form with search a profile

Route::get('/edit/profile/{idProfile}', [ControllerEdit::class, 'editProfile'],function ($idProfile){})->name('editProfile'); // Display the page with edit profile form

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION DATE *******************

Route::get('/new/conditionDate', [ControllerAdd::class, 'indexFavCondDate'])->name('newFavCondDate'); // Display the page with new condition date form

Route::get('/search/conditionDate', [ControllerEdit::class, 'indexFavCondDate'])->name('editSearchFavCondDate'); // Display the page with search condition date form

Route::get('/edit/conditionDate/{idCondition}', [ControllerEdit::class, 'editFavCondDate'],function ($idProfile){})->name('editFavCondDate'); // Display the page with condition date form

Route::get('/assign/conditionDate', [ControllerAssign::class, 'indexFavCondDate'])->name('newAssignFavCondDate'); // Display the page with association form

Route::get('/unassign/conditionDate', [ControllerUnassign::class, 'indexFavCondDate'])->name('deleteUnassignFavCondDate'); // Display the page with association form

// ***************** FAVORABLE CONDITION *******************

// ***************** FAVORABLE CONDITION NB *******************

Route::get('/new/conditionNb', [ControllerAdd::class, 'indexFavCondNb'])->name('newFavCondNb'); // Display the page with new condition nb form

Route::get('/search/conditionNb', [ControllerEdit::class, 'indexFavCondNb'])->name('editSearchFavCondNb'); // Display the page with search condition nb form

Route::get('/edit/conditionNb/{idCondition}', [ControllerEdit::class, 'editFavCondNb'],function ($idProfile){})->name('editFavCondNb'); // Display the page with condition nb form

Route::get('/assign/conditionNb', [ControllerAssign::class, 'indexFavCondNb'])->name('newAssignFavCondNb'); // Display the page with association form

Route::get('/unassign/conditionNb', [ControllerUnassign::class, 'indexFavCondNb'])->name('deleteUnassignFavCondNb'); // Display the page with association form

// ***************** FAVORABLE CONDITION *******************

Route::get('/assign/admin', [ControllerEdit::class, 'indexAddAdmin'])->name('newAssignAdmin'); // Display the page with admin form

Route::get('/unassign/admin', [ControllerEdit::class, 'indexRemoveAdmin'])->name('deleteUnassignAdmin'); // Display the page with admin form