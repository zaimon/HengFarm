<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix'=>'login'],function(){
	Route::get('/', 'UserController@getLogin');
	Route::post('postLogin','UserController@postLogin');
});

Route::group(['middleware' => ['auth']],function(){
	Route::get('/', 'UserController@getIndex');
	Route::get('index', 'UserController@getIndex');
	Route::get('logout', 'UserController@logout');

	Route::group(['prefix'=>'project'],function(){
		Route::get('create','ProjectController@create');
		Route::post('postCreate','ProjectController@postCreate');
		
		Route::get('/','ProjectController@getIndex');
		Route::get('view/{pjName}','ProjectController@view');

		Route::get('edit/{pjName}','ProjectController@edit');
		Route::post('postEdit/{pjName}','ProjectController@postEdit');

		Route::get('view/{pjName}/process/create','ProcessController@create');
		Route::post('view/{pjName}/process/postCreate','ProcessController@postCreate');
		Route::get('view/{pjName}/process/view/{pcName}','ProcessController@view');
		Route::get('view/{pjName}/process/edit/{pcName}','ProcessController@edit');
		Route::post('view/{pjName}/process/postEdit/{pcName}','ProcessController@postEdit');
		
	});
	/*Route::group(['prefix'=>'process'],function(){
			Route::get('/', 'ProcessController@getIndex');
			// Route::get('create', 'ProcessController@getIndex');
		});*/
});




Route::get('check-connect',function(){
	if(DB::connection()->getDatabaseName()){
	 	return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
	}else{
	 	return 'Connection False !!';
	}
});