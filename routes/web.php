<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.forgot');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.forgot');

Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.reset');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'can:admin-dashboard-access'
    ], function(){
    
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::put('/account', [AccountController::class, 'update'])->name('account');
    
        Route::resource('users', UserController::class)->middleware('can:user-access');
        Route::resource('posts', PostController::class)->middleware('can:post-access');
        Route::resource('permissions', PermissionController::class)->middleware('can:permission-access');
        Route::resource('roles', RoleController::class)->middleware('can:role-access');

    });
});
