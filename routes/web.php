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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/semester/all', 'SemesterController@all');
Route::get('/semester/{id}/subjects', 'SemesterController@subjects');

Route::get('/subject/all', 'SubjectController@all');
Route::get('/subject/{id}/references', 'SubjectController@references');
Route::get('/subject/{id}/semester', 'SubjectController@getSemester');

Route::get('/reference/{id}/type', 'ReferenceController@getReferenceType');
Route::get('/references/all', 'ReferenceController@all');

Route::get('/referencestype/all', 'ReferenceController@allreferencetype');

Route::post('/referencestype/store', [
	'uses' => 'ReferenceTypeController@store',
	'as' => 'referencetype.store'
	]);

Route::resource('references', 'ReferenceController');
Route::resource('semesters', 'SemesterController');
Route::resource('subjects', 'SubjectController');

Route::get('/home', 'HomeController@index')->name('home');
