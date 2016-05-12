<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PagesController@home');

Route::get('/aaulyp', 'PagesController@aaulyp');

Route::get('/aaul', 'PagesController@aaul');

Route::get('/board', 'PagesController@board');

Route::get('/team/join', 'PagesController@join');

Route::get('/contact/faq', 'PagesController@faq');

Route::get('/contact', 'PagesController@contact');

Route::get('/committee/{name}', 'PagesController@committees');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('events', 'EventsController');
    Route::get('{zip}/{name}', 'EventsController@show');
    Route::post('{zip}/{name}/photos', 'EventsController@addPhoto');
    Route::post('/contact', 'HomeController@contact');
});
