<?php

use App\Http\Controllers\AdminController;
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

Route::middleware(['auth', 'verified','role:admin'])->prefix('admin/panel/')->group(function(){

    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/role',RoleController::class)->parameters(['role'=>'id']);
    Route::resource('/permission',\App\Http\Controllers\PermissionController::class)->parameters(['permission'=>'id']);
    Route::resource('/user',\App\Http\Controllers\AdminCreateUser::class)->parameters(['user'=>'id']);
});




// Route::middleware([
//     'auth:sanctum'gi,
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardcomponent::class)->name('user.dashboard');
});

