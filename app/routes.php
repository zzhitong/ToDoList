<?php

Route::get('/', array('as' => 'home', 'uses' =>'HomeController@getMyList'));

Route::get('/NewTask', array('as' => 'NewTask', 'uses' => 'HomeController@getNewTask'));

Route::post('NewTask', array('uses' => 'HomeController@postNewTask'));

Route::get('/UpdateTask/{tId}/{cId}', array('as' => 'UpdateTask', 'uses' => 'HomeController@getUpdateTask'));

Route::get('/About', array('as' => 'About', 'uses' => 'HomeController@getAbout'));

Route::get('/Contact', array('as' => 'Contact', 'uses' => 'HomeController@getContact'));

Route::get('/NewCategroy/{cat}', array('as' => 'NewCategroy', 'uses' => 'HomeController@getNewCategroy'));

Route::get('/SignIn', array('as' => 'SignIn', 'uses' => 'AuthController@getSignIn'))->before('guest');

Route::post('SignIn', array('uses' => 'AuthController@postSignIn'));

Route::get('SignOff', array('as' => 'SignOff', 'uses' => 'AuthController@getSignOff'));

