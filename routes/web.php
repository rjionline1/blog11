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

Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');
Route::get('about', 'PageController@getAbout');
Route::get('/', 'PageController@getIndex');
Route::get('create', 'PostController@create');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);



