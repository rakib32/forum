<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->action('TopicController@index');
    }
    return view('home');
});

Auth::routes();

Route::get('/home', 'TopicController@index')->name('home');
Route::resource('topics', 'TopicController');
