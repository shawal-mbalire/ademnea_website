<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


//Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/login', 'App\Http\Controllers\HomeController@login')->name('login');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');

Route::get('/next', 'App\Http\Controllers\HomeController@next')->name('next');

Route::get('/newsletter', 'App\Http\Controllers\HomeController@newsletter')->name('newsletter');

Route::get('/teams', 'App\Http\Controllers\HomeController@teams')->name('teams');

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/test', 'HomeController@test')->name('test');
//Route::get('/about', 'TestController@about')->name('about');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//According to Laravel 8, routes should be declared this way

//Route::get('/home', [HomeController::class, 'index'])->name('home');
