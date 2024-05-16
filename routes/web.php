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
use App\Http\Controllers\Backend\TeamPlayerController;
use App\Http\Controllers\Backend\FixtureController;
use App\Http\Controllers\Backend\VanueController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ParticipantsController;
use App\Http\Controllers\Backend\UserController;

// Frontend
Route::get('/', [WebpageController::class, 'homepage'])->name('homepage');

Route::get('/matches', [WebpageController::class, 'match'])->name('matches');
Route::get('League/player/list', [WebpageController::class, 'playerList'])->name('league.player.list');

Route::get('/registration', [webpageController::class, 'registrationForm'])->name('registrationForm');
Route::post('/do-registration', [webpageController::class, 'doRegistration'])->name('do.registration');

Route::get('/login', [webpageController::class, 'loginForm'])->name('team.loginForm');
Route::post('/do-login', [webpageController::class, 'doLogin'])->name('team.login');

//auth
Route::group(['middleware' => 'authTeam'], function () {

    Route::get('/LeagueJoin', [WebpageController::class, 'joinLeague'])->name('league.join');
    Route::get('/customer-logout', [CustomerController::class, 'customerLogout'])->name('customer.logout');
    Route::get('/team-logout', [webpageController::class, 'teamLogout'])->name('team.logout');
});

// Backend
Route::group(['prefix' => 'admin'], function () {

    // LMS login&Logout
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/do-login', [UserController::class, 'doLogin'])->name('do.login');
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/admin', [HomeController::class, 'admin']);


        //Dashboard
        Route::get('/', [HomeController::class, 'user'])->name('dashboard');



        //League
        Route::get('/league/list', [LeagueController::class, 'leagueList'])->name('league.list');
        Route::get('/league/form', [LeagueController::class, 'leagueForm'])->name('league.form');
        Route::post('/league/form', [LeagueController::class, 'submitLeagueForm']);

        Route::get('/league/edit/{league_id}', [LeagueController::class, 'leagueEdit'])->name('league.edit');
        Route::put('/league/update/{league_id}', [LeagueController::class, 'leagueUpdate'])->name('league.update');
        Route::get('/league/view/{league_id}', [LeagueController::class, 'leagueView'])->name('league.view');
        Route::get('/league/delete/{league_id}', [LeagueController::class, 'leagueDelete'])->name('league.delete');

        //Season
        Route::get('/season/list', [SeasonController::class, 'seasonList'])->name('season.list');
        Route::get('/season/form', [SeasonController::class, 'seasonForm'])->name('season.form');
        Route::post('/season/form', [SeasonController::class, 'viewSeason'])->name('season.form');

        Route::get('/season/edit/{id}', [SeasonController::class, 'seasonEdit'])->name('season.edit');
        Route::put('/season/update/{id}', [SeasonController::class, 'seasonUpdate'])->name('season.update');
        Route::get('/season/view/{id}', [SeasonController::class, 'seasonView'])->name('season.view');
        Route::get('/season/delete/{id}', [SeasonController::class, 'seasonDelete'])->name('season.delete');

        //Team
        Route::get('/team/list', [TeamController::class, 'teamList'])->name('team.list');
        Route::get('/team/form', [TeamController::class, 'teamForm'])->name('team.form');
        Route::post('/team/form', [TeamController::class, 'submitTeamForm'])->name('team.form');

        Route::get('/team/edit/{id}', [TeamController::class, 'teamEdit'])->name('team.edit');
        Route::put('/team/update/{id}', [TeamController::class, 'teamUpdate'])->name('team.update');
        Route::get('/team/view/{id}', [TeamController::class, 'teamView'])->name('team.view');
        Route::get('/team/delete/{id}', [TeamController::class, 'teamDelete'])->name('team.delete');

        //Player
        Route::get('/player/list', [PlayerController::class, 'playerList'])->name('player.list');
        Route::get('/player/form', [PlayerController::class, 'playerForm'])->name('player.form');
        Route::post('/player/form', [PlayerController::class, 'viewPlayerForm'])->name('player.form');

        Route::get('/player/edit/{player_id}', [PlayerController::class, 'playerEdit'])->name('player.edit');
        Route::put('/player/update/{player_id}', [PlayerController::class, 'playerUpdate'])->name('player.update');
        Route::get('/player/view/{player_id}', [PlayerController::class, 'playerView'])->name('player.view');
        Route::get('/player/delete/{player_id}', [PlayerController::class, 'playerDelete'])->name('player.delete');

        //Team Player
        Route::get('/team/player/list', [TeamPlayerController::class, 'teamPlayerList'])->name('teamPlayer.list');
        Route::get('/team/player/form', [TeamPlayerController::class, 'teamPlayerForm'])->name('teamPlayer.form');
        Route::post('/team/player/form', [TeamPlayerController::class, 'viewTeamPlayerForm'])->name('TeamPlayer.form');

        Route::get('/team/player/edit/{id}', [TeamPlayerController::class, 'teamPlayerEdit'])->name('teamPlayer.edit');
        Route::put('/team/player/update/{id}', [TeamPlayerController::class, 'teamPlayerUpdate'])->name('teamPlayer.update');
        Route::get('/team/player/view/{id}', [TeamPlayerController::class, 'teamPlayerView'])->name('teamPlayer.view');
        Route::get('/team/player/delete/{id}', [TeamPlayerController::class, 'teamPlayerDelete'])->name('teamPlayer.delete');

        //Fixture
        Route::get('/fixture/list', [FixtureController::class, 'fixtureList'])->name('fixture.list');
        Route::get('/fixture/form', [FixtureController::class, 'fixtureForm'])->name('fixture.form');
        Route::post('/fixture/form', [FixtureController::class, 'submitFixtureForm'])->name('fixture.form');

        Route::get('/fixture/edit/{id}', [FixtureController::class, 'fixtureEdit'])->name('fixture.edit');
        Route::put('/fixture/update/{id}', [FixtureController::class, 'fixtureUpdate'])->name('fixture.update');
        Route::get('/fixture/view/{id}', [FixtureController::class, 'fixtureView'])->name('fixture.view');
        Route::get('/fixture/delete/{id}', [FixtureController::class, 'fixtureDelete'])->name('fixture.delete');

        //Vanue
        Route::get('/Venue/list', [VanueController::class, 'venueList'])->name('venue.list');
        Route::get('/Venue/form', [VanueController::class, 'venueForm'])->name('venue.form');
        Route::post('/Venue/form', [VanueController::class, 'submitVenueForm'])->name('venue.form');

        Route::get('/venue/edit/{venue_id}', [VanueController::class, 'venueEdit'])->name('venue.edit');
        Route::put('/venue/update/{venue_id}', [VanueController::class, 'venueUpdate'])->name('venue.update');
        Route::get('/venue/view/{venue_id}', [VanueController::class, 'venueView'])->name('venue.view');
        Route::get('/venue/delete/{venue_id}', [VanueController::class, 'venueDelete'])->name('venue.delete');

        //Participants
        Route::get('/participants', [ParticipantsController::class, 'participants'])->name('participants');


        //Category
        Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/form', [CategoryController::class, 'form'])->name('category.form');
        Route::post('/category/form', [CategoryController::class, 'submitForm'])->name('category.form');
    });
});
