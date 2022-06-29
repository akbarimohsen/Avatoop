<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\PlayerManagementController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\SuggestionController;
use App\Http\Controllers\Admin\TeamManagementController;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\User\Dashboard\UserDashboardcomponent;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reporter\NewsController;

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



Route::middleware(['auth', 'verified','role:admin|user'])->group(function(){


    // users management
    Route::resource('/admin/user',\App\Http\Controllers\AdminCreateUser::class)->parameters(['user'=>'id']);

    // role and permissions management
    Route::resource('/admin/role',RoleController::class)->parameters(['role'=>'id']);
    Route::resource('/admin/permission',\App\Http\Controllers\PermissionController::class)->parameters(['permission'=>'id']);
    Route::post('/admin/give-permission/{role}',[RoleController::class,'givePermission'])->name('role.permission');
    Route::delete('/admin/role/{role}/permission/{permission}',[RoleController::class,'revokePermission'])->name('role.permission.revoke');

    //create category
    Route::resource('/admin/category',\App\Http\Controllers\Reporter\CategoryController::class)->parameters(['category'=>'id']);


    Route::get('/admin/dashboard',[AdminController::class , 'index'])->name('admin.dashboard');

    // player management
    Route::get('/admin/players', [PlayerManagementController::class, 'index'])->name('admin.players');
    Route::get('/admin/players/add', [PlayerManagementController::class , 'add'])->name('admin.players.add');
    Route::get('/admin/players/edit/{id}', [PlayerManagementController::class, 'edit'])->name('admin.players.edit');


    // team management
    Route::get('/admin/teams', [TeamManagementController::class, 'index'])->name('admin.teams');
    Route::get('/admin/teams/add', [TeamManagementController::class, 'add'])->name('admin.teams.add');
    Route::get('/admin/teams/{id}/edit', [TeamManagementController::class, 'edit'])->name('admin.teams.edit');
    Route::get('/admin/teams/{id}/players',[TeamManagementController::class,'showPlayers'])->name('admin.team.players');

    // position management
    Route::get('/admin/positions',[PositionsController::class, 'index'])->name('admin.positions');



    // Ads Management
    Route::get('/admin/ads',[AdsController::class, 'index'])->name('admin.ads');
    Route::get('/admin/ads/add', [AdsController::class,'add'])->name('admin.ads.add');
    Route::get('/admin/ads/{id}/edit',[AdsController::class, 'edit'])->name('admin.ads.edit');

    // suggests controller
    Route::get('/admin/suggests',[ SuggestionController::class, 'index' ])->name('admin.suggests');
    Route::get('/admin/suggests/{id}', [ SuggestionController::class, 'show' ])->name('admin.suggests.show');

    // rules controller
    Route::resource('/admin/rules', RulesController::class);

});
Route::middleware(['auth','role:admin|reporter'])->group(function (){
    Route::resource('/reporter/news',NewsController::class)->parameters(['news'=>'id']);
});

