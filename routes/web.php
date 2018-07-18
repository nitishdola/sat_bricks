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

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.postLogin');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'accountant'], function () {
  Route::get('/login', 'AccountantAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AccountantAuth\LoginController@login');
  Route::post('/logout', 'AccountantAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AccountantAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AccountantAuth\RegisterController@register');

  Route::post('/password/email', 'AccountantAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AccountantAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AccountantAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AccountantAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});
 
Route::group(['prefix' => 'master'], function () { 
  Route::resource('/sardar', 'Sardar\MasterController');  
  Route::get('/sardar/create', 'Sardar\MasterController@create')->name('sardar.create');;  
  Route::post('/sardar/store', 'Sardar\MasterController@store')->name('sardar.save');;   
  Route::post('/sardar/update', 'Sardar\MasterController@update');  
  Route::post('/sardar/{id}/remove', 'Sardar\MasterController@destroy')->name('sardar.delete');
});
