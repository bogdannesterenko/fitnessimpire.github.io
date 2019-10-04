<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog/{post}', 'HomeController@post')->name('post');
Route::post('/blog/{post}/comment', 'HomeController@commentCreate')->name('comment.create');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::post('/contact-us', 'HomeController@contactForm')->name('contact.form');
Route::post('/callback', 'HomeController@callbackForm')->name('callback.form');
Route::post('/assign', 'HomeController@assign')->name('assign');

// Route::get('contact', 'ContactController@index')->name('contact');
// Route::post('contact/send', 'ContactController@send')->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
