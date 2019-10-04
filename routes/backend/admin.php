<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('pages','PagesController');

Route::resource('posts','PostsController');

Route::resource('comments','CommentsController');

Route::get('posts/{post}/delete','PostsController@delete')->name('posts.delete');
Route::get('pages/{page}/delete','PagesController@delete')->name('pages.delete');
Route::get('comments/{comment}/delete','CommentsController@delete')->name('comments.delete');