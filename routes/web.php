<?php

use App\Models\Categories;
use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleContoller;
use App\Http\Controllers\CashController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchDishesController;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confim' => false,
]);

//cashing
Route::get('/cashorder',[CashController::class,'cashorder']);
Route::get('/cashing',[CashController::class,'index']);
Route::get('/cashing/{table}',[CashController::class,'detail']);
Route::get('/cashing/{table}/checkout',[CashController::class,'checkout']);
Route::get('/cashing/{table}/print',[CashController::class,'print']);

//table
Route::get('/tables',[TableController::class,'index']);
Route::get('/tables/create',[TableController::class,'create'])->name('tablecreate');
Route::post('/tables',[TableController::class,'store'])->name('tablestore');
Route::get('/tables/{table}',[TableController::class,'edit'])->name('tableedit');
Route::put('/tables/{table}',[TableController::class,'update'])->name('tableupdate');

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

//order to waiter panel
Route::get('/waiter',[OrderController::class,'index'])->name('orderindex');
Route::post('/ordersubmit',[OrderController::class,'submit'])->name('ordersubmit');
Route::get('/orderresult',[OrderController::class,'result'])->name('orderresult');
Route::get('/orderserve/{order}/serve',[OrderController::class,'serve']);
Route::get('/orderserve/{order}/cancel',[OrderController::class,'servecancel']);

//order to kitchen panel
Route::get('/kitchen',[OrderController::class,'order'])->name('kitchenorder');
Route::get('/kitchen/{order}/approve',[OrderController::class,'approve']);
Route::get('/kitchen/{order}/cancel',[OrderController::class,'cancel']);
Route::get('/kitchen/{order}/done',[OrderController::class,'done']);

