<?php

use App\Http\Controllers\V1\DocumentoOrdenController;
use App\Models\V1\FundamentoJuridico;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('login', [Auth\LoginController::class, 'index']);
//Route::post('login', [Auth\LoginController::class, 'userLogin']);


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login-user', 'Auth\LoginController@userLogin');


Route::get('dependencia/login', 'Auth\LoginController@showLoginFormDependencia');
Route::post('login-dependencia', 'Auth\LoginController@dependenciaLogin');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/inicio', 'HomeController@index')->name('home');

    Route::resource('usuarios', V1\UsuarioController::class)->only([
        'index', 'create','show','store','edit','update','destroy',
    ]);

    Route::resource('dependencias', V1\DependenciaController::class)->only([
        'index', 'create','show','store','edit','update','destroy'
    ]);

    Route::resource('privilegios', V1\PrivilegioController::class)->only([
        'edit','update'
    ]);


    Route::get('/dependencia/inicio', 'ModuloDependencia@index')->name('dependencia.home');

    Route::resource('inspectores', V1\InspectorController::class)->only([
        'index', 'create','show','store','edit','update','destroy',
    ]);

    Route::resource('ordenes', V1\OrdenController::class)->only([
        'index', 'create','show','store','edit','update','destroy',
    ]);

    //fundamentos juridicos de inspectores
    Route::post('fundamentosInspectores/addFundamentosInspector', 'V1\FundamentoInspectorController@addFundamentosInspector')->name('addFundamentosInspector');
    //fundamentos jurificos de Ordenes de un inspector
    Route::get('fundamentosInspectores/getByInspector/{id?}', 'V1\FundamentoInspectorController@getByInspector')->name('getByInspector');
    Route::resource('fundamentosInspectores', V1\FundamentoInspectorController::class)->only([
        'index','store'
    ]);

    //fundamentos jurificos de Ordenes
    Route::post('fundamentosOrdenes/addFundamentosOrden', 'V1\FundamentoOrdenController@addFundamentosOrden')->name('addFundamentosOrden');
    
    Route::resource('fundamentosOrdenes', V1\FundamentoOrdenController::class)->only([
        'index','store','addFundamentosOrden'
    ]);
    //subir archivos
    Route::post('subirAchivo','V1\DocumentoOrdenController@store')->name('subirArchivo');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/ciudadano', 'ciudadanoController@index')->name('ciudadano');
Route::get('/ciudadano/inspector/{id?}', 'ciudadanoController@viewInspector')->name('ciudadano.verInspector');

