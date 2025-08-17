<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Back\BackHome;
use App\Http\Controllers\FrontHome;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// FRONT ROUTE
Route::prefix('/front')->name('front.')->group(function () {
    Route::get('/', FrontHome::class)->middleware('auth')->name('index');
});

require __DIR__ . '/auth.php';



// BACK ROUTE
Route::prefix('/back')->name('back.')->group(function () {
    Route::get('/', BackHome::class)->middleware('admin')->name('index');

    //Role Module
    Route::controller(RoleController::class)->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // Admins Module
    Route::controller(AdminController::class)->group(function () {
        Route::resource('admins', AdminController::class);
    });

    // Users Module
    Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class);
    });

    require __DIR__ . '/adminAuth.php';
});



Route::get('/', function () {
    return view('welcome');
});