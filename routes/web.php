<?php

use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController
};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Participant\Dashboard\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\Organization\Dashboard\DashboardController as OrganizationDashboardController;
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
/*Route::get('/', function(){
    return 'Algo';
});*/

Route::group(['as'=>'auth.'],function () {
    Route::group([ 'middleware'=>'guest'], function(){
        Route::get('register', [RegisterController::class, 'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');
        Route::get('login', [LoginController::class, 'create'])->name('login.create');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');

    });

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('login.destroy');
});




Route::group(['middleware'=>'auth'], function(){
    Route::get('participant/dashboard', [ParticipantDashboardController::class, 'index'])
        ->name('participant.dashboard.index')
        ->middleware('role:participant');

    Route::get('organization/dashboard', [OrganizationDashboardController::class, 'index'])
        ->middleware('role:organization');
});

