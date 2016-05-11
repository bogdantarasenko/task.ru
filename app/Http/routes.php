<?php


Route::get('/', 'MainController@index');

Route::post('/add','MainController@addpost');

Route::post('/addcomment','MainController@addcomment');

Route::get('home', 'HomeController@index');
//auth
Route::get('/auth/logout','AccountController@logout');

Route::get('/auth','MainController@render_auth');

Route::get('github', 'AccountController@github_redirect');

Route::get('/socialite/socialite/callback', 'AccountController@github');