<?php
//Ext routing
Route::group(['namespace' => 'Ext'], function() {

    //Homepage
    Route::get('/', ['as' => 'homepage', 'uses' => 'HomepageController@homepage']);

    //Articles
    Route::get('a/{articletitle?}', ['as' => 'viewarticle', 'uses' => 'ArticleController@articles']);

    //Login page
    Route::get('auth', ['as' => 'login', 'uses' => 'HomepageController@login']);

    //Processing the login page
    Route::post('auth', ['as' => 'authenticated', 'uses' => 'HomepageController@authenticate']);

});

//Public API
Route::group(['namespace' => 'Api', 'prefix' => 'API'], function() {

    //Version 1
    Route::group(['prefix' => 'v1'], function() {

        //Highlight articles API
        Route::get('highlight', ['as' => 'API.highlight', 'uses' => 'ApiController@highlight']);

        //Articles list
        Route::get('articles', ['as' => 'API.articles', 'uses' => 'ApiController@articles']);

        //Article
        Route::get('article/{articleTitle?}', ['as' => 'API.article', 'uses' => 'ApiController@article']);

        Route::post('githubpush', ['uses' => 'ApiController@githubpush']);

    });

});

//Special page
Route::group(['namespace' => 'Special'], function() {

    //Jemputan kahwin
    Route::get('kahwin', ['as' => 'special.kahwin', 'uses' => 'KahwinController@mainpage']);

});

//Administration
Route::group(['namespace' => 'Administrator', 'middleware' => 'auth', 'prefix' => 'administrator'], function() {

    //Dashboard
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);

    //Resources to articles
    Route::resource('article', 'ArticleController');

    //Resources to public document
    Route::resource('document', 'DocumentController');

    //List all tags
    Route::get('tags', ['as' => 'listtag', 'uses' => 'TagsController@index']);
    //Show articles related to the tags
    Route::get('tags/{id}', ['as' => 'tagdetail', 'uses' => 'TagsController@show']);

    //List all settings
    Route::get('settings', ['as' => 'configurations', 'uses' => 'ConfigurationController@showConfigurationsOptions']);

    //Logout the user
    Route::get('logout', ['as' => 'logout', 'uses' => 'DashboardController@logout']);

});