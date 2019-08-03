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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){

    Route::get('/','AdminController@index')->name('admin.dashboard');

    /**
     * route đăng nhập thành công
     */
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');


    /**
     * route Đăng ký tài khoản
     */
    Route::get('register','AdminController@create')->name('admin.register');


    /**
     *
     */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /**
     * url: authen.com/admin/login
     * route trả về view đăng nhập admin
     */
    route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * route xử lý đăng nhập
     */
    route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * url:authen.com/admin/logout
     * route để đăng xuất
     */
    route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});
