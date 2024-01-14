<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::name('api.')->middleware('lang')->group(function () {
    Route::get('dashboard', 'dashboardController@index')->name('dashboard');
    Route::get('category/project', 'categoryProjectController@index');
    Route::get('category/{id}/projects', 'categoryProjectController@show')->name('show.category');
    Route::get('project/{id}/show', 'ProjectController@show');
    Route::get('category/services', 'servicesCategoryController@index')->name('category.services');
    Route::get('services/{id}/show', 'servicesController@show')->name('show.services');
    Route::get('setting/{key}', 'settingController@index')->name('setting');
    Route::get('blog', 'blogController@index');
    Route::get('blog/{id}/show', 'blogController@show');
    //Route::get('lang', 'dashboardController@lang')->name('lang');
});

