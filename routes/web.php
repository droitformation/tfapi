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
Route::get('/', 'HomeController@index')->name('home');
Route::get('articles', 'ArticleController@index');
Route::get('posts', 'ArticleController@posts');
Route::get('test', 'ArticleController@test');
Route::get('update', 'ArticleController@update');
Route::get('mail', 'ArticleController@mail');
Route::get('abos', 'ArticleController@abos');

Route::match(['get', 'post'], 'search', 'ArticleController@search');

Auth::routes();

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', ['uses' => 'Backend\AdminController@index']);

    Route::post('upload', 'Backend\UploadController@upload');
    Route::post('uploadFile', 'Backend\UploadController@uploadFile');
    Route::post('uploadJS', 'Backend\UploadController@uploadJS');
    Route::post('uploadRedactor', 'Backend\UploadController@uploadRedactor');

    Route::get('imageJson/{id?}', ['uses' => 'Backend\UploadController@imageJson']);
    Route::get('fileJson/{id?}', ['uses' => 'Backend\UploadController@fileJson']);

});
