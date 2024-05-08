<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebpageController;
use App\Http\Controllers\Frontend\CustomerController;

//backend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\LeagueController;
use App\Http\Controllers\Backend\SeasonController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\PlayerController;
use App\Http\Controllers\Backend\FixtureController;
use App\Http\Controllers\Backend\VanueController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PersonalFormController;
use App\Http\Controllers\Backend\FlmsController;
use App\Http\Controllers\Backend\UserController;

// Frontend
Route::get('/',[WebpageController::class, 'homepage'])->name('homepage');
Route::get('/matches',[WebpageController::class,'match'])->name('matches');

Route::get('/registration',[CustomerController::class,'registrationForm'])->name('registrationForm');
 Route::post('/do-registration',[CustomerController::class,'doRegistration'])->name('do.registration');

Route::get('/login',[CustomerController::class,'loginForm'])->name('loginForm');
 Route::post('/do-login',[CustomerController::class,'doLogin'])->name('do.login');



// Backend
Route::group(['prefix'=>'admin'],function(){

// LMS login&Logout
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::group(['middleware'=>'auth'],function(){ 

Route::get('/',[HomeController::class,'user'])->name('dashboard');
Route::get('/admin',[HomeController::class,'admin']);

Route::get('/league/list',[LeagueController::class,'leagueList'])->name('league.list');
Route::get('/league/form',[LeagueController::class,'leagueForm'])->name('league.form');
 Route::post('/league/form',[LeagueController::class,'submitLeagueForm']);

Route::get('/season/list',[SeasonController::class,'seasonList'])->name('season.list');
Route::get('/season/form',[SeasonController::class,'seasonForm'])->name('season.form');
 Route::post('/season/form',[SeasonController::class,'viewSeason']);

Route::get('/team/list',[TeamController::class,'teamList'])->name('team.list');
Route::get('/team/form',[TeamController::class,'teamForm'])->name('team.form');
 Route::post('/team/form',[TeamController::class,'submitTeamForm'])->name('team.form');

Route::get('/player/list',[PlayerController::class,'playerList'])->name('player.list');
Route::get('/player/form',[PlayerController::class,'playerForm'])->name('player.form');
 Route::post('/player/form',[PlayerController::class,'viewPlayerForm'])->name('player.form');

Route::get('/fixture/list',[FixtureController::class,'fixtureList'])->name('fixture.list');
Route::get('/fixture/form',[FixtureController::class,'fixtureForm'])->name('fixture.form');
Route::post('/fixture/form',[FixtureController::class,'submitFixtureForm'])->name('fixture.form');


Route::get('/Vanue/list',[VanueController::class,'vanueList'])->name('vanue.list');
Route::get('/Vanue/form',[VanueController::class,'vanueForm'])->name('vanue.form');
Route::post('/Vanue/form',[VanueController::class,'submitVanueForm'])->name('vanue.form');


Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/form',[CategoryController::class,'form'])->name('category.form');
 Route::post('/category/form',[CategoryController::class,'submitForm'])->name('category.form');

Route::get('/personal/form',[PersonalFormController::class,'personalForm'])->name('personal.form');
 Route::post('/personal/form',[PersonalFormController::class,'storePersonalForm']);

Route::get('/flms',[FlmsController::class,'flmsStart'])->name('flms.start');
 Route::post('/flms',[FlmsController::class,'storeFlms']);

});

});

