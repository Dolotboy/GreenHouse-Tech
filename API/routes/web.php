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

Route::post('/new/vegetable', [ControllerAdd::class, 'indexVegetable'])->name('newVegetable');

Route::post('/new/vegetable/addVegetable', [ControllerAdd::class, 'addVegetable'])->name('addVegetable');


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
