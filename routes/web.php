<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
// use App\Http\Controllers\CaptchaController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.store');
Route::post('/reply/store', 'App\Http\Controllers\CommentController@replyStore')->name('reply.store');

Route::get('/reload-captcha', 'App\Http\Controllers\CaptchaController@reloadCaptcha')->name('reload.captcha');

