<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\EmailsController;
use App\Http\Controllers\Admin\LeagueManagementController;
use App\Http\Controllers\Admin\PlayerManagementController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\ReportersMangementController;
use App\Http\Controllers\Admin\SuggestionController;
use App\Http\Controllers\Admin\TeamManagementController;
use App\Http\Controllers\AdminCreateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Reporter\CategoryController;
use App\Http\Controllers\Reporter\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RssController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\User\AudioNewsController;
use App\Http\Controllers\User\TeamsController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\UserIndexController;
use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

//loginPhone
//Route::get('/login-phone', [AuthController::class, 'loginPhone'])->name('loginPhone');
Route::post('/login-phone', [AuthController::class, 'doLoginPhone'])->name('doLoginPhone');

//Route::get('/verify/show/{slug}', [AuthController::class, 'verify'])->name('verify');
Route::post('/doVerify/show/{id}', [AuthController::class, 'doVerify'])->name('doVerifyyy');

//Route::get('/main', [AdminController::class, 'main'])->middleware('auth:api');
//slider
//Route::get('/indexslider', [UserController::class, 'indexSlider']);
Route::get('/indexadds', [UserIndexController::class, 'indexadds'])->name('indexadds');
Route::get('/indexnews', [UserIndexController::class, 'indexnews'])->name('indexnews');
Route::get('/topview', [UserIndexController::class, 'topview'])->name('topview');
Route::post('/suggestion', [UserIndexController::class, 'suggestion']);

Route::get('/newsShow/{id}', [UserIndexController::class, 'newsShow']);
Route::get('/bookmark', [UserIndexController::class, 'bookMark']);

//profile
Route::post('/profile/store', [UserController::class, 'store'])->middleware('auth:api');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

///////////////////////////////////////

//Route::middleware(['auth:api', 'verified', 'role:user|admin'])->group(function () {

//Profile Management
Route::get('/user/profile', [App\Http\Controllers\User\UserController::class, 'showProfile'])->middleware('auth:api');
// emails of admin show
Route::get('/user/adminEmails', [App\Http\Controllers\User\UserController::class, 'adminEmails'])->middleware('auth:api');


// teams routes
Route::get('/user/popularTeams', [TeamsController::class, 'showPopularTeams'])->middleware('auth:api');
Route::get('/user/popularTeams/{id}/add', [TeamsController::class, 'addPopularTeam'])->middleware('auth:api');
Route::get('/user/popularTeams/{id}/delete', [TeamsController::class, 'deletePopularTeam'])->middleware('auth:api');


// audio news routes
Route::get('/user/audioNews', [AudioNewsController::class, 'index'])->middleware('auth:api');


// favorite teams news
Route::get('/user/favoriteTeamsNews', [NewsController::class, 'favoriteTeamsNews'])->middleware('auth:api');
//});


// Route::middleware(['auth:api', 'verified', 'role:admin|user'])->group(function () {


// users management
// Route::resource('/admin/user', AdminCreateUser::class)->parameters(['user' => 'id'])->middleware('auth:api');

// role and permissions management
// Route::resource('/admin/role', RoleController::class)->parameters(['role' => 'id']);
// Route::resource('/admin/permission', PermissionController::class)->parameters(['permission' => 'id']);
// Route::post('/admin/give-permission/{role}', [RoleController::class, 'givePermission'])->name('role.permission');
// Route::delete('/admin/role/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');

//create category
// Route::resource('/admin/category', CategoryController::class)->parameters(['category' => 'id'])->middleware('auth:api');


// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// player management
// Route::get('/admin/players', [PlayerManagementController::class, 'index'])->name('admin.players');
// Route::get('/admin/players/add', [PlayerManagementController::class, 'add'])->name('admin.players.add');
// Route::get('/admin/players/edit/{id}', [PlayerManagementController::class, 'edit'])->name('admin.players.edit');


// team management
// Route::get('/admin/teams', [TeamManagementController::class, 'index'])->name('admin.teams');
// Route::get('/admin/teams/add', [TeamManagementController::class, 'add'])->name('admin.teams.add');
// Route::get('/admin/teams/{id}/edit', [TeamManagementController::class, 'edit'])->name('admin.teams.edit');
// Route::get('/admin/teams/{id}/players', [TeamManagementController::class, 'showPlayers'])->name('admin.team.players');

// position management
// Route::get('/admin/positions', [PositionsController::class, 'index'])->name('admin.positions');

// // league management
// Route::resource('/admin/leagues', LeagueManagementController::class);


// Ads Management
// Route::get('/admin/ads', [AdsController::class, 'index'])->name('admin.ads');
// Route::get('/admin/ads/add', [AdsController::class, 'add'])->name('admin.ads.add');
// Route::get('/admin/ads/{id}/edit', [AdsController::class, 'edit'])->name('admin.ads.edit');

// suggests controller
// Route::get('/admin/suggests', [SuggestionController::class, 'index'])->name('admin.suggests');
// Route::get('/admin/suggests/{id}', [SuggestionController::class, 'show'])->name('admin.suggests.show');

// rules controller
// Route::resource('/admin/rules', RoleController::class);
// Route::resource('/admin/tag', TagController::class)->parameters(['tag' => 'id']);


// send email controller
// Route::get('/admin/emails/showEmails', [EmailsController::class, 'showEmails'])->name('admin.emails.showEmails');
// Route::get('/admin/emails/showUsers', [EmailsController::class, 'showUsers'])->name('admin.emails.showUsers');
// Route::get('/admin/emails/writeEmail', [EmailsController::class, 'writeEmail'])->name('admin.emails.writeEmail');
// Route::post('/admin/emails/sendEmail', [EmailsController::class, 'sendEmail'])->name('admin.emails.sendEmail');
// Route::get('/admin/email/showEmail/{id}', [EmailsController::class, 'showEmail'])->name('admin.emails.showEmail');

//     all rss methods
Route::resource('admin/rss', RssController::class)->parameters(['rss' => 'id']);

// reporters controller
Route::get('/admin/reporters', [ReportersMangementController::class, 'reportersList'])->name('admin.reporters');
Route::get('/admin/reporters/PostedNews/{category?}', [ReportersMangementController::class, 'showPostedNews'])->name('admin.reporters.showPostedNews');
// });

// Reporter routes
Route::middleware(['auth', 'role:admin|reporter'])->group(function () {
    Route::resource('/reporter/news', NewsController::class)->parameters(['news' => 'id']);
});
