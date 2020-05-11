
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios', 'PersonsController');

Route::get('/usuarios/{id}/update', 'PersonsController@updateRegister');

Route::get('/clientes/create', 'PersonsController@registerClient');

Route::resource('conductores', 'DriversController');

Route::resource('vehiculos', 'VehiclesController');

Route::get('/vehiculos/create', 'VehiclesController@create');

Route::get('/conductor/create', 'DriversController@create');

Route::patch('/conductores/{id}/activar', 'DriversController@activar');

Route::patch('/conductores/{id}/desactivar', 'DriversController@desactivar');

Route::resource('zonas', 'ZonesController');

Route::resource('colonias', 'ColoniesController');

Route::resource('recepcionistas', 'UsersController');

Route::resource('carreras', 'ServicesController');

Route::get('/carreras/create', 'ServicesController@create');

Route::resource('pagos', 'PaymentsController');

Route::get('pagos/{id}/{date}', 'PaymentsController@pendingPayment');

Route::get('prueba', 'PaymentsController@prueba');

Route::resource('marcas', 'BrandsController');

Route::resource('modelos', 'ModelsController');

Route::get('profile/{id}', 'UsersController@profile');



