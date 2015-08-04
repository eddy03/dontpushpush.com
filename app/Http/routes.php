<?php

//Ext routing
Route::group(['namespace' => 'Ext'], function() {

    Route::get('/', ['as' => 'homepage', 'uses' => 'HomepageController@homepage']);

    Route::get('a/{articletitle?}', ['as' => 'viewarticle', 'uses' => 'ArticleController@articles']);

    Route::get('about', ['as' => 'about', 'uses' => 'HomepageController@about']);

    Route::get('auth', ['as' => 'login', 'uses' => 'HomepageController@login']);

    Route::post('auth', ['as' => 'authenticated', 'uses' => 'HomepageController@authenticate']);

});

//Special page
Route::group(['namespace' => 'Special'], function() {

    //Jemputan kahwin
    Route::get('kahwin', ['as' => 'special.kahwin', 'uses' => 'KahwinController@mainpage']);

});

//Administration
Route::group(['namespace' => 'Administrator', 'middleware' => 'auth', 'prefix' => 'administrator'], function() {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);

    Route::get('logout', ['as' => 'logout', 'uses' => 'DashboardController@logout']);

});