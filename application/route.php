<?php
use think\Route;

Route::get('/', 'index/index/index');//首页

//产品
Route::group(['prefix' => 'index/product/', 'ext' => 'html'], function () {
    Route::get('/product/index-<page>$', 'index');//模块首页
    Route::get('<urlroute?>-p<sortid>-<page>$', 'index');//列表页
    Route::get('<urlroute?>-p<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//新闻
Route::group(['prefix' => 'index/news/', 'ext' => 'html'], function () {
    Route::get('/news/index-<page>$', 'index');//模块首页
    Route::get('<urlroute?>-n<sortid>-<page>$', 'index');//列表页
    Route::get('<urlroute?>-n<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//下载
Route::group(['prefix' => 'index/down/', 'ext' => 'html'], function () {
    Route::get('/down/index-<page>$', 'index');//模块首页
    Route::get('<urlroute?>-d<sortid>-<page>$', 'index');//列表页
    Route::get('<urlroute?>-d<id>$', 'view');//详情页
    Route::get('download-<id>$', 'down');//点击下载
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//案例
Route::group(['prefix' => 'index/project/', 'ext' => 'html'], function () {
    Route::get('/project/index-<page>$', 'index');//模块首页
    Route::get('<urlroute?>-c<sortid>-<page>$', 'index');//列表页
    Route::get('<urlroute?>-c<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//单页
/*单页模块的列表页规则，请参考新闻列表页的规则*/
Route::group(['prefix' => 'index/about/', 'ext' => 'html'], function () {
    Route::get('<urlroute?>-a<id>$', 'view');//详情页
    Route::get('about/guestbook$', 'guestbook');//详情页
}, [], ['id' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);



//Route::get('/en/', 'en/index/index');//首页

//产品
Route::group(['prefix' => 'en/product/', 'ext' => 'html'], function () {
    Route::get('/en/product/index-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-p<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-p<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//新闻
Route::group(['prefix' => 'en/news/', 'ext' => 'html'], function () {
    Route::get('/en/news/index-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-n<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-n<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//下载
Route::group(['prefix' => 'en/down/', 'ext' => 'html'], function () {
    Route::get('/en/down/index-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-d<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-d<id>$', 'view');//详情页
    Route::get('/en/download-<id>$', 'down');//点击下载
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//案例
Route::group(['prefix' => 'en/project/', 'ext' => 'html'], function () {
    Route::get('/en/project/index-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-c<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-c<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

//单页
/*单页模块的列表页规则，请参考新闻列表页的规则*/
Route::group(['prefix' => 'en/about/', 'ext' => 'html'], function () {
    Route::get('/en/<urlroute?>-a<id>$', 'view');//详情页
    Route::get('/en/about/guestbook$', 'guestbook');//详情页
}, [], ['id' => '\d+', 'urlroute' => '^[A-Za-z0-9]\w+']);

