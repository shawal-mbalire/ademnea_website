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
    Route::resource('admin/tasks', 'App\Http\Controllers\Admin\TaskController');
    Route::resource('admin/work-package', 'App\Http\Controllers\Admin\WorkPackageController');
    Route::resource('admin/scholarship', 'App\Http\Controllers\Admin\ScholarshipsController');
    Route::resource('admin/team', 'App\Http\Controllers\Admin\TeamController');
    Route::resource('admin/publication', 'App\Http\Controllers\Admin\PublicationController');
    Route::resource('admin/newsletter', 'App\Http\Controllers\Admin\NewsletterController');
    Route::resource('admin/gallery', 'App\Http\Controllers\Admin\GalleryController');   
    Route::resource('admin/research-profile', 'App\Http\Controllers\Admin\ResearchProfileController'); 
});
Route::get('displaynewsletter', [App\Http\Controllers\DisplayNewsletterController::class, 'displayNewsletter']);
Route::get('displaypublication', [App\Http\Controllers\DisplayPublicationController::class, 'displayPublication']);
Route::get('/',[App\Http\Controllers\WebsiteController::class, 'index'])->name('website');
Route::get('workpackages/{id}', [App\Http\Controllers\WorkpackagesController::class, 'workpackages'])->name('workpakages');


Route::get('/mastersscholarship-uganda', [App\Http\Controllers\Admin\MastersController::class, 'uganda'])->name('mastersscholarship-uganda');
Route::get('/mastersscholarship-sudan', [App\Http\Controllers\Admin\MastersController::class, 'sudan'])->name('mastersscholarship-sudan');
Route::get('/mastersscholarship-tanzania', [App\Http\Controllers\Admin\MastersController::class, 'tanzania'])->name('mastersscholarship-tanzania');

Route::get('/phdscholarship-uganda', [App\Http\Controllers\Admin\PhdController::class, 'uganda'])->name('phdscholarship-uganda');
Route::get('/phdscholarship-sudan', [App\Http\Controllers\Admin\PhdController::class, 'sudan'])->name('phdscholarship-sudan');
Route::get('/phdscholarship-tanzania', [App\Http\Controllers\Admin\PhdController::class, 'tanzania'])->name('phdscholarship-tanzania');

Route::get('/mastersprofile-uganda', [App\Http\Controllers\Admin\ResearchProfileController::class, 'uganda'])->name('mastersprofile-uganda');
Route::get('/mastersprofile-sudan', [App\Http\Controllers\Admin\ResearchProfileController::class, 'sudan'])->name('mastersprofile-sudan');
Route::get('/mastersprofile-tanzania', [App\Http\Controllers\Admin\ResearchProfileController::class, 'tanzania'])->name('mastersprofile-tanzania');

Route::get('/phdprofile-uganda', [App\Http\Controllers\WebsiteController::class, 'uganda'])->name('phdprofile-uganda');
Route::get('/phdprofile-sudan', [App\Http\Controllers\WebsiteController::class, 'sudan'])->name('phdprofile-sudan');
Route::get('/phdprofile-tanzania', [App\Http\Controllers\WebsiteController::class, 'tanzania'])->name('phdprofile-tanzania');

Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/admin/tasks/create/{id}', [App\Http\Controllers\Admin\TaskController::class, 'create']);
