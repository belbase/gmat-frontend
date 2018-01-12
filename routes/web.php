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

Route::get('/', 'DefaultController@index')->name('home');
Route::post('/logout', 'DefaultController@logout');
// Route::any('/practice', 'QuestionController@index');
Route::any('/practice','PageController@page');
Route::any('/practice/exam/preference','ExamController@preference');
Route::any('/practice/exam/start', 'ExamController@start');
Route::any('/practice/exam/end', 'ExamController@end');
Route::post('/practice/exam/next', 'ExamController@next');
Route::any('/practice/exam/switch','ExamController@switch');
Route::any('/practice/exam/instructions','ExamController@instructions');
Route::get('/practice/exam/result', 'ResultController@index');
Route::get('/practice/exam/question', 'QuestionController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::any('/test', function(){
  // return view('test');
});
// Route::any('/test1','QuestionController@test1');
// Route::any('/test2','QuestionController@test2');
\App\Http\Controllers\DashboardController::routes();
