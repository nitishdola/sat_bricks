<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');


Route::group(['prefix' => 'master'], function () { 
	Route::group(['prefix' => 'sardar'], function () { 
	  Route::get('/', 'Sardar\MasterController')->name('sardar.index');  
	  Route::get('/sardar/create', 'Sardar\MasterController@create')->name('sardar.create');
	  Route::post('/sardar/store', 'Sardar\MasterController@store')->name('sardar.save');
	});
});

