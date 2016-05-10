<?php


Route::get('/', 'MainController@index');

Route::get('/auth','MainController@render_auth');

Route::post('/add','MainController@addpost');

Route::post('/addcomment','MainController@addcomment');

Route::get('home', 'HomeController@index');

Route::get('github', 'AccountController@github_redirect');
Route::get('/socialite/socialite/callback', 'AccountController@github');