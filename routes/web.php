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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {

    Route::prefix('admin')->group(function () {


        Route::get('/dashboard', 'HomeController@adminHome')->name('dashboard.admin');
        // Admin User Accounts
        Route::get('/user/all', 'UserController@index')->name('user.all');
        Route::get('/user/create', 'UserController@create')->name('user.create');
        Route::post('/user/create', 'UserController@store')->name('user.create');
        Route::get('/user/{id}/show', 'UserController@show')->name('user.show');
        Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::post('/user/{id}/edit', 'UserController@update')->name('user.edit');
        Route::get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');
        
        
           // course  
        Route::get('/course/all', 'CourseController@index')->name('course.all');
        Route::get('/course/create', 'CourseController@create')->name('course.create');
        Route::post('/course/create', 'CourseController@store')->name('course.create');
        Route::get('/course/{id}/show', 'CourseController@show')->name('course.show');
        Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit');
        Route::post('/course/{id}/edit', 'CourseController@update')->name('course.edit');
        Route::get('/course/{id}/delete', 'CourseController@destroy')->name('course.delete');
        Route::get('/course/{id}/enrollmente', 'CourseController@enrollment')->name('course.enrollment');
        Route::post('/course/{id}/enrollmente', 'CourseController@enrollmentadd')->name('course.enrollment');
    });
});

Route::group(['middleware' => 'teacher'], function () {

    Route::prefix('teacher')->group(function () {
        Route::get('/dashboard', 'HomeController@teacherHome')->name('dashboard.teacher');
          Route::get('/lecture/all', 'LectureController@index')->name('lecture.all');
        Route::get('/lecture/create', 'LectureController@create')->name('lecture.create');
        Route::post('/lecture/create', 'LectureController@store')->name('lecture.create');
        Route::get('/lecture/{id}/delete', 'LectureController@destroy')->name('lecture.delete');
        
        Route::get('/assignment/all', 'LectureController@AssignmentList')->name('assignment.all');
        Route::get('/assignment/create', 'LectureController@AssignmentCreate')->name('assignment.create');
        Route::post('/assignment/create', 'LectureController@AssignmentStore')->name('assignment.create');
        Route::get('/assignment/{id}/delete', 'LectureController@AssignmentDestroy')->name('assignment.delete');
   Route::get('/book/all', 'LectureController@bookList')->name('book.all');
        Route::get('/book/create', 'LectureController@bookCreate')->name('book.create');
        Route::post('/book/create', 'LectureController@bookStore')->name('book.create');
        Route::get('/book/{id}/delete', 'LectureController@bookDestroy')->name('book.delete');


    });
});

Route::group(['middleware' => 'student'], function () {

    Route::prefix('student')->group(function () {
        Route::get('/dashboard', 'HomeController@studentHome')->name('dashboard.student');
       
        Route::get('/slecture/all', 'LectureController@lecture_index')->name('slecture.all');
                Route::get('/sassignment/all', 'LectureController@assignment_index')->name('sassignment.all');

                        Route::get('/sbook/all', 'LectureController@book_index')->name('sbook.all');

        Route::get('/lecture/{id}/download', 'LectureController@download')->name('lecture.download');

       

    });
});