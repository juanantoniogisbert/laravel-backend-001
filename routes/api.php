<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::post('auth/register', 'API\AuthController@register');
    Route::post('auth', 'API\AuthController@login');
    // Route::get('user', 'API\AuthController@userFromJwt')->middleware('auth.api');
    Route::get('user', 'API\UserController@index');

    Route::resource('offices', 'API\OfficesController')->except(['show']);
    Route::get('offices/{slug}', 'API\OfficesController@findSlug');

    Route::resource('employers', 'API\EmployerController');

    Route::get('tags', function () {
        error_log('hola');
        return json_encode(array('hola', 'pipo'));
    });
});