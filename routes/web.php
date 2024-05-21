<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebpageController;
use App\Http\Controllers\Frontend\MyTeamController;
use App\Http\Controllers\Frontend\WebPlayerController;
use App\Http\Controllers\Frontend\WebFixtureController;
use App\Http\Controllers\Frontend\WebPointTableController;

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
use App\Http\Controllers\Backend\TeamLeagueController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PointTableController;

// Frontend
Route::get('/', [WebpageController::class, 'homepage'])->name('homepage');

Route::get('/league', [WebpageController::class, 'league'])->name('league');
Route::get('/team-list', [WebpageController::class, 'teamList'])->name('view.teamList');

Route::get('League/player/list', [WebpageController::class, 'playerList'])->name('league.player.list');

Route::get('/fixture',[WebFixtureController::class,'webFixture'])->name('web.fixture');

Route::get('/point-table',[WebPointTableController::class,'webPointTable'])->name('web.pointTable');

Route::get('/team-registration', [webpageController::class, 'registrationForm'])->name('registrationForm');
Route::post('/do-registration', [webpageController::class, 'doRegistration'])->name('do.registration');
Route::get('/login', [webpageController::class, 'loginForm'])->name('team.loginForm');
Route::post('/do-login', [webpageController::class, 'doLogin'])->name('team.login');

//Web Player Registration & Login
Route::get('/player-registration', [WebPlayerController::class, 'playerRegistrationForm'])->name('player.registrationForm');
Route::post('/do-player-registration', [WebPlayerController::class, 'doPlayerRegistration'])->name('doPlayer.Registration');
Route::get('/player-login', [WebPlayerController::class, 'playerLoginForm'])->name('player.login');
Route::post('/do-player-login', [WebPlayerController::class, 'doPlayerLogin'])->name('player.login');



//auth
Route::group(['middleware' => 'authTeam'], function () {

    Route::get('/LeagueJoin/{league_id}', [WebpageController::class, 'joinLeague'])->name('league.join');

    Route::get('/my-team', [webpageController::class, 'myTeam'])->name('myTeam');
    Route::get('/add/player/{id}', [MyTeamController::class, 'addPlayerToTeam'])->name('add.player');
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

        //TeamLeague
        Route::get('/team/league/list', [TeamLeagueController::class, 'teamLeagueList'])->name('teamLeague.list');
        Route::get('/team/league/form', [TeamLeagueController::class, 'teamLeagueForm'])->name('teamLeague.form');
        Route::post('/team/league/form', [TeamLeagueController::class, 'viewTeamLeagueForm'])->name('teamLeague.form');

        Route::get('/team/league/delete/{id}', [TeamLeagueController::class, 'teamLeagueDelete'])->name('team.league.delete');


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

        //Point Table
        Route::get('/point-table/list', [PointTableController::class, 'pointTableList'])->name('pointTable.list');
        Route::get('/point-table/form', [PointTableController::class, 'pointTableform'])->name('pointTable.form');
        Route::post('/point-table/form', [PointTableController::class, 'submitPointTableform'])->name('pointTable.form');

        Route::get('/point-table/edit{point_id}', [PointTableController::class, 'PointTableEdit'])->name('pointTable.edit');
        Route::put('/point-table/update/{point_id}', [PointTableController::class, 'PointTableUpdate'])->name('pointTable.update');
        Route::get('/point-table/view/{point_id}', [PointTableController::class, 'PointTableView'])->name('pointTable.view');
        Route::get('/point-table/delete/{point_id}', [PointTableController::class, 'PointTableDelete'])->name('pointTable.delete');

        //Category
        Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/form', [CategoryController::class, 'form'])->name('category.form');
        Route::post('/category/form', [CategoryController::class, 'submitForm'])->name('category.form');
    });
});
