<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['middleware' => 'auth:api'], function(){
// 	Route::post('details', 'API\UserController@details');
// });
Route::apiResources(['user'=> 'API\UserController']);
Route::get('profile', 'API\UserController@profile');
