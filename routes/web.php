<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleContoller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchDishesController;
use App\Http\Controllers\WorkerController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//dish
Route::resource('/dishes',DishController::class);

//category
Route::resource('/categories',CategoryController::class);

// worker
Route::get('/workers',[WorkerController::class,'index'])->name('workerindex');
Route::get('/workers/create',[WorkerController::class,'create'])->name('workercreate');
Route::post('/workers',[WorkerController::class,'store'])->name('workerstore');
Route::get('/workers/{worker}',[WorkerController::class,'edit'])->name('workeredit');
Route::put('/workers/{worker}',[WorkerController::class,'update'])->name('workerupdate');
Route::delete('/workers/{worker}',[WorkerController::class,'destroy'])->name('workerdestroy');

//role
Route::get('/roles',[RoleController::class,'index'])->name('roleindex');
Route::post('/roles',[RoleController::class,'store'])->name('rolestore');
Route::get('/roles/{role}',[RoleController::class,'edit'])->name('roleedit');
Route::put('/roles/{role}',[RoleController::class,'update'])->name('roleupdate');

// search
Route::get('/search',[DishController::class,'search'])->name('searchdish');
Route::get('/searchcategory',[CategoryController::class,'search'])->name('searchcategory');
Route::get('/searchworker',[WorkerController::class,'search'])->name('searchworker');
Route::get('/searchrole',[RoleController::class,'search'])->name('searchrole');