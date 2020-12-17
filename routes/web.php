<?php

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
    // return view('welcome');
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/ubahsandi', function () {
        return view('admin.user.password');
    });
    Route::post('/ubahsandi', 'UserController@changepassword')->name('change.password');

    Route::group(['middleware' => ['permission:manajemen_user']], function () {
        Route::resource('/admin/role', 'RoleController')
        ->except(['show']);
        Route::resource('/admin/user', 'UserController')
        ->except(['show']);
        Route::patch('/admin/ubahsandi/{user}','UserController@ubahsandi');
    });

    Route::group(['middleware' => ['permission:log_monitoring']], function () {
        Route::get('/log/logActivity', 'LogController@indexActivity')->name('logActivity.index');
        Route::get('/log/logActivity/{LogActivityModel}', 'LogController@showActivity')->name('logActivity.show');
        Route::get('/log/logSystem', 'LogController@indexSystem')->name('logSystem.index'); 
        Route::get('/log/logSystem/{filename}', 'LogController@showSystem')->name('logSystem.show');
        Route::get('/log/logSystem/{filename}/download', 'LogController@download')->name('logSystem.download'); 
    });
});