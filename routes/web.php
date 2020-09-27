<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','TopicController@index');

Route::get('/topics/create','TopicController@create')->name('topic.create');
Route::post('/topics/create','TopicController@store');
Route::get('/topics/{id}/show','TopicController@show')->name('topic.show');
Route::get('/topics/{id}/delete','TopicController@destroy')->name('topic.destroy');

Route::get('/topics/{id}/comment/create','CommentController@create')->name('comment.create');
Route::post('/topics/{id}/comment/create','CommentController@store');
Route::get('/comment/{id}/delete','CommentController@destroy')->name('comment.destroy');

Route::get('/comment/{id}/reply/create','ReplyController@create')->name('reply.create');
Route::post('/comment/{id}/reply/create','ReplyController@store');
