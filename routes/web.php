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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
});
//Route::get('/','Buy_Sell\web\homecontroller@index');

Route::group(["namespace" => "application\WEB"], function() {
    Route::get('/', 'WebController@weblogin');
    // Route::get('/login','WebController@weblogin');
    Route::post('post-login', 'WebController@postLogin');
    Route::match(['get', 'post'], '/registration/{id?}', 'WebController@registration');

    Route::group(['middleware' => ['web_check']], function() {
        Route::get('/Home', 'WebController@home');
        Route::get('/logout', 'WebController@logout');
        Route::get('/user-details', 'WebController@user_details');
        Route::get('/update-details', 'WebController@update_details');
        Route::get('/delete-file-{id}', 'WebController@delete_file');
        Route::post('/document-upload', 'WebController@document_uplodas');
        Route::get('/training-libray', 'WebController@training_libray');
        Route::get('/add-address', 'WebController@add_address');
        Route::post('/post-add-address', 'WebController@post_add_address');
         Route::get('/delete-address-{id}', 'WebController@delete_address');
        Route::get('/document', function () {
            return view('Web-view.document');
        });
        Route::get('/file-uploade', function () {
            return view('Web-view.file_uploade');
        });
    });
});


Route::get('/product', function () {
    return view('Web-view.product');
});

//Route::get('/training-libray', function () {
//    return view('Web-view.training_libray');
//});
Route::get('/virtual-meeting', function () {
    return view('Web-view.virtual_meeting');
});

Route::get('/faq', function () {
    return view('Web-view.faq');
});
Route::get('/assigment', function () {
    return view('Web-view.assigment');
});








Route::prefix('admin')->namespace('application\ADMIN')->group(function() {
    Route::match(['get', 'post'], '/', 'AdminController@login');
    Route::group(['middleware' => ['admin']], function() {
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/update-admin-password', 'AdminController@editAdminPassword');
        Route::get('/logout', 'AdminController@logout');
        Route::post('check-current-pwd', 'AdminController@chkCurrentPassword');
        Route::post('update-current-pwd', 'AdminController@updateCurrentPassword');
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');

        /*         * *********************************************************************************** */
        Route::get('/users/{data?}', 'UserController@allUser');
        Route::post('update-users-status', 'UserController@updateUserStatus');
        Route::match(['get', 'post'], 'add-edit-user/{id?}', 'UserController@addEditUser');
        Route::get('delete-user-image-{id}', 'UserController@deleteUserImage');
        Route::get('delete-user-{id}', 'UserController@deleteUser');
        Route::get('user-details-{id}', 'UserController@userDetails');
        Route::get('user-package-delete-{id}', 'UserController@deleteUserPackage');
        Route::post('user-package-add', 'UserController@addUserPackage');
        Route::get('user-assign-library-{id}', 'UserController@userAssignLibrary');
        Route::get('user-library-delete-{id}', 'UserController@deleteUserLibrary');
        Route::post('user-library-add', 'UserController@addUserLibrary');


        /*         * **************************************Sections********************************************* */
        Route::get('package', 'PackageController@allPackage');
        Route::post('update-package-status', 'PackageController@updatePackageStatus');
        Route::match(['get', 'post'], 'add-edit-package/{id?}', 'PackageController@addEditPackage');
        Route::get('delete-package-image-{id}', 'PackageController@deletePackageImage');
        Route::get('delete-package-{id}', 'PackageController@deletePackage');
        Route::get('package-details-{id}', 'PackageController@packageDetails');
        Route::get('package-program-delete-{id}', 'PackageController@deletePackageProgram');
        Route::post('package-program-add', 'PackageController@addPackageProgram');
        /*         * **************************************Program********************************************* */
        Route::get('program', 'ProgramController@allProgram');
        Route::post('update-program-status', 'ProgramController@updateProgramStatus');
        Route::match(['get', 'post'], 'add-edit-program/{id?}', 'ProgramController@addEditProgram');
        Route::get('delete-program-{id}', 'ProgramController@deleteProgram');
        /*         * **************************************Library********************************************* */
        Route::get('library', 'LibraryController@allLibrary');
        Route::post('update-library-status', 'LibraryController@updateLibraryStatus');
        Route::match(['get', 'post'], 'add-edit-library/{id?}', 'LibraryController@addEditLibrary');
        Route::get('delete-library-{id}', 'LibraryController@deleteLibrary');

        /*         * **************************************************************************************** */
        Route::get('/products', function () {
            return view('Admin-view.product.products');
        });
        Route::get('/social-media', function () {
            return view('Admin-view.socialmedia.social_media');
        });
        Route::get('/virtual-meeting', function () {
            return view('Admin-view.virtualmeeting.virtual_meeting');
        });
        Route::get('/tasks', function () {
            return view('Admin-view.task.tasks');
        });
//        Route::get('/user-details', function () {
//            return view('Admin-view.Users.user_details');
//        });
        Route::get('/product-edit', function () {
            return view('Admin-view.product.product_edit');
        });
        Route::get('/orders', function () {
            return view('Admin-view.order.orders');
        });
//        Route::get('/assign-library', function () {
//            return view('Admin-view.Users.assign_library');
//        });
    });
});
