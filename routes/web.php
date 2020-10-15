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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blank', function () {
    return view('Admin-view.blank');
});

 //Route::get('/','Buy_Sell\web\homecontroller@index');
 
Route::group(["namespace"=>"application\WEB"],function(){    
    Route::get('/','WebController@weblogin');
   // Route::get('/login','WebController@weblogin');
    Route::post('post-login','WebController@postLogin');
    Route::match(['get','post'],'/registration/{id?}','WebController@registration');
     
      Route::group(['middleware'=>['web_check']],function(){
        Route::get('/Home','WebController@home');
        Route::get('/logout','WebController@logout');
        Route::get('/profile','WebController@profile');
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
            Route::get('user-details-{id}', 'UserController@userDetails');
            Route::get('user-package-delete-{id}', 'UserController@deleteUserPackage');
            Route::post('user-package-add', 'UserController@addUserPackage');
            
            
            
            
     /****************************************Sections**********************************************/    
            Route::get('package','PackageController@allPackage');
            Route::post('update-package-status','PackageController@updatePackageStatus');
            Route::match(['get','post'],'add-edit-package/{id?}','PackageController@addEditPackage');          
            Route::get('delete-package-image-{id}', 'PackageController@deletePackageImage');
            Route::get('delete-package-{id}', 'PackageController@deletePackage'); 
            Route::get('package-details-{id}', 'PackageController@packageDetails');
            Route::get('package-program-delete-{id}', 'PackageController@deletePackageProgram');
            Route::post('package-program-add', 'PackageController@addPackageProgram');
   /****************************************Program**********************************************/    
            Route::get('program','ProgramController@allProgram');
            Route::post('update-program-status','ProgramController@updateProgramStatus');
            Route::match(['get','post'],'add-edit-program/{id?}','ProgramController@addEditProgram');
            Route::get('delete-program-{id}', 'ProgramController@deleteProgram');      
    /****************************************Library**********************************************/    
            Route::get('library','LibraryController@allLibrary');
            Route::post('update-library-status','LibraryController@updateLibraryStatus');
            Route::match(['get','post'],'add-edit-library/{id?}','LibraryController@addEditLibrary');
            Route::get('delete-library-{id}', 'LibraryController@deleteLibrary');      
            
            
        });
	
	
});