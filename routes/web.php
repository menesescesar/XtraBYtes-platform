<?php

Route::group(
[

    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
    Route::get('/',function(){return view('frontpage.frontpage');});
    Route::get('/explorer', 'ExplorerController@index')->name('explorer');

    Auth::routes();
    Route::get('/activate/{activationCode}', 'Auth\ActivationController@activate');
    Route::get('/deactivated',function(){return  view('user.deactivated');});

    Route::group([ 'middleware' => [ 'user_deactivated' ] ],
    function()
    {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::get('/predictions', 'PredictionController@xby_prediction')->name('xby_prediction');

        Route::get('/user/{id}/image/{img}', ['as'=>'get.user.img', 'uses'=>'UserController@userImage']);

        Route::get('/profile/', 'UserController@showProfile');
        Route::get('/profile/edit', 'UserController@editProfile');
        Route::post('/profile/edit', ['as'=>'post.profile.edit', 'uses'=>'UserController@updateProfile']);

        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');

    });

});