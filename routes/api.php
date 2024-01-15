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
Route::middleware('Localization')->group(function () {

            /// route for dashboard ///
    Route::get('dashboard', 'dashboardController@index');
            // end of dashboard route ///

         /// route for category Project ///
    Route::get('category-project', 'categoryProjectController@index');
    Route::get('category-projects/{id}', 'categoryProjectController@show');
        // end of category Project route ///

            /// route for project ///
    Route::get('project/show/{id}', 'ProjectController@show');
          // end of project route ///

          /// route for category services ///
    Route::get('category-services', 'servicesCategoryController@index');
    Route::get('category-services/{id}', 'servicesCategoryController@show');
          // end of category services route ///

              /// route for services ///
    Route::get('services/show/{id}', 'servicesController@show');
             // end of services route ///

            /// route for setting ///
    Route::get('setting/{key}', 'settingController@index');
             // end of setting route ///

              /// route for blog ///
    Route::get('blog', 'blogController@index');
    Route::get('blog/show/{id}', 'blogController@show');
            // end of blog route ///

});

