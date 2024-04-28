<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api\V1', 'prefix' => 'v1'], function () {

    /*Routes for user authentication */
    Route::post('login', 'UserController@login');

    /*Routes for farm related information */
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/farms', 'FarmController@index');
    });

    /*Routes for fetching hive parameter data given a certain date range */
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', 'UserController@logout');
        Route::get('hives/{hive_id}/temperature/{from_date}/{to_date}', 'HiveParameterDataController@getTemperatureForDateRange');
        Route::get('hives/{hive_id}/humidity/{from_date}/{to_date}', 'HiveParameterDataController@getHumidityForDateRange');
        Route::get('hives/{hive_id}/weight/{from_date}/{to_date}', 'HiveParameterDataController@getWeightForDateRange');
        Route::get('hives/{hive_id}/carbondioxide/{from_date}/{to_date}', 'HiveParameterDataController@getCarbondioxideForDateRange');
    });

    /*Routes for fetching hive media data given a certain date range */
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('hives/{hive_id}/images/{from_date}/{to_date}', 'HiveMediaDataController@getImagesForDateRange');
        Route::get('hives/{hive_id}/videos/{from_date}/{to_date}', 'HiveMediaDataController@getVideosForDateRange');
        Route::get('hives/{hive_id}/audios/{from_date}/{to_date}', 'HiveMediaDataController@getAudiosForDateRange');
    });
});