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
    return view('welcome');
});

//Route::get('/home','PagesController@index');

//Route::get('/start','PagesController@start');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/ujian/finish', 'UjianController@finish');
Route::get('/ujian/hasil', 'UjianController@hasil');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('ujian','UjianController');


//Route::get('/ujian', 'HomeController@start');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('hasil', 'AdminController@hasil');
    Route::resource('peserta','PesertaController');
    Route::resource('soal','SoalController');

});