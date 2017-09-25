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

Route::match(['get', 'post'], 'search', 'SearchController@search');
Route::match(['get', 'post'], 'law', 'SearchController@law');

Auth::routes();

Route::post('code', 'CodeController@code')->name('code');

Route::get('page/{slug}', 'HomeController@page')->name('page');
Route::get('category', 'CategoryController@index')->name('category');
Route::get('category/{id}/{year?}', 'CategoryController@show')->name('show_category');
Route::get('post/{id}', 'PostController@show')->name('post');

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

Route::get('prepare', function()
{
    $taxonomy = App\Droit\Wordpress\Entites\Taxonomy::with('theparent')->where('term_id', '=',3229)->get()->first();

    echo '<pre>';
    print_r($taxonomy);
    echo '</pre>';exit();

    $terms = [
        'article' => 9,
        'loi'     => 'OMP',
        'alinea'  => 1,
        'chiffre' => null,
        'lettre'  => null,
    ];

    $terms = implode(':',array_filter($terms));

    echo '<pre>';
    print_r($terms);
    echo '</pre>';exit();
});

