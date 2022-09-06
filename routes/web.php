<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\PlayerManagementController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\ReportersMangementController;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\sendEmailController;
use App\Http\Controllers\Admin\SuggestionController;
use App\Http\Controllers\Admin\TeamManagementController;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\User\Dashboard\UserDashboardcomponent;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\User\AudioNewsController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\TeamsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reporter\NewsController as ReporterNewsController;
use App\Http\Controllers\Admin\EmailsController;
use App\Http\Controllers\UserIndexController;


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

Route::get('/', [MainController::class, 'index']);

Route::get('/newsShow/{id}', [UserIndexController::class, 'newsShow'])->name('newsShow');


Route::middleware(['auth', 'verified', 'role:user|admin'])->group(function () {

    // Profile Management
    Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');
    // emails of admin show
    Route::get('/user/adminEmails', [UserController::class, 'adminEmails'])->name('user.adminEmails');

    // teams routes
    Route::get('/user/popularTeams', [TeamsController::class, 'showPopularTeams'])->name('user.popularTeams');
    Route::get('/user/popularTeams/add', [TeamsController::class, 'addPopularTeam'])->name('user.popularTeams.add');
    Route::get('/user/popularTeams/{id}/delete', [TeamsController::class, 'deletePopularTeam'])->name('user.popularTeams.delete');


    // audio news routes
    Route::get('/user/audioNews', [AudioNewsController::class, 'index'])->name('user.audioNews');

    // emails of admin show
    Route::get('/user/adminEmails', [UserController::class, 'adminEmails'])->name('user.adminEmails');


    // favorite teams news
    Route::get('/user/favoriteTeamsNews', [NewsController::class, 'favoriteTeamsNews'])->name('user.favoriteTeamsNews');
});


Route::middleware(['auth', 'verified', 'role:admin|user'])->group(function () {


    // users management
    Route::resource('/admin/user', \App\Http\Controllers\AdminCreateUser::class)->parameters(['user' => 'id']);

    // role and permissions management
    Route::resource('/admin/role', RoleController::class)->parameters(['role' => 'id']);
    Route::resource('/admin/permission', \App\Http\Controllers\PermissionController::class)->parameters(['permission' => 'id']);
    Route::post('/admin/give-permission/{role}', [RoleController::class, 'givePermission'])->name('role.permission');
    Route::delete('/admin/role/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');

    //create category
    Route::resource('/admin/category', \App\Http\Controllers\Reporter\CategoryController::class)->parameters(['category' => 'id']);


    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // player management
    Route::get('/admin/players', [PlayerManagementController::class, 'index'])->name('admin.players');
    Route::get('/admin/players/add', [PlayerManagementController::class, 'add'])->name('admin.players.add');
    Route::get('/admin/players/edit/{id}', [PlayerManagementController::class, 'edit'])->name('admin.players.edit');


    // team management
    Route::get('/admin/teams', [TeamManagementController::class, 'index'])->name('admin.teams');
    Route::get('/admin/teams/add', [TeamManagementController::class, 'add'])->name('admin.teams.add');
    Route::get('/admin/teams/{id}/edit', [TeamManagementController::class, 'edit'])->name('admin.teams.edit');
    Route::get('/admin/teams/{id}/players', [TeamManagementController::class, 'showPlayers'])->name('admin.team.players');

    // position management
    Route::get('/admin/positions', [PositionsController::class, 'index'])->name('admin.positions');

    // league management
    Route::resource('/admin/leagues', \App\Http\Controllers\Admin\LeagueManagementController::class);


    // Ads Management
    Route::get('/admin/ads', [AdsController::class, 'index'])->name('admin.ads');
    Route::get('/admin/ads/add', [AdsController::class, 'add'])->name('admin.ads.add');
    Route::get('/admin/ads/{id}/edit', [AdsController::class, 'edit'])->name('admin.ads.edit');

    // suggests controller
    Route::get('/admin/suggests', [SuggestionController::class, 'index'])->name('admin.suggests');
    Route::get('/admin/suggests/{id}', [SuggestionController::class, 'show'])->name('admin.suggests.show');

    // rules controller
    Route::resource('/admin/rules', RulesController::class);
    Route::resource('/admin/tag', TagController::class)->parameters(['tag' => 'id']);


    // send email controller
    Route::get('/admin/emails/showEmails', [EmailsController::class, 'showEmails'])->name('admin.emails.showEmails');
    Route::get('/admin/emails/showUsers', [EmailsController::class, 'showUsers'])->name('admin.emails.showUsers');
    Route::get('/admin/emails/writeEmail', [EmailsController::class, 'writeEmail'])->name('admin.emails.writeEmail');
    Route::post('/admin/emails/sendEmail', [EmailsController::class, 'sendEmail'])->name('admin.emails.sendEmail');
    Route::get('/admin/email/showEmail/{id}', [EmailsController::class, 'showEmail'])->name('admin.emails.showEmail');

    //     all rss methods
    Route::resource('admin/rss', \App\Http\Controllers\RssController::class)->parameters(['rss' => 'id']);

    // reporters controller
    Route::get('/admin/reporters', [ReportersMangementController::class, 'reportersList'])->name('admin.reporters');
    Route::get('/admin/reporters/PostedNews/{category?}', [ReportersMangementController::class, 'showPostedNews'])->name('admin.reporters.showPostedNews');
});
// Reporter routes
Route::middleware(['auth', 'role:admin|reporter'])->group(function () {
    Route::resource('/reporter/news', ReporterNewsController::class)->parameters(['news' => 'id']);
});
