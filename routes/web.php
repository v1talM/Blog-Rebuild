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
Route::get('/article/{slug}', 'HomeController@article')->name('article');

Route::get('/oauth/github', 'SocialAuthGithubController@redirectToProvider');
Route::get('/oauth/github/callback', 'SocialAuthGithubController@handleProviderCallback');

Route::group(['prefix' => '/admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function ($router){
    $router->get('/', 'AdminController@index')->name('admin');
    $router->get('/article', 'AdminController@articles')->name('admin.article');
    $router->get('/article/{id}/edit', 'AdminController@edit')->name('article.edit');
    $router->put('/article/{id}', 'AdminController@update')->name('article.update');
    $router->get('/article/create', 'AdminController@create')->name('article.create');
    $router->post('/article', 'AdminController@store')->name('article.store');
    $router->delete('/article/{id}', 'AdminController@delete')->name('article.delete');
});

Route::group(['namespace' => 'Admin'], function ($router){
    $router->get('/login', 'AuthController@login');
    $router->post('/login', 'AuthController@auth')->name('login');
});

