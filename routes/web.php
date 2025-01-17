<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','User\ProfileController@index')->name('profile.index');
Route::get('/update-profile','User\ProfileController@profileExist')->name('profile.update');
Route::post('/update-profile-picture','User\ProfileController@updateAvatar')->name('profile.update.picture');
Route::get('/remove-avatar','User\ProfileController@removeAvatar')->name('profile.avatar.remove');
