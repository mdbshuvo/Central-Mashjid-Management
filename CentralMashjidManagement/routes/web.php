<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'pagecontroller@index');

Route::get('/homepage', 'pagecontroller@homepage');

Route::get('/mashjids', 'pagecontroller@viewMashjids');

Route::get('/new-mashjid', 'pagecontroller@newMashjid');

Route::get('/addEmp', 'pagecontroller@addEmp');

Route::get('/new-expendature', 'pagecontroller@new_expendature');

Route::get('/addEqp', 'pagecontroller@addEqp');

Route::get('/detailsView', 'pagecontroller@detailsView');

Route::get('/delete-mashjid', 'pagecontroller@delete_mashjid');

Route::get('/people', 'pagecontroller@showPeople');