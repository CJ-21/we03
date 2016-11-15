<?php

Route::get('/home/:id', 			'Site->view_contacts');
Route::get('/new_contact', 			'Site->create');
Route::post('/new_contact', 		'Site->save');
Route::get('/contact/:id', 			'Site->view');
Route::get('/contact/:id/delete', 	'Site->delete');
Route::get('/contact/:id/edit', 	'Site->edit');
Route::post('/contact/:id/edit', 	'Site->update');
Route::get('/contact/:id/email', 	'Site->email');
Route::post('/contact/:id/submit', 	'Site->submit');
Route::post('/search', 				'Site->search_redirect');
Route::get('/search/:term', 		'Site->search');

Route::get('/register', 			'User->create');
Route::post('/user/save', 			'User->save');
Route::get('/user/:id', 			'User->view');
Route::get('/user/:id/edit', 		'User->edit');
Route::post('/user/:id/edit', 		'User->update');
Route::get('/user/:id/delete', 		'User->delete');



Route::get('/', 					'Auth->login');
Route::get('/auth/logout', 			'Auth->logout');
Route::post('/auth/attempt', 		'Auth->attempt');

Route::fallback(ERRORS.'404.php');