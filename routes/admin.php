<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');
 


Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'sardar'], function() {
        Route::get('/create', [
            'as' => 'sardar.create',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@create'
        ]);

        Route::post('/store', [
            'as' => 'sardar.store',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@store'
        ]);

        Route::get('/', [
            'as' => 'sardar.index',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@index'
        ]);
        Route::post('/destroy/{id}', [
            'as' => 'sardar.destroy',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'sardar.edit',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'sardar.update',
            'middleware' => ['admin'],
            'uses' => 'Sardar\MasterController@update'
        ]);
    });
}); 



Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'employee'], function() {
        Route::get('/create', [
            'as' => 'employee.create',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@create'
        ]);

        Route::post('/store', [
            'as' => 'employee.store',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@store'
        ]);

        Route::get('/', [
            'as' => 'employee.index',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@index'
        ]);
        Route::post('/destroy/{id}', [
            'as' => 'employee.destroy',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'employee.edit',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'employee.update',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@update'
        ]);
        Route::get('/password/{id}', [
            'as' => 'employee.password',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@password'
        ]);
        Route::post('/change/{id}', [
            'as' => 'employee.change',
            'middleware' => ['admin'],
            'uses' => 'Employee\EmployeesController@change'
        ]);
    });
}); 

