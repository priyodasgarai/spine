<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/blank', function () {
    return view('Admin-view.blank');
});

 //Route::get('/','Buy_Sell\web\homecontroller@index');
 
Route::group(["namespace"=>"application\WEB"],function(){    
    Route::match(['get'],'/','WebController@index');
    Route::match(['get'],'/login','WebController@weblogin');
    Route::post('post-login','WebController@postLogin');
     
      Route::group(['middleware'=>['web_check']],function(){
          Route::get('/Home','WebController@home');
      });
});


Route::prefix('admin')->namespace('application\ADMIN')->group(function(){
	Route::match(['get','post'],'/','AdminController@login');
        Route::group(['middleware'=>['admin']],function(){
            Route::get('/dashboard','AdminController@dashboard');
            Route::get('/update-admin-password','AdminController@editAdminPassword');
            Route::get('/logout','AdminController@logout');
            Route::post('check-current-pwd','AdminController@chkCurrentPassword');
            Route::post('update-current-pwd','AdminController@updateCurrentPassword');
            Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
            
             /**************************************************************************************/
            Route::get('/users','UserController@allUser');
            Route::post('update-users-status','UserController@updateUserStatus');
            Route::match(['get','post'],'add-edit-user/{id?}','UserController@addEditUser');          
            Route::get('delete-user-image-{id}', 'UserController@deleteUserImage');
            Route::get('delete-user-{id}', 'UserController@deleteUser');
     /****************************************Sections**********************************************/    
            Route::get('package','PackageController@allPackage');
            Route::post('update-package-status','PackageController@updatePackageStatus');
            Route::match(['get','post'],'add-edit-package/{id?}','PackageController@addEditPackage');          
            Route::get('delete-package-image-{id}', 'PackageController@deletePackageImage');
            Route::get('delete-package-{id}', 'PackageController@deletePackage');    
     
            
        });
	
	
});