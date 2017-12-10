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

Route::redirect('/', '/home');
Route::resource('posts', 'PostController')->middleware('auth');
Route::resource('comments', 'CommentsController')->middleware('auth');
Auth::routes();
Route::get('/home', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create')->name('create')->middleware('auth');
Route::post('comments/{postID}', 'CommentsController@create')->middleware('auth');
Route::post('comments/store/{post_id}', 'CommentsController@store')->middleware('auth')->name('store');
