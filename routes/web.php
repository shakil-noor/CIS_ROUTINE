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
})->name('home');

Auth::routes();
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('teacher.showLogin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');

Route::get('/login/coordinator', 'Auth\LoginController@showCoordinatorLoginForm')->name('coordinator.showLogin');
Route::post('/login/coordinator', 'Auth\LoginController@coordinatorLogin');

Route::get('/ImageCapture', function () {
    return view('layouts.save-capture');
})->name('saveImage');

//Admin
Route::group(['middleware' =>'auth','prefix'=>'admin', 'namespace'=>'Admin'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('teacher','TeacherController');
    Route::resource('coordinator','CoordinatorController');
    Route::resource('course','CourseController');
    Route::resource('room','RoomController');
    Route::resource('department','DepartmentController');
    Route::resource('semester','SemesterController');
    Route::resource('batch','BatchController');

    Route::resource('classSchedule','ClassScheduleController');
    Route::get('scheduleRequest','ClassScheduleController@scheduleRequest')->name('ScheduleRequest');
    Route::get('scheduleView','ClassScheduleController@scheduleView')->name('admin.classSchedule.view');
    Route::get('teacherSchedule/{id}','ClassScheduleController@teacherSchedule')->name('admin.teacherSchedule');
    Route::get('batchSchedule/{id}','ClassScheduleController@batchSchedule')->name('admin.batchSchedule');

    Route::resource('adminProfile','ProfileController');
    Route::get('changePassword','ProfileController@passwordEdit')->name('admin.passwordEdit');
    Route::put('passwordUpdate/{id}','ProfileController@passwordUpdate')->name('admin.passwordUpdate');
});

//Teacher
Route::group(['middleware' =>'auth:teacher','prefix'=>'teacher', 'namespace'=>'Teacher'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('teacher.dashboard');
    Route::resource('teacherProfile','ProfileController');
    Route::get('changePassword','ProfileController@passwordEdit')->name('teacher.passwordEdit');
    Route::put('passwordUpdate/{id}','ProfileController@passwordUpdate')->name('teacher.passwordUpdate');
    Route::get('schedules','ScheduleController@index')->name('teacher.schedule.index');
    Route::get('scheduleView','ScheduleController@view')->name('teacher.schedule.view');
});

//Coordinator
Route::group(['middleware' =>'auth:coordinator','prefix'=>'coordinator', 'namespace'=>'Coordinator'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('coordinator.dashboard');
    Route::resource('schedule','ScheduleController');
    Route::get('scheduleRequest','ScheduleController@scheduleRequest')->name('coordinator.scheduleRequest');
    Route::get('scheduleView','ScheduleController@scheduleView')->name('coordinator.classSchedule.view');
    Route::get('teacherSchedule/{id}','ScheduleController@teacherSchedule')->name('coordinator.teacherSchedule');
    Route::get('batchSchedule/{id}','ScheduleController@batchSchedule')->name('coordinator.batchSchedule');

    Route::resource('coordinatorProfile','profileController');
    Route::get('changePassword','profileController@passwordEdit')->name('coordinator.passwordEdit');
    Route::put('passwordUpdate/{id}','profileController@passwordUpdate')->name('coordinator.passwordUpdate');
});



