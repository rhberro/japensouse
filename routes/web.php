<?php
/**
 * Dashboard.
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * Autenticação.
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Recuperação.
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('reset.send');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Idéias.
 */
Route::get('/ideas', 'IdeasController@index')->name('ideas');
Route::get('/ideas/favourited', 'IdeasController@favourited')->name('ideas.favourited');
Route::get('/ideas/approved', 'IdeasController@approved')->name('ideas.approved');
Route::get('/ideas/preapproved', 'IdeasController@preapproved')->name('ideas.preapproved');
Route::get('/ideas/removed', 'IdeasController@removed')->name('ideas.removed');
Route::get('/ideas/{idea}', 'IdeasController@show')->name('ideas.show')->where('idea', '[0-9]+');
Route::get('/ideas/{idea}/favourite', 'IdeasController@favourite')->name('ideas.favourite')->where('idea', '[0-9]+');
Route::get('/ideas/{idea}/remove', 'IdeasController@remove')->name('ideas.remove')->where('idea', '[0-9]+');
Route::get('/ideas/{idea}/approve', 'IdeasController@approve')->name('ideas.approve')->where('idea', '[0-9]+');
Route::get('/ideas/{idea}/preapprove', 'IdeasController@preapprove')->name('ideas.preapprove')->where('idea', '[0-9]+');

/**
 * Usuários.
 */
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::get('/users/{user}/follow', 'UsersController@follow')->name('users.follow');
Route::get('/users/{user}/unfollow', 'UsersController@unfollow')->name('users.unfollow');

/**
 * Relatórios.
 */
Route::get('/reports', 'ReportsController@index')->name('reports');
