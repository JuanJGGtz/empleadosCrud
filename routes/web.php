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

use App\Http\Controllers\EmpleadosController;

Route::get('/', function () {
    return view('welcome');
});
# - FORMA 1 -
#Podemos observar la ruta que debe ser escrita en nuestro navegador
#"/empleados"
#Cuando se encuentre /empleados nos regresará a la vista (INDEX en la carpeta EMPLEADOS) = (empleados(carpeta).index(pagina))
#Route::get('/empleados',function(){
#    return view('empleados.index');
#});
#    Route::get('/empleados/create',function(){
#    return view('empleados.create');
#});
#Route::get('/empleados/edit',function(){
#    return view('empleados.edit');
#});
#- FORMA 2-
#Mandamos a llamar al Controlador que a su ves manda la vista con la nueva información 
#Route::get('/empleados',"EmpleadosController@index");
#Route::get('/empleados/create',"EmpleadosController@create");
#Route::get('/empleados/edit',"EmpleadosController@edit");

# - FORMA 3 -
# de esta manera creamos los routes para todas nuestras funciones (update, create , delete etc)
Route::resource('empleados', 'EmpleadosController');
