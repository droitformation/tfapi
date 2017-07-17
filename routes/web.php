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

    $update = App::make('App\Droit\Bger\Worker\UpdateInterface');
    $model = App::make('App\Droit\Decision\Repo\DecisionInterface');

    $expect = ['sicherheit','autre mot ici','tribunal'];

    $results = $model->search($expect, 188, 1);

});

Route::get('articles', 'ArticleController@index');
Route::get('test', 'ArticleController@test');
Route::get('update', 'ArticleController@update');
Route::get('search', 'ArticleController@search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

