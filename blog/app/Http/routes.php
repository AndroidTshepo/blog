<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {

    //setting up the routes for signup, login and logout
    Route::post('/signup', [
        'uses' =>'UserController@postSignUp', 'as' => 'register']);

    Route::post('/signin', [
        'uses' =>'UserController@postSignIn', 'as' => 'login']);
    Route::get('/logout',[
       'uses'=>'UserController@getLogout', 'as'=>'logout']);



    //User Login and Register
    Route::get('login', 'PagesController@getLogin');

    Route::get('register', 'PagesController@getRegister');

    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');

    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts', 'PostController');


});
