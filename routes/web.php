<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
	echo "CoreStorage v0.1";
});

$app->group(['prefix' => 'api'], function() use ($app){
	$app->get('/list/{name}/{id}',		'FileStoreController@listFile');
	$app->get('/file/{name}/{id}',		'FileStoreController@getFile');
	$app->delete('/file/{name}/{id}',		'FileStorage@deleteFile');
	$app->post('/file/{name}/{id}',		'FileStorage@uploadFile');

//     $app->get('/admin/check/{name}',	'UserManageController@exist');
	$app->get('/admin/create/{name}',	'UserManageController@createUser');
	$app->get('/admin/delete/{name}',	'UserManageController@deleteUser');
});
