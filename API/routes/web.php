<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerAdd;
use App\Http\Controllers\ControllerEdit;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\ControllerDelete;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// ***************** VEGETABLE *******************

Route::get('/new/vegetable', [ControllerAdd::class, 'indexVegetable'])->name('newVegetable');




Route::post('/edit/vegetable', [ControllerEdit::class, 'indexVegetable'])->name('editSearchVegetable');

Route::post('/edit/vegetable/editVegetable', [ControllerEdit::class, 'EditVegetable'])->name('editVegetable');


Route::post('/search/vegetable', [ControllerDetail::class, 'indexVegetable'])->name('searchVegetable');

Route::get("search/vegetable/{id}", [ControllerDetail::class, 'searchVegetable'],function ($id){})->name('detailVegetable');


Route::post('/delete/vegetable', [ControllerDelete::class, 'indexVegetable'])->name('deleteSearchVegetable');

Route::get("/delete/vegetable/{id}", [ControllerDelete::class, 'deleteVegetable'],function ($id){})->name('deleteVegetable');

// ***************** VEGETABLE *******************

// ***************** PROBLEM *******************

Route::post('/new/problem', [ControllerAdd::class, 'indexProblem'])->name('newProblem');

Route::post('/new/problem/addProblem', [ControllerAdd::class, 'addProblem'])->name('addProblem');


Route::post('/edit/problem', [ControllerEdit::class, 'indexProblem'])->name('editSearchProblem');

Route::post('/edit/problem/editProblem', [ControllerEdit::class, 'EditProblem'])->name('editProblem');


Route::post('/search/problem', [ControllerDetail::class, 'indexProblem'])->name('searchProblem');

Route::get("search/problem/{id}", [ControllerDetail::class, 'searchProblem'],function ($id){})->name('detailProblem');


Route::post('/delete/problem', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchProblem');

Route::get("/delete/problem/{id}", [ControllerDelete::class, 'deleteProblem'],function ($id){})->name('deleteProblem');

// ***************** PROBLEM *******************

// ***************** FAVORITE *******************

Route::post('/new/favorite', [ControllerAdd::class, 'indexFavorite'])->name('newFavorite');

Route::post('/new/favorite/addFavorite', [ControllerAdd::class, 'addFavorite'])->name('addFavorite');


Route::post('/delete/favorite', [ControllerDelete::class, 'indexProblem'])->name('deleteSearchFavorite');

Route::get("/delete/favorite/{id}", [ControllerDelete::class, 'deleteFavorite'],function ($id){})->name('deleteFavorite');


Route::post('/assign/problem', [ControllerAssign::class, 'indexProblem'])->name('newAssignProblem');

Route::get('/assign/problem/{id}', [ControllerAssign::class, 'assignProblem'],function ($id){})->name('assignProblem');


Route::post('/unassign/problem', [ControllerUnassign::class, 'indexProblem'])->name('deleteUnassignProblem');

Route::get('/unassign/problem/{id}', [ControllerUnassign::class, 'unassignProblem'],function ($id){})->name('unassignProblem');

// ***************** PROBLEM *******************

// ***************** PROFIL *******************

Route::post('/new/profil', [ControllerAdd::class, 'indexProfil'])->name('newProfil');

Route::post('/new/profil/addProfil', [ControllerAdd::class, 'addProfil'])->name('addProfil');


Route::post('/edit/profil', [ControllerEdit::class, 'indexProfil'])->name('editSearchProfil');

Route::post('/edit/profil/editVegetable', [ControllerEdit::class, 'EditProfil'])->name('editProfil');


Route::post('/search/profil', [ControllerDetail::class, 'indexProfil'])->name('searchProfil');

Route::get("search/profil/{id}", [ControllerDetail::class, 'searchProfil'],function ($id){})->name('detailProfil');


Route::post('/delete/profil', [ControllerDelete::class, 'indexProfil'])->name('deleteSearchProfil');

Route::get("/delete/profil/{id}", [ControllerDelete::class, 'deleteProfil'],function ($id){})->name('deleteProfil');

// ***************** PROFIL *******************

// ***************** FAVORABLE CONDITION *******************

Route::post('/new/condition', [ControllerAdd::class, 'indexFavCondition'])->name('newFavCondition');

Route::post('/new/condition/addFavCondition', [ControllerAdd::class, 'addFavCondition'])->name('addFavCondition');


Route::post('/edit/condition', [ControllerEdit::class, 'indexFavCondition'])->name('editSearchFavCondition');

Route::post('/edit/condition/editFavCondition', [ControllerEdit::class, 'EditFavCondition'])->name('editFavCondition');


Route::post('/search/condition', [ControllerDetail::class, 'indexFavCondition'])->name('searchFavCondition');

Route::get("search/condition/{id}", [ControllerDetail::class, 'searchFavCondition'],function ($id){})->name('detailFavCondition');


Route::post('/delete/condition', [ControllerDelete::class, 'indexFavCondition'])->name('deleteSearchFavCondition');

Route::get("/delete/condition/{id}", [ControllerDelete::class, 'deleteFavCondition'],function ($id){})->name('deleteFavCondition');


Route::post('/assign/condition', [ControllerAssign::class, 'indexFavCondition'])->name('newAssignFavCondition');

Route::get('/assign/condition/{id}', [ControllerAssign::class, 'assignFavCondition'],function ($id){})->name('assignFavCondition');


Route::post('/unassign/condition', [ControllerUnassign::class, 'indexFavCondition'])->name('deleteUnassignFavCondition');

Route::get('/unassign/condition/{id}', [ControllerUnassign::class, 'unassignFavCondition'],function ($id){})->name('unassignFavCondition');

// ***************** FAVORABLE CONDITION *******************
