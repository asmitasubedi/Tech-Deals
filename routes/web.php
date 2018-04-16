<?php

use App\Course;
use Yajra\DataTables\DataTables;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CourseController');
Route::get('/course/details/{course}', 'CourseController@details');
Route::get('/course/lists','CourseController@lists');
Route::get('/get_dataTable', 'CourseController@get_dataTable')->name('get_dataTable');

Route::resource('/instructors', 'InstructorController');
Route::resource('/shifts', 'ShiftController');
Route::resource('/course_banners', 'CourseBannerController');

Route::post('addCustomer', 'CustomerController@addEnrolledCustomer');
Route::resource('/customers', 'CustomerController');
Route::resource('/enrolled_courses', 'EnrolledCourseController');
//Route::put('enrolled_courses/{enrolled_course}','EnrolledCourseController@update');

//Route::get('/course/lists', function ()
//{
//    return view('frontend.courses.index');
//});