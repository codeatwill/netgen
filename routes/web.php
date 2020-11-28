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

########################################################################

########################################################################
	
	# ADMIN ROUTES.
	# AUTH ROUTES.

	Auth::routes();

########################################################################

########################################################################

	# FRONTEND ROUTES
	# HOME PAGE ROUTE.

	Route::get('/', 'HomeController@frontPage');
	
	# ADMIN ROUTES.
	# HOME CONTROLLER ROUTES.	
	
	

########################################################################

########################################################################

	# ADMIN ROUTES.
	# USER CONTROLLER ROUTES.

	Route::get('/admin/add/user', 'UsersController@addUser');
	Route::post('/admin/add/user', 'UsersController@addUser');
	Route::get('/admin/all/users', 'UsersController@allUsers');
	
	# admin - user profile details routes
	Route::get('/admin/view/user/{id}', 'UsersController@view');
	Route::get('/admin/view/user/step-2/{id}', 'UsersController@step2');
	Route::get('/admin/view/user/step-3/{id}', 'UsersController@step3');
	Route::get('/admin/view/user/step-4/{id}', 'UsersController@step4');
	Route::get('/admin/view/user/step-5/{id}', 'UsersController@step5');
	
	
	Route::get('/admin/user/my-profile', 'UsersController@myProfile');
	Route::patch('/admin/update/my-profile/{id}', 'UsersController@updateMyProfile');
	Route::patch('/admin/update/user/{id}', 'UsersController@updateUser');
	Route::get('/admin/users/datatable', 'UsersController@usersDatatable');
	
	Route::get('/reset/user-password',  ['as' => 'user.resetPassword', 'uses' => 'UsersController@resetPassword']);
	Route::get('/admin/change/user-password/{id}',  ['as' => 'user.resetUserPassword', 'uses' => 'UsersController@resetUserPassword']);
	Route::patch('/admin/update/user-password/{id}', 'UsersController@updateUserPassword');
	Route::patch('/admin/{user}/update-password',  ['as' => 'user.updatePassword', 'uses' => 'UsersController@updatePassword']);
	
	# FRONTEND ROUTES.
	# USER CONTROLLER ROUTES.
	
	Route::get('/home', 'UsersController@index');
	Route::patch('/user/update/my-profile/{id}', 'UsersController@updateMyProfile');
	Route::patch('/user/update/user/{id}', 'UsersController@updateMyProfile');
	Route::get('/my-profile', 'UsersController@myProfile');
	Route::get('/my-profile/step-2', 'UsersController@myProfileStep2');
	Route::get('/my-profile/step-3', 'UsersController@myProfileStep3');
	Route::get('/my-profile/step-4', 'UsersController@myProfileStep4');
	Route::get('/my-profile/step-5', 'UsersController@myProfileStep5');
	
	Route::post('/user/forgot-password', 'UsersController@forgotPassword');
	Route::get('/reset/user-password/{id}', 'UsersController@resetForgotPassword');
	Route::post('/reset/user-password', 'UsersController@updateForgotPassword');

########################################################################

########################################################################

	# FRONTEND ROUTES.
	# HANDLE ALL THE DYNAMIC PROFILE ROUTES PAGE ROUTES.
	
	Route::post('/submit-contract/{id}', 'PageController@submitContract');
	
	Route::get('{slug}', [
		'uses' => 'PageController@getPages' 
	])->where('slug', '([A-Za-z0-9\-\/]+)');

########################################################################

########################################################################
