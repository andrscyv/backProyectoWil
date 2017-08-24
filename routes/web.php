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

//Rutas proyecto

////////////////////////////////////////////////
//Paginas de prueba
Route::get('/', function(){

	//return view('challengeWil.index');
	return view('aux');
});

Route::get('/miembros', function(){

	//return view('challengeWil.index');
	return view('miembros');
});

Route::get('/empresa', function(){

	//return view('challengeWil.index');
	return view('solicitud');
});

Route::get('/usuarios', function(){

	//return view('challengeWil.index');
	return view('usuarios');
});
////////////////////////////////////////////////

//Valida ingreso
Route::post('/ingreso', 'ControladorIngreso@valida');

//Carga tareas
Route::post('/tareas','ControladorMiembros@tareas');

//inserta tareas
Route::get('/agregaTarea','ControladorMiembros@agregaTarea');

//da de baja una tarea
Route::get('/bajaTarea','ControladorMiembros@bajaTarea');

//Crea nueva solicitud
Route::post('/solicitud','ControladorSolicitudes@nuevaSolicitud');

//Regresa informacion de un usuario al ingresar
Route::post('/usuario','ControladorIngreso@ingreso');

//Log-out del usuario
Route::get('/log_out','ControladorIngreso@logOut');

//Carga Pendientes
Route::post('/pendientes','ControladorMiembros@pendientes');

//Inserta Pendiente 
Route::get('/insertaPendiente','ControladorMiembros@insertaPendientes');

//lista nombres
Route::get('/listaMiembros','ControladorMiembros@listaMiembros');


