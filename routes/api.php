<?php

use App\Http\Controllers\Admin\ReportersMangementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Reporter\NewsController;
use App\Http\Controllers\RssController;
use App\Http\Controllers\RssLikeController;
use App\Http\Controllers\User\ArrangeController;
use App\Http\Controllers\User\AudioNewsController;
use App\Http\Controllers\User\NewsController as UserNewsController;
use App\Http\Controllers\User\TeamsController;
use App\Http\Controllers\UserIndexController;
use App\Http\Controllers\User\UserController;
use App\Models\User;
use App\Notifications\OTPSms;
use Illuminate\Support\Facades\Auth;

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
Route::post('/doVerify/show/{id}', [AuthController::class, 'doVerify'])->name('doVerifyyy')->where(['id' => '[a-zA-Z0-9]+']);
//andriod
Route::post('/andriod/token', [AuthController::class, 'andriod']);

//Route::get('/main', [AdminController::class, 'main'])->middleware('auth:api');
//slider
Route::get('/indexslider', [UserIndexController::class, 'indexSlider']);
Route::get('/indexadds', [UserIndexController::class, 'indexadds'])->name('indexadds');
Route::get('/indexnews', [UserIndexController::class, 'indexnews'])->name('indexnews');
//andriod
Route::get('andriod/indexnews', [UserIndexController::class, 'andriodIndexnews'])->name('andriodIndexnews');
//
Route::get('/topview', [UserIndexController::class, 'topview'])->name('topview');
Route::post('/suggestion', [UserIndexController::class, 'suggestion']);

Route::get('/newsShow/{id}', [UserIndexController::class, 'newsShow'])->where(['id' => '[a-zA-Z0-9]+']);
Route::get('/bookmark', [UserIndexController::class, 'bookMark']);

Route::post('/rss/comment/store',[UserIndexController::class,'storeComment']);

//profile
Route::post('/profile/store', [UserController::class, 'store'])->middleware('auth:api');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth:api');
Route::get('/userProfile', [UserController::class, 'userProfile'])->middleware('auth:api');
Route::get('/allTeams', [UserController::class, 'allTeams'])->middleware('auth:api');

// leagues routes
Route::get('leagues/{id}/data', [MainController::class, 'showLeagueData']);


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
Route::post('/user/add/arrange', [TeamsController::class, 'addPopularTeam'])->middleware('auth:api');
Route::post('/user/popularTeams/{id}/delete', [TeamsController::class, 'deletePopularTeam'])->middleware('auth:api')->where(['id' => '[a-zA-Z0-9]+']);




// audio news routes
Route::get('/user/audioNews', [AudioNewsController::class, 'index'])->middleware('auth:api');


// favorite teams news
Route::get('/user/favoriteTeamsNews', [UserNewsController::class, 'favoriteTeamsNews'])->middleware('auth:api');
Route::get('/user/favoriteTeamsRsses', [UserNewsController::class, 'favoriteTeamsRsses'])->middleware('auth:api');

//});

//Like
Route::post('/rss/{id}/like', [RssLikeController::class, 'store'])->middleware('auth:api')->where(['id' => '[a-zA-Z0-9]+']);
Route::get('/rss/{id}/like', [RssLikeController::class, 'destroy'])->middleware('auth:api')->where(['id' => '[a-zA-Z0-9]+']);
Route::get('/showprolike/{id}', [RssLikeController::class, 'showprolike'])->where(['id' => '[a-zA-Z0-9]+']);
Route::get('/rss/likeTest/{id}', [RssLikeController::class, 'rssliketest'])->middleware('auth:api')->where(['id' => '[a-zA-Z0-9]+']);


Route::get('/team/showPlayersTeam', [TeamsController::class, 'showPopularTeams'])->middleware('auth:api');

Route::get('/arrange', [ArrangeController::class, 'index'])->middleware('auth:api');

Route::post('/arrange/update', [ArrangeController::class, 'update'])->middleware('auth:api');

Route::get('/schematic', [ArrangeController::class, 'showAll']);

//rss with an special tag

Route::get('news/special/tag/{tag}',[UserIndexController::class,'rssTags'])->where(['id' => '[a-zA-Z0-9]+']);

//rssIp
Route::get('/rssUserIp', [RssController::class, 'rssUserIp']);

//


Route::get('/test', function() {
    $user = User::find(1);
    $user->notify(new OTPSms(1234));
})->middleware('auth:api');
