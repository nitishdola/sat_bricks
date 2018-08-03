<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.home');
})->name('home');

Route::group(['prefix'=>'sales'], function() {
    Route::group(['prefix'=>'receipt'], function() {
        Route::get('/create', [
            'as' => 'receipt.create',
            'middleware' => ['employee'],
            'uses' => 'Employee\SalesController@createReceipt'
        ]);

        Route::post('/save', [
            'as' => 'receipt.save',
            'middleware' => ['employee'],
            'uses' => 'Employee\SalesController@saveReceipt'
        ]);


        Route::get('/{id}/view', [
            'as' => 'receipt.view',
            'middleware' => ['employee'],
            'uses' => 'Employee\SalesController@viewReceipt'
        ]);

        Route::get('view-all', [
            'as' => 'receipt.view_all',
            'middleware' => ['employee'],
            'uses' => 'Employee\SalesController@viewAllReceipts'
        ]);
    });
});


Route::group(['prefix'=>'worker'], function() {
    Route::group(['prefix'=>'production'], function() {
        Route::get('/entry', [
            'as' => 'worker.production.entry',
            'middleware' => ['employee'],
            'uses' => 'Employee\WorkersController@productionEntry'
        ]);
        Route::post('/entry', [
            'as' => 'worker.production.save',
            'middleware' => ['employee'],
            'uses' => 'Employee\WorkersController@saveProductionEntry'
        ]);

        Route::get('/view-all', [
            'as' => 'worker.production.view_all',
            'middleware' => ['employee'],
            'uses' => 'Employee\WorkersController@viewAllProductionEntry'
        ]);
    });
});