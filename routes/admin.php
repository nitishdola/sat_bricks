<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');
 

// Saradar Master========================================================
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


// Employee Master========================================================
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

// Worker Master========================================================
Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'worker'], function() {
        Route::get('/create', [
            'as' => 'worker.create',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@create'
        ]);

        Route::post('/store', [
            'as' => 'worker.store',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@store'
        ]);

        Route::get('/', [
            'as' => 'worker.index',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@index'
        ]);
        Route::post('/destroy/{id}', [
            'as' => 'worker.destroy',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'worker.edit',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'worker.update',
            'middleware' => ['admin'],
            'uses' => 'Worker\WorkersController@update'
        ]);
    });
}); 


// Advance Register Employee========================================================
Route::group(['prefix'=>'register'], function() { 
    Route::group(['prefix'=>'employee'], function() {
        Route::group(['prefix'=>'advance'], function() {
            Route::get('/entry', [
                'as' => 'register.employee.entry',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@create'
            ]);

            Route::post('/store', [
                'as' => 'register.employee.store',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@store'
            ]);

            Route::get('/', [
                'as' => 'register.employee.index',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@index'
            ]);
            Route::post('/destroy/{id}', [
                'as' => 'register.employee.destroy',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@destroy'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'register.employee.edit',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'register.employee.update',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\AdvanceController@update'
            ]);
        }); 
    }); 
}); 



// Advance Register Sardar========================================================
Route::group(['prefix'=>'register'], function() { 
    Route::group(['prefix'=>'sardar'], function() {
        Route::group(['prefix'=>'advance'], function() {
            Route::get('/create', [
                'as' => 'register.sardar.create',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@create'
            ]);

            Route::post('/store', [
                'as' => 'register.sardar.store',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@store'
            ]);

            Route::get('/', [
                'as' => 'register.sardar.index',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@index'
            ]);
            Route::post('/destroy/{id}', [
                'as' => 'register.sardar.destroy',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@destroy'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'register.sardar.edit',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'register.sardar.update',
                'middleware' => ['admin'],
                'uses' => 'Register\Sardars\AdvanceController@update'
            ]);
        }); 
    }); 
}); 



// Salary Register employee========================================================
Route::group(['prefix'=>'register'], function() { 
    Route::group(['prefix'=>'employee'], function() {
        Route::group(['prefix'=>'salary'], function() {
            Route::get('/create', [
                'as' => 'register.employee.salary.create',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\SalaryController@create'
            ]); 

            Route::get('/', [
                'as' => 'register.employee.salary.index',
                'middleware' => ['admin'],
                'uses' => 'Register\Employees\SalaryController@index'
            ]); 
        }); 
    }); 
}); 


// Accounting Ledger Master========================================================
Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'ledger'], function() {
        Route::get('/create', [
            'as' => 'ledger.create',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@create'
        ]);

        Route::post('/store', [
            'as' => 'ledger.store',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@store'
        ]);

        Route::get('/', [
            'as' => 'ledger.index',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@index'
        ]);
        Route::post('/destroy/{id}', [
            'as' => 'ledger.destroy',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'ledger.edit',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'ledger.update',
            'middleware' => ['admin'],
            'uses' => 'Ledger\LedgersController@update'
        ]);
    });
}); 