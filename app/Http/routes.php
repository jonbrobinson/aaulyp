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

Route::get('/', function () {
    return view('home');
});

Route::get('/aaulyp', function () {
    return view('pages.aaulyp');
});

Route::get('/aaul', function () {
    return view('pages.aaul');
});

Route::get('/board', function () {
    return view('pages.board');
});

Route::get('/team/join', function () {
    return view('pages.join');
});

Route::get('/contact/faq', function () {
    return view('pages.faq');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('{zip}/{street}', 'EventsController@show');
Route::resource('events', 'EventsController');
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

Route::group(['middleware' => ['web']], function () {
    //
});
