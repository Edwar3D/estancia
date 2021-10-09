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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('login', [Auth\LoginController::class, 'index']);
//Route::post('login', [Auth\LoginController::class, 'userLogin']);


Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login-user', 'Auth\LoginController@userLogin');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/inicio', 'HomeController@index')->name('home');

    Route::resource('usuarios', V1\UsuarioController::class)->only([
        'index', 'create','show','store','edit','update','destroy'
    ]);

    Route::resource('privilegios', V1\PrivilegioController::class)->only([
        'edit','update'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
