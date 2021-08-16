<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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




Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');//
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('password/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('password/reset', [AuthController::class, 'passwordReset']);
Route::middleware('auth:web')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('admin/blog', 'App\Http\Controllers\Admin\BlogController');
    Route::resource('admin/work-package', 'App\Http\Controllers\Admin\WorkPackageController');
    Route::resource('admin/team', 'App\Http\Controllers\Admin\TeamController');
    Route::resource('admin/publication', 'App\Http\Controllers\Admin\PublicationController');
    Route::resource('admin/newsletter', 'App\Http\Controllers\Admin\NewsletterController');
    Route::resource('admin/gallery', 'App\Http\Controllers\Admin\GalleryController');
});
Route::get('/',[App\Http\Controllers\WebsiteController::class, 'index'])->name('website');





