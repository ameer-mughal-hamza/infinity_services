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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('services', 'ServiceController@api_index');
Route::get('subservices/{title}', 'SubserviceController@api_index');
Route::post('consumer/register', 'ConsumerController@registerUser');
Route::post('consumer/saveProfile', 'ConsumerController@saveProfile');
Route::get('consumer/userProfileData/{email}', 'ConsumerController@userProfileData');