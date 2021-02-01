<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['uses'=>'Controller@home']);
Route::get('/reviewInput', ['uses'=>'Controller@reviewInput']);
Route::get('/movieInput', ['uses'=>'Controller@movieInput']);

Route::post('/postReview','Controller@postReview');
Route::post('/postMovie','Controller@postMovie');