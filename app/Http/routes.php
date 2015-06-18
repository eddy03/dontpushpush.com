<?php

//Ext routing
Route::group(['namespace' => 'Ext'], function() {

    Route::get('/', ['as' => 'homepage', 'uses' => 'HomepageController@homepage']);

    Route::get('a/{articletitle?}', ['as' => 'viewarticle', 'uses' => 'ArticleController@articles']);

    Route::get('about', ['as' => 'about', 'uses' => 'HomepageController@about']);

    Route::get('auth', ['as' => 'login', 'uses' => 'HomepageController@authenticate']);

});

Route::group(['namespace' => 'Special'], function() {

    //Jemputan kahwin
    Route::get('kahwin', ['as' => 'special.kahwin', 'uses' => 'KahwinController@mainpage']);

});

Route::group(['namespace' => 'Administrator', 'prefix' => 'administrator'], function() {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);

});