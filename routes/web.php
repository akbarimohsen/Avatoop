<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlayerManagementController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\TeamManagementController;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\User\Dashboard\UserDashboardcomponent;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('/admin/dashboard',[AdminController::class , 'index'])->name('admin.dashboard');

    // player management
    Route::get('/admin/players', [PlayerManagementController::class, 'index'])->name('admin.players');
    Route::get('/admin/players/add', [PlayerManagementController::class , 'add'])->name('admin.players.add');
    Route::get('/admin/players/edit/{id}', [PlayerManagementController::class, 'edit'])->name('admin.players.edit');


    //team management
    Route::get('/admin/teams', [TeamManagementController::class, 'index'])->name('admin.teams');
    Route::get('/admin/teams/add', [TeamManagementController::class, 'add'])->name('admin.teams.add');
    Route::get('/admin/teams/{id}/edit', [TeamManagementController::class, 'edit'])->name('admin.teams.edit');
    Route::get('/admin/teams/{id}/players',[TeamManagementController::class,'showPlayers'])->name('admin.team.players');

    //position management
    Route::get('/admin/positions',[PositionsController::class, 'index'])->name('admin.positions');
});

Route::middleware(['auth', 'verified','role:admin|user'])->prefix('admin/')->group(function(){
    Route::resource('/role',RoleController::class)->parameters(['role'=>'id']);
    Route::resource('/permission',\App\Http\Controllers\PermissionController::class)->parameters(['permission'=>'id']);
    Route::resource('/user',\App\Http\Controllers\AdminCreateUser::class)->parameters(['user'=>'id']);
});

