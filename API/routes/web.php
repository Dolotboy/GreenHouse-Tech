<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;
use App\Http\Controllers\ControllerAssign;
use App\Http\Controllers\ControllerUnassign;
use Illuminate\Support\Facades\App;

// ***************** HOME *******************

Route::get('/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('home');
})->name('home');

// ***************** HOME *******************

// ***************** PLANT *******************

Route::get('/{lang}/new/plant/', [ControllerAdd::class, 'indexPlant'],function ($lang){})->name('newPlant'); // Display the page with form to add plant

Route::get('/{lang}/search/plant/', [ControllerEdit::class, 'indexPlant'],function ($lang){})->name('editSearchPlant'); // Display the page with search a plant form

Route::get('/{lang}/edit/plant/{idPlant}', [ControllerEdit::class, 'editPlant'],function ($lang, $idPlant){})->name('editPlant'); // Display the page with edit plant form

// ***************** PLANT *******************

// ***************** FAMILY ******************

Route::get('/{lang}/new/family/', [ControllerAdd::class, 'indexFamily'],function ($lang){})->name('newFamily'); // Display the page with form to add family

Route::get('/{lang}/search/family/', [ControllerEdit::class, 'indexFamily'])->name('editSearchFamily'); // Display the page with search a family form

Route::get('/{lang}/edit/family/{idFamily}', [ControllerEdit::class, 'editFamily'],function ($lang, $idFamily){})->name('editFamily'); // Display the page with edit family form

// ***************** FAMILY ******************

// ***************** PROBLEM *******************

Route::get('/{lang}/new/problem', [ControllerAdd::class, 'indexProblem'],function ($lang){})->name('newProblem'); // Display new problem form

Route::get('/{lang}/search/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem'); // Display the page with search a problem form

Route::get('/{lang}/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem'); // Display the page with search an association of plant and problem

Route::get('/{lang}/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('searchUnassignProblem'); // Display the page with search an association of plant and problem

Route::get('/{lang}/edit/problem/{idProblem}', [ControllerEdit::class, 'editProblem'],function ($lang, $idProblem){})->name('editProblem'); // Display the page with edit problem form

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::get('/{lang}/new/favorite', [ControllerAdd::class, 'indexFavorite'],function ($lang){})->name('newFavorite'); // Display the page with favorite form

Route::get('/{lang}/delete/favorite', [ControllerDelete::class, 'indexFavorite'],function ($lang){})->name('deleteSearchFavorite'); // Display the page with favorite form

// ***************** FAVORITE *******************

// ***************** PROFILE *******************

Route::get('/{lang}/new/profile', [ControllerAdd::class, 'indexProfile'],function ($lang){})->name('newProfile'); // Display the page with the profile form

Route::get('/{lang}/search/profile', [ControllerEdit::class, 'indexProfile'])->name('editSearchProfile'); // Display the form with search a profile

Route::get('/{lang}/edit/profile/{idProfile}', [ControllerEdit::class, 'editProfile'],function ($idProfile){})->name('editProfile'); // Display the page with edit profile form

// ***************** PROFILE *******************

// ***************** FAVORABLE CONDITION DATE *******************

Route::get('/{lang}/new/conditionDate', [ControllerAdd::class, 'indexFavCondDate'],function ($lang){})->name('newFavCondDate'); // Display the page with new condition date form

Route::get('/{lang}/search/conditionDate', [ControllerEdit::class, 'indexFavCondDate'])->name('editSearchFavCondDate'); // Display the page with search condition date form

Route::get('/{lang}/edit/conditionDate/{idCondition}', [ControllerEdit::class, 'editFavCondDate'],function ($idProfile){})->name('editFavCondDate'); // Display the page with condition date form

Route::get('/{lang}/assign/conditionDate', [ControllerAssign::class, 'indexFavCondDate'])->name('newAssignFavCondDate'); // Display the page with association form

Route::get('/{lang}/unassign/conditionDate', [ControllerUnassign::class, 'indexFavCondDate'])->name('deleteUnassignFavCondDate'); // Display the page with association form

// ***************** FAVORABLE CONDITION *******************

// ***************** FAVORABLE CONDITION NB *******************

Route::get('/{lang}/new/conditionNb', [ControllerAdd::class, 'indexFavCondNb'],function ($lang){})->name('newFavCondNb'); // Display the page with new condition nb form

Route::get('/{lang}/search/conditionNb', [ControllerEdit::class, 'indexFavCondNb'])->name('editSearchFavCondNb'); // Display the page with search condition nb form

Route::get('/{lang}/edit/conditionNb/{idCondition}', [ControllerEdit::class, 'editFavCondNb'],function ($idProfile){})->name('editFavCondNb'); // Display the page with condition nb form

Route::get('/{lang}/assign/conditionNb', [ControllerAssign::class, 'indexFavCondNb'])->name('newAssignFavCondNb'); // Display the page with association form

Route::get('/{lang}/unassign/conditionNb', [ControllerUnassign::class, 'indexFavCondNb'])->name('deleteUnassignFavCondNb'); // Display the page with association form

// ***************** FAVORABLE CONDITION *******************

Route::get('/{lang}/assign/admin', [ControllerEdit::class, 'indexAddAdmin'])->name('newAssignAdmin'); // Display the page with admin form

Route::get('/{lang}/unassign/admin', [ControllerEdit::class, 'indexRemoveAdmin'])->name('deleteUnassignAdmin'); // Display the page with admin form