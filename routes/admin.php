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
    });
});

