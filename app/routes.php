<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@showWelcome'
]);

Route::get('login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::post('login', ['as' => 'auth', 'uses' => 'UserController@auth']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);

Route::resource('user', 'UserController');

Route::resource('project', 'ProjectController');
Route::resource('project.task', 'TaskController');
