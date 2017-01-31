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

Route::get('/donate', 'PagesController@donate');

Route::get('/join', 'PagesController@join');

Route::get('/contact/faq', 'PagesController@faq');

Route::get('/contact', 'PagesController@contact');

Route::get('/ypweekend2016', 'PagesController@ypweekend');

Route::get('/committee/{name}', 'PagesController@committees');

route::get('/events/fb/{id}', 'FacebookController@show');

Route::get('/volunteer/request', 'PagesController@volunteerRequest');

Route::get('/news/photos', 'FacebookController@photos');

Route::get('/album/{id}', 'FacebookController@showAlbum');

//Route::post('/webhooks/eventbrite/orders', 'WebhookController@ebOrders');

Route::post('/webhooks/financialMeetup2017/orders', 'WebhookController@financial2017Orders');

Route::post('/webhooks/membership2017/orders', 'WebhookController@membership2017Orders');

Route::post('/webhooks/ypweekend/orders', 'WebhookController@ypWeekendOrders');

Route::post('/webhooks/joinweekmixer2017/orders', 'WebhookController@joinWeekMixerOrders');

Route::get('/admin/create', 'AdminController@leadershipCreate');

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
    Route::post('/admin/store', 'AdminController@leadershipStore');
    Route::get('/admin/{id}/edit');
});
Route::get('/admin', 'AdminController@login');
Route::post('/admin', 'AdminController@dashboard');

