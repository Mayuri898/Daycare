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

Route:: as ('admin.')->middleware('auth')->namespace('Admin')->prefix('admin')->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	// teachers
	Route::resource('/teachers', 'TeachersController');
	Route::get('/teachers/show/{id}', 'TeachersController@show');
	Route::put('/teachers/edit/{id}', 'TeachersController@edit');

	// Noticeboard
	Route::resource('/noticeboard', 'NoticeboardController');
	Route::get('/noticeboard/show/{id}', 'NoticeboardController@show');
	Route::put('/noticeboard/edit/{id}', 'NoticeboardController@edit');

	// students
	Route::resource('/students', 'StudentsController');
	Route::get('/students/show/{id}', 'StudentsController@show');
	Route::put('/students/edit/{id}', 'StudentsController@edit');
	// Assignstudents

	Route::get('/assignstudents/{id}', 'AssignStudentsController@assignstudents');
	// Dailyreport
	Route::get('/dailystudentreport/{id}', 'AssignStudentsController@dailystudentreport');
	// Events
	Route::resource('/events', 'EventsController');
	Route::get('/events/show/{id}', 'EventsController@show');
	Route::put('/events/edit/{id}', 'EventsController@edit');

	// Attendance
	Route::get('/attendance', 'AttendanceController@index')->name('attendance');

	//memories routes
	Route::post('/memories/add', 'MemoriesController@store')->name('store-memories');
	Route::get('memories/show/{id}', 'MemoriesController@show')->name('show-memory');
	Route::put('memories/update/{id}', 'MemoriesController@update')->name('update-memory');
	Route::get('/memories/delete/{id}', 'MemoriesController@destroy')->name('delete-memories');
	//daily report routes
	Route::post('/daily-reports/store', 'DailyReportController@store');
});

Route::get('/attendance', 'AttendanceController@index')->name('attendance');
