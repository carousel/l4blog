<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

    Route::get("/",function()
    {
        return "<h2>" . App::environment() . "</h2>";
    });

    //routes for password resets
    Route::resource("admin","AdminController");
    Route::resource("password_resets","PasswordResetsController");
    Route::get("password_resets/reset/{token}","PasswordResetsController@reset");
    Route::post("password_resets/reset/{token}","PasswordResetsController@postReset");

    //routes for content management
    //Route::get("/","PostController@index");
    Route::resource("posts","PostController");
    Route::resource("users","UserController");
    //routes for comments
    Route::resource("comments","CommentController");

    //routes for users logic
    Route::get("signin_form","UserController@signin_form");
    Route::get("signup_form",["as"=>"signup_form","uses"=>"UserController@signup_form"]);
    Route::post("signin","UserController@signin");
    Route::post("signup","UserController@signup");
    Route::get("signout","UserController@signout");













