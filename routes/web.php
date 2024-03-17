<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PersonalFormController;
use APP\Http\Controllers\Backend\FlmsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'user'])->name('dashboard');

Route::get('/admin',[HomeController::class,'admin']);

Route::get('/hhh',[HomeController::class,'hhh']);

Route::get('/mahmud',[HomeController::class,'form'])->name('form');
Route::post('/mahmud/formsubmit',[HomeController::class,'submitform'])->name('mahmud.formsubmit');

Route::get('/league',[LeagueController::class,'viewLeague'])->name('league');

Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');

Route::get('/category/all/list',[CategoryController::class,'categoryAllList'])->name('category.allList');

Route::get('/personal/form',[PersonalFormController::class,'personalForm'])->name('personal.form');
 Route::post('/personal/form',[PersonalFormController::class,'storePersonalForm']);

Route::get('/flms',[FlmsController::class,'flmsStart'])->name('flms.start');
Route::get('/hello',[FlmsController::class,'helloTest'])->name('flms.hello');