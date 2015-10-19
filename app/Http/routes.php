<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 *
 *  Rutas para las funciones
 *
 * */

Route::get('funciones',[
    'uses' => 'FuncionesController@index',
    'as' =>'funciones'

]);

Route::get('funciones/agregar',[
    'uses' => 'FuncionesController@pagAgregar',
    'as' =>'funcionesAgregar'

]);


Route::post('funciones/agregar/crear','FuncionesController@agregarFunciones',array('before' => 'csrf', function()
{
    //
}));


Route::get('funcionesLista',[
        'uses' =>'FuncionesController@buscador',
        'as' =>'funcionesLista']

);



Route::get('funcionesLista/item/{id?}',[
        'uses' =>'FuncionesController@seleccion',
        'as' =>'funcionesLista/item']

);

Route::get('funcionesExport/item/{id?}',[
        'uses' =>'PdfController@exportar',
        'as' =>'funcionesExport/item/']

);



Route::get('funciones/modificar/item/{id}',[
    'uses' => 'FuncionesController@pagModificar',
    'as' =>'funciones/modificar/item'

]);


Route::post('funciones/modificar/funciones','FuncionesController@modificarFunciones',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



Route::post('funciones/eliminar','FuncionesController@eliminarFunciones',array('before' => 'csrf', function()
{
  //  dd("hghgh");
}));


/**
 * RUTAS PARA PELICULAS
 *
 */


Route::get('peliculas',[
    'uses' => 'PeliculasController@index',
    'as' =>'peliculas'

]);



Route::get('peliculasLista',[
        'uses' =>'PeliculasController@buscador',
        'as' =>'peliculasLista']

);



Route::get('peliculasLista/item/{id?}',[
        'uses' =>'PeliculasController@seleccion',
        'as' =>'peliculasLista/item']

);



Route::post('peliculas/eliminar','PeliculasController@eliminarPeliculas',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));






Route::get('peliculas/agregar',[
    'uses' => 'PeliculasController@pagAgregar',
    'as' =>'peliculasAgregar'

]);


Route::post('peliculas/agregar/crear','PeliculasController@agregarPeliculas',array('before' => 'csrf', function()
{

}));

Route::get('peliculas/modificar/item/{id}',[
    'uses' => 'PeliculasController@pagModificar',
    'as' =>'peliculas/modificar/item'

]);


Route::post('peliculas/modificar/peliculas','PeliculasController@modificarPeliculas',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



//RUTAS Para trafico


Route::get('traficos',[
    'uses' => 'TraficosController@index',
    'as' =>'traficos'

]);



Route::get('traficosLista',[
        'uses' =>'TraficosController@buscador',
        'as' =>'traficosLista']

);



Route::get('traficosLista/item/{id?}',[
        'uses' =>'TraficosController@seleccion',
        'as' =>'traficosLista/item']

);



Route::post('traficos/eliminar','TraficosController@eliminarTraficos',array('before' => 'csrf', function()
{
    dd("hghgh");
}));






Route::get('traficos/agregar',[
    'uses' => 'TraficosController@pagAgregar',
    'as' =>'traficosAgregar'

]);


Route::post('traficos/agregar/crear','TraficosController@agregarTraficos',array('before' => 'csrf', function()
{

}));

Route::get('traficos/modificar/item/{id}',[
    'uses' => 'TraficosController@pagModificar',
    'as' =>'traficos/modificar/item'

]);


Route::post('traficos/modificar/traficos','TraficosController@modificarTraficos',array('before' => 'csrf', function()
{
    // dd("modificar");
}));


Route::resource('excel','ExcelController');

/* PARA DEBUGEAR QUERIES
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
*/

// RUTAS PARA INTEGRANTES

Route::get('integrantes',[
    'uses' => 'IntegrantesController@index',
    'as' =>'integrantes'

]);



Route::get('integrantesLista',[
        'uses' =>'IntegrantesController@buscador',
        'as' =>'integrantesLista']

);



Route::get('integrantesLista/item/{id?}',[
        'uses' =>'IntegrantesController@seleccion',
        'as' =>'integrantesLista/item']

);



Route::post('integrantes/eliminar','IntegrantesController@eliminarIntegrantes',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));


Route::get('integrantes/agregar',[
    'uses' => 'IntegrantesController@pagAgregar',
    'as' =>'integrantesAgregar'

]);


Route::post('integrantes/agregar/crear','IntegrantesController@agregarIntegrantes',array('before' => 'csrf', function()
{

}));

Route::get('integrantes/modificar/item/{id}',[
    'uses' => 'IntegrantesController@pagModificar',
    'as' =>'integrantes/modificar/item'

]);


Route::post('integrantes/modificar/integrantes','IntegrantesController@modificarIntegrantes',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

// RUTAS PARA CARACTERISTICAS

Route::get('caracteristicas',[
    'uses' => 'CaracteristicasController@index',
    'as' =>'caracteristicas'

]);



Route::get('caracteristicasLista',[
        'uses' =>'CaracteristicasController@buscador',
        'as' =>'caracteristicasLista']

);



Route::get('caracteristicasLista/item/{id?}',[
        'uses' =>'CaracteristicasController@seleccion',
        'as' =>'caracteristicasLista/item']

);



Route::post('caracteristicas/eliminar','CaracteristicasController@eliminarCaracteristicas',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));


Route::get('caracteristicas/agregar',[
    'uses' => 'CaracteristicasController@pagAgregar',
    'as' =>'caracteristicasAgregar'

]);


Route::post('caracteristicas/agregar/crear','CaracteristicasController@agregarCaracteristicas',array('before' => 'csrf', function()
{

}));

Route::get('caracteristicas/modificar/item/{id}',[
    'uses' => 'CaracteristicasController@pagModificar',
    'as' =>'caracteristicas/modificar/item'

]);


Route::post('caracteristicas/modificar/caracteristicas','CaracteristicasController@modificarCaracteristicas',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

<<<<<<< HEAD
=======
Route::get('sedesExport/item/{id?}',[
        'uses' =>'SedesController@exportar',
        'as' =>'sedesExport/item/']

);




/* PARA DEBUGEAR QUERIES
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
*/


>>>>>>> reportesFunciones
/*
 *
 *  Rutas para paquetes
 *
 * */

Route::get('paquetes',[
    'uses' => 'PaquetesController@index',
    'as' =>'paquetes'

]);

Route::get('paquetes/agregar',[
    'uses' => 'PaquetesController@pagAgregar',
    'as' =>'paquetesAgregar'

]);


Route::post('paquetes/agregar/crear','PaquetesController@agregarPaquetes',array('before' => 'csrf', function()
{
    //
}));


Route::get('paquetesLista',[
        'uses' =>'PaquetesController@buscador',
        'as' =>'paquetesLista']

);



Route::get('paquetesLista/item/{id?}',[
        'uses' =>'PaquetesController@seleccion',
        'as' =>'paquetesLista/item']

);

Route::get('paquetesExport/item/{id?}',[
        'uses' =>'PdfController@exportar',
        'as' =>'paquetesExport/item/']

);

Route::get('paquetes/modificar/item/{id}',[
    'uses' => 'PaquetesController@pagModificar',
    'as' =>'paquetes/modificar/item'

]);


Route::post('paquetes/modificar/paquetes','PaquetesController@modificarPaquetes',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



Route::post('paquetes/eliminar','PaquetesController@eliminarPaquetes',array('before' => 'csrf', function()
{

<<<<<<< HEAD
}));
=======
// RUTAS PARA INTEGRANTES

Route::get('integrantes',[
    'uses' => 'IntegrantesController@index',
    'as' =>'integrantes'

]);



Route::get('integrantesLista',[
        'uses' =>'IntegrantesController@buscador',
        'as' =>'integrantesLista']

);



Route::get('integrantesLista/item/{id?}',[
        'uses' =>'IntegrantesController@seleccion',
        'as' =>'integrantesLista/item']

);



Route::post('integrantes/eliminar','IntegrantesController@eliminarIntegrantes',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));


Route::get('integrantes/agregar',[
    'uses' => 'IntegrantesController@pagAgregar',
    'as' =>'integrantesAgregar'

]);


Route::post('integrantes/agregar/crear','IntegrantesController@agregarIntegrantes',array('before' => 'csrf', function()
{

}));

Route::get('integrantes/modificar/item/{id}',[
    'uses' => 'IntegrantesController@pagModificar',
    'as' =>'integrantes/modificar/item'

]);


Route::post('integrantes/modificar/integrantes','IntegrantesController@modificarIntegrantes',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

// RUTAS PARA CARACTERISTICAS

Route::get('caracteristicas',[
    'uses' => 'CaracteristicasController@index',
    'as' =>'caracteristicas'

]);



Route::get('caracteristicasLista',[
        'uses' =>'CaracteristicasController@buscador',
        'as' =>'caracteristicasLista']

);



Route::get('caracteristicasLista/item/{id?}',[
        'uses' =>'CaracteristicasController@seleccion',
        'as' =>'caracteristicasLista/item']

);



Route::post('caracteristicas/eliminar','CaracteristicasController@eliminarCaracteristicas',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));


Route::get('caracteristicas/agregar',[
    'uses' => 'CaracteristicasController@pagAgregar',
    'as' =>'caracteristicasAgregar'

]);


Route::post('caracteristicas/agregar/crear','CaracteristicasController@agregarCaracteristicas',array('before' => 'csrf', function()
{

}));

Route::get('caracteristicas/modificar/item/{id}',[
    'uses' => 'CaracteristicasController@pagModificar',
    'as' =>'caracteristicas/modificar/item'

]);


Route::post('caracteristicas/modificar/caracteristicas','CaracteristicasController@modificarCaracteristicas',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

/*
 *
 *  Rutas para paquetes
 *
 * */

Route::get('paquetes',[
    'uses' => 'PaquetesController@index',
    'as' =>'paquetes'

]);

Route::get('paquetes/agregar',[
    'uses' => 'PaquetesController@pagAgregar',
    'as' =>'paquetesAgregar'

]);


Route::post('paquetes/agregar/crear','PaquetesController@agregarPaquetes',array('before' => 'csrf', function()
{
    //
}));

>>>>>>> reportesFunciones

Route::get('paquetesLista',[
        'uses' =>'PaquetesController@buscador',
        'as' =>'paquetesLista']

);



Route::get('paquetesLista/item/{id?}',[
        'uses' =>'PaquetesController@seleccion',
        'as' =>'paquetesLista/item']

);

Route::get('paquetesExport/item/{id?}',[
        'uses' =>'PdfController@exportar',
        'as' =>'paquetesExport/item/']

);

Route::get('paquetes/modificar/item/{id}',[
    'uses' => 'PaquetesController@pagModificar',
    'as' =>'paquetes/modificar/item'

]);


Route::post('paquetes/modificar/paquetes','PaquetesController@modificarPaquetes',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



Route::post('paquetes/eliminar','PaquetesController@eliminarPaquetes',array('before' => 'csrf', function()
{

}));



/*
 *
 * Rutas de inicio de sesion
 *
 *
 * */

// Authentication routes...
Route::get('iniciarSesion',[
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'iniciarSesion'

]);


Route::post('iniciarSesion','Auth\AuthController@postLogin',array('before' => 'csrf', function()
{

}));



Route::get('cerrarSesion', [

    'uses'=>'Auth\AuthController@getLogout',
    'as'=>'cerrarSesion'
]);




// Registration routes...
Route::get('register',[
    'uses'=>'Auth\AuthController@getRegister',
    'as' => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');





// Password reset link request routes...
Route::get('password/email',[
    'uses' => 'Auth\PasswordController@getEmail',
    'as' => 'password/email'

]);


Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

<<<<<<< HEAD
=======
//RUTAS DE REPORTES
Route::get('reportes/funciones',[
    'uses' => 'ReportesController@index',
    'as' =>'reportes'
]);


Route::get('reporteExcel/{reporte}',[
    'uses' => 'ExcelController@export',
    'as' =>'reporteFuncion'
]);



Route::post('reportes/funciones/consultar','ReportesController@consultarFunciones',array('before' => 'csrf', function()
{

}));
>>>>>>> reportesFunciones
