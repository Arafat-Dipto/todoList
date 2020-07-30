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


//Admin routes...
Route::group(['prefix'=>'admin'],function() {
    Route::get('/login', 'AdminController@showlogin')->name('admin.login.show');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('/parent','AdminController@showParent');
    Route::get('/children','AdminController@showChildren');
    Route::get('/{id}/disableParent','AdminController@disableParent');
    Route::get('/{id}/enableParent','AdminController@enableParent');
    Route::get('/{id}/deleteParent','AdminController@deleteParent');

    Route::get('/children','AdminController@showChildren');
    Route::get('/{id}/disableChildren','AdminController@disableChildren');
    Route::get('/{id}/enableChildren','AdminController@enableChildren');
    Route::get('/{id}/deleteChildren','AdminController@deleteChildren');

    Route::get('/task','AdminController@showTask');
    Route::get('/{id}/deleteTask','AdminController@deleteTask');
    Route::get('/task/{id}/edit','AdminController@showEditTask')->name('admin.taskEditShow');
    Route::post('/task/{id}/edit','AdminController@editTask')->name('admin.taskEdit');


    Route::get('/submission','AdminController@showSubmission');
    Route::get('/{id}/deleteSubmission','AdminController@deleteSubmission');

});

Route::get('/','UserController@showRegisterParent');
Route::get('/register/children','UserController@showRegisterChildren');
Route::post('/registerParent','UserController@registerParent')->name('registerParent');
Route::post('/registerChildren','UserController@registerChildren')->name('registerChildren');
Route::get('/login','UserController@showlogin')->name('user.login.show');
Route::post('/login','UserController@login')->name('user.login');
Route::get('/logout','UserController@logout');


Route::get('/parent/dashboard','ParentController@index');
Route::get('/parent/addTask','ParentController@showAddTask')->name('parent.addTaskShow');
Route::post('/parent/addTask','ParentController@addTask')->name('parent.addTask');
Route::get('/parent/createReward','ParentController@showCreateReward')->name('parent.showCreateReward');
Route::post('/parent/createReward','ParentController@createReward')->name('parent.createReward');
Route::get('parent/showReward','ParentController@showReward');
Route::get('/parent/{id}/editReward','ParentController@showEditReward')->name('parent.rewardEditShow');
Route::post('/parent/{id}/editReward','ParentController@editReward')->name('parent.rewardEdit');
Route::get('/parent/{id}/deleteReward','ParentController@deleteReward')->name('parent.rewardDelete');

Route::get('parent/showTask','ParentController@showTask');
Route::get('/parent/{id}/editTask','ParentController@showEditTask')->name('parent.taskEditShow');
Route::post('/parent/{id}/editTask','ParentController@editTask')->name('parent.taskEdit');
Route::get('/parent/{id}/deleteTask','ParentController@deleteTask')->name('parent.taskDelete');
Route::get('/parent/showSubmittedTask','ParentController@showSubmittedTask');
Route::get('/parent/{id}/submitMark','ParentController@showSubmitMark')->name('parent.showSubmitMark');
Route::post('/parent/{id}/submitMark','ParentController@submitMark')->name('parent.submitMark');


Route::get('/child/dashboard','ChildController@index');
Route::get('/child/search/parent','ChildController@searchParent');
Route::get('/child/add/{id}/parent','ChildController@addParent')->name('child.addParent');
Route::get('/child/showTask','ChildController@showAllTask');
Route::get('/child/{task_id}/submitTask','ChildController@showSubmitTask')->name('child.showSubmitTask');
Route::post('/child/{asn_id}/submitTask','ChildController@submitTask')->name('child.submitTask');
Route::get('child/getTaskShow','ChildController@showGetTask')->name('child.showGetTask');
Route::get('child/{parent_id}/showAddTask','ChildController@showAddTask')->name('child.showAddTask');
Route::get('child/{task_id}/addTask','ChildController@addTask')->name('child.addTask');

