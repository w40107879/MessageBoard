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

//GET /msg/index 展示留言列表
//GET /msg/add 展示留言表單
//POST /msg/add 接受 POST 數據並加入資料庫
//GET /msg/del/{id} 删除留言
//[GET,POST] /msg/up/{id} 修改留言

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['before'=>'Auth'], function(){
Route::get('msg/index','MsgsController@index');
Route::get('msg/add','MsgsController@add');
Route::post('msg/add','MsgsController@addPost');
Route::get('msg/del/{id}','MsgsController@del')->where('id','\d+');
Route::match(['get','post'],'msg/edit/{id}','MsgsController@edit')->where('id','\d+');
Route::get('msg/replyindex/{id}','ReplysController@replyindex')->where('id','\d+');
Route::get('msg/reply/{id}','ReplysController@reply')->where('id','\d+');
Route::post('msg/reply/{id}','ReplysController@replyPost');
Route::get('msg/replydel/{id1}/{id2}','ReplysController@replydel')->where('id1','\d+');
Route::match(['get','post'],'msg/replyedit/{id1}/{id2}','ReplysController@replyedit')->where('id1','\d+');
});
