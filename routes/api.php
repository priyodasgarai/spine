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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/new', function( Request $request ){
    return 'ttttttttttt';
  });
//http://localhost/blank_blog_7/api/new

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
	Route::get('/new', function( Request $request ){
    return 'ttttttttttt';
  });
  Route::get('/user', function( Request $request ){
    return $request->user();
  });
});




Route::post('login','API\PassportController@login');
Route::post('register','API\PassportController@register');
Route::group(['middlewsre' => 'auth:api'], function(){
    Route::post('get-details','API\PassportController@getDetails');
});