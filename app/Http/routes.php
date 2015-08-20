<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { return view('welcome'); });

// contracts
Route::resource('contracts', 'ContractsController');

// users
Route::resource('users', 'UsersController');

// workspaces
Route::resource('workspaces', 'WorkspacesController');

// companies
Route::resource('companies', 'CompaniesController');

// companies.users
Route::resource('companies.users', 'CompaniesUsersController');
