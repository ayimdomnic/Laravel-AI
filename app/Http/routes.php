<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
#WebHook Routes

Route::post('/webhook',['as'=>'webkook.index','uses' => 'WebhookController@webhook']);
Route::get('/webhook/register',['as'=>'webhook.register','uses' => 'WebhookController@register']);
Route::get('/webhook/remove',['as'=>'webhook.remove','uses' => 'WebhookController@remove']);

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
