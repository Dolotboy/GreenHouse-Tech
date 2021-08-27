<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerAdd;
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

Route::post('/new', [ControllerAdd::class, 'index'])->name('new');

Route::post('/new/add', [ControllerAdd::class, 'add'])->name('add');


Route::post('/search', [ControllerDetail::class, 'index'])->name('search');

Route::get("search/{id}", [ControllerDetail::class, 'search'],function ($id){})->name('detail');


Route::post('/delete', [ControllerDelete::class, 'index'])->name('deleteSearch');

Route::get("/delete/{id}", [ControllerDelete::class, 'delete'],function ($id){})->name('delete');
