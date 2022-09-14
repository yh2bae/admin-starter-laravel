<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->prefix('admin-panel')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login.admin');
    Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('loginCheck');
});


Route::middleware('isAdmin')->group(function () {
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::middleware('isAdmin')->prefix('admin-panel')->group(function () {

    // Logout
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Change Theme
    Route::get('changeTheme/{user}', [DashboardController::class, 'changeTheme'])->name('changeTheme');

    // Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/password', [DashboardController::class, 'profilePassword'])->name('admin.profile.password');
    Route::put('/profile/{id}/update', [DashboardController::class, 'profileUpdate'])->name('admin.profile.update');
});
