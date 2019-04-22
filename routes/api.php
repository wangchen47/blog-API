<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'UserController@register');//注册

Route::post('login', 'UserController@login');//登陆

Route::resource('articles', 'ArticleController');//文章管理

Route::get('articles-filiter/{id}/{pageSiz}/{page}', 'ArticleController@getFiliterIndex');//文章筛选

Route::put('user/{id}', 'ArticleController@update');