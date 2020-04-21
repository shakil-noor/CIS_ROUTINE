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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'auth'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('teacher','TeacherController');
    Route::resource('course','CourseController');
    Route::resource('room','RoomController');
    Route::resource('department','DepartmentController');
    Route::resource('semester','SemesterController');
    Route::resource('batch','BatchController');

    Route::resource('classSchedule','ClassScheduleController');
    Route::get('teacherSchedule/{id}','ClassScheduleController@teacherSchedule')->name('teacherSchedule');
    Route::get('batchSchedule/{id}','ClassScheduleController@batchSchedule')->name('batchSchedule');

    Route::get('scheduleRequest','ClassScheduleController@scheduleRequest')->name('scheduleRequest');

    Route::get('teacherSchedulePDF/{id}','PDFController@teacherSchedulePDF')->name('teacherSchedulePDF');;
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
