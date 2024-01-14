<?php

use App\Http\Controllers\Dashboard\AuthController;
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

Route::prefix('admin')->namespace('Dashboard')->group(function () {

    /* Auth Routes */
    Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthController@login')->name('admin.login.post');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    Route::get('reset-password', 'AuthController@reset')->name('admin.reset');
    Route::post('send-link', 'AuthController@sendLink')->name('admin.sendLink');
    Route::get('changePassword/{code}', 'AuthController@changePassword')->name('admin.changePassword');
    Route::post('update-password', 'AuthController@updatePassword')->name('admin.updatePassword');
});

Route::prefix('admin')->middleware('auth')->namespace('Dashboard')->name('admin.')->group(function () {

    Route::get('/', 'DashboardController@home')->name('home');

    Route::resource('books', 'BookController');

    Route::post('blogs/status','BlogController@status')->name('blogs.status');
    Route::Delete('blogs/bulk_delete', 'BlogController@bulk_delete')->name('blogs.bulk_delete');
    Route::resource('blogs', 'BlogController');


    Route::post('categories/status','CategoryController@status')->name('categories.status');
    Route::Delete('categories/bulk_delete', 'CategoryController@bulk_delete')->name('categories.bulk_delete');
    Route::resource('categories', 'CategoryController');

    Route::post('servicesCategories/status','ServiceCategoryController@status')->name('servicesCategories.status');
    Route::Delete('servicesCategories/bulk_delete', 'ServiceCategoryController@bulk_delete')->name('servicesCategories.bulk_delete');
    Route::resource('servicesCategories', 'ServiceCategoryController');

    Route::post('services/status','ServiceController@status')->name('services.status');
    Route::Delete('services/bulk_delete', 'ServiceController@bulk_delete')->name('services.bulk_delete');
    Route::resource('services', 'ServiceController');

    Route::get('district/{id}', 'projectController@district')->name('district');

    Route::post('projects/status','projectController@status')->name('projects.status');
    Route::Delete('projects/bulk_delete', 'projectController@bulk_delete')->name('projects.bulk_delete');
    Route::resource('projects', 'projectController');


    Route::resource('articles', 'ArticleController');

    Route::resource('videos', 'VideoController');

    Route::resource('settings', 'SettingController');

    Route::get('contacts', 'ContactController@index')->name('contacts.index');

    Route::get('contacts/{id}', 'ContactController@show')->name('contacts.show');

    Route::get('contacts/{id}/reply', 'ContactController@showReplyForm')->name('contacts.reply');

    Route::post('contacts/send-reply', 'ContactController@sendReply')->name('contacts.sendReply');

    Route::delete('contacts/{id}', 'ContactController@deleteMsg')->name('contacts.deleteMsg');

    Route::get('mail-list', 'MailListController@index')->name('mail.index');

    Route::delete('mail-list/{id}', 'MailListController@deleteMail')->name('mail.deleteMail');

    Route::get('profile', 'ProfileController@getProfile')->name('profile');

    Route::post('update-profile', 'ProfileController@updateProfile')->name('update_profile');
});

Route::namespace('Site')->name('site.')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('about-us', 'HomeController@about')->name('about');

    // Books Routes
    Route::get('books', 'BookController@index')->name('books.index');
    Route::get('book-details/{id}', 'BookController@show')->name('books.show');
    Route::get('book-download/{id}', 'BookController@downloadBook')->name('books.downloadBook');

    // Articles Routes
    Route::get('articles', 'ArticleController@index')->name('articles.index');
    Route::get('article-details/{id}', 'ArticleController@showArticle')->name('articles.show.article');
    Route::get('research-details/{id}', 'ArticleController@showResearch')->name('articles.show.research');
    Route::get('research-download/{id}', 'ArticleController@downloadResearch')->name('articles.downloadResearch');

    // Videos Routes
    Route::get('videos', 'VideoController@index')->name('videos.index');
    Route::get('video-show', 'VideoController@index')->name('video');

    // Contact Routes
    Route::get('contact', 'ContactController@showForm')->name('contact');
    Route::post('contact/send', 'ContactController@sendContact')->name('contact.sendContact');

    // Mail List Routes
    Route::post('mail-list', 'HomeController@mailList')->name('mail');

    // search
    Route::get('search', 'HomeController@search')->name('search');

});
