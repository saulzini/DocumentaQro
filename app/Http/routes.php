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
    return redirect('login');
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

Route::get('peliculasExport/item/{id?}',[
        'uses' =>'PeliculasController@exportar',
        'as' =>'peliculasExport/item/']

);



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

//Para festivales


Route::get('festivales',[
    'uses' => 'FestivalesController@index',
    'as' =>'festivales'

]);



Route::get('festivalesLista',[
        'uses' =>'FestivalesController@buscador',
        'as' =>'festivalesLista']

);



Route::get('festivalesLista/item/{id?}',[
        'uses' =>'FestivalesController@seleccion',
        'as' =>'festivalesLista/item']

);



Route::post('Festivales/eliminar','FestivalesController@eliminarFestivales',array('before' => 'csrf', function()
{

}));






Route::get('festivales/agregar',[
    'uses' => 'FestivalesController@pagAgregar',
    'as' =>'festivalesAgregar'

]);


Route::post('festivales/agregar/crear','FestivalesController@agregarFestivales',array( function()
{

}));

Route::get('festivales/modificar/item/{id}',[
    'uses' => 'FestivalesController@pagModificar',
    'as' =>'festivales/modificar/item'

]);


Route::post('festivales/modificar/festivales','FestivalesController@modificarFestivales',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

Route::get('festivalesExport/item/{id?}',[
        'uses' =>'FestivalesController@exportar',
        'as' =>'festivalesExport/item/']

);


//PARA SEDES


Route::get('sedes',[
    'uses' => 'SedesController@index',
    'as' =>'sedes'

]);



Route::get('sedesLista',[
        'uses' =>'SedesController@buscador',
        'as' =>'sedesLista']

);



Route::get('sedesLista/item/{id?}',[
        'uses' =>'SedesController@seleccion',
        'as' =>'sedesLista/item']

);



Route::post('Sedes/eliminar','SedesController@eliminarSedes',array('before' => 'csrf', function()
{
    dd("asdf");
}));






Route::get('sedes/agregar',[
    'uses' => 'SedesController@pagAgregar',
    'as' =>'sedesAgregar'

]);


Route::post('sedes/agregar/crear','SedesController@agregarSedes',array('before' => 'csrf', function()
{

}));

Route::get('sedes/modificar/item/{id}',[
    'uses' => 'SedesController@pagModificar',
    'as' =>'sedes/modificar/item'

]);


Route::post('sedes/modificar/sedes','SedesController@modificarSedes',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

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


/*
 *
 * Rutas para realizadores
 *
 * */


Route::get('realizadores',[
    'uses' => 'RealizadoresController@index',
    'as' =>'realizadores'

]);



Route::get('realizadoresLista',[
        'uses' =>'RealizadoresController@buscador',
        'as' =>'realizadoresLista']

);



Route::get('realizadoresLista/item/{id?}',[
        'uses' =>'RealizadoresController@seleccion',
        'as' =>'realizadoresLista/item']

);



Route::post('realizadores/eliminar','RealizadoresController@eliminarRealizadores',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));

Route::get('realizadores/agregar',[
    'uses' => 'RealizadoresController@pagAgregar',
    'as' =>'realizadoresAgregar'

]);


Route::post('realizadores/agregar/crear','RealizadoresController@agregarRealizadores',array('before' => 'csrf', function()
{

}));

Route::get('realizadores/modificar/item/{id}',[
    'uses' => 'RealizadoresController@pagModificar',
    'as' =>'realizadores/modificar/item'

]);


Route::post('realizadores/modificar/realizadores','RealizadoresController@modificarRealizadores',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



/*
 *
 * Rutas para patrocinadores
 *
 * */


Route::get('patrocinadores',[
    'uses' => 'PatrocinadoresController@index',
    'as' =>'patrocinadores'

]);



Route::get('patrocinadoresLista',[
        'uses' =>'PatrocinadoresController@buscador',
        'as' =>'patrocinadoresLista']

);



Route::get('patrocinadoresLista/item/{id?}',[
        'uses' =>'PatrocinadoresController@seleccion',
        'as' =>'patrocinadoresLista/item']

);



Route::post('patrocinadores/eliminar','PatrocinadoresController@eliminarPatrocinadores',array('before' => 'csrf', function()
{
    //  dd("hghgh");
}));

Route::get('patrocinadores/agregar',[
    'uses' => 'PatrocinadoresController@pagAgregar',
    'as' =>'patrocinadoresAgregar'

]);


Route::post('patrocinadores/agregar/crear','PatrocinadoresController@agregarPatrocinadores',array('before' => 'csrf', function()
{

}));

Route::get('patrocinadores/modificar/item/{id}',[
    'uses' => 'PatrocinadoresController@pagModificar',
    'as' =>'patrocinadores/modificar/item'

]);


Route::post('patrocinadores/modificar/patrocinadores','PatrocinadoresController@modificarPatrocinadores',array('before' => 'csrf', function()
{
    // dd("modificar");
}));

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


Route::get('paquetesLista',[
        'uses' =>'PaquetesController@buscador',
        'as' =>'paquetesLista']

);



Route::get('paquetesLista/item/{id?}',[
        'uses' =>'PaquetesController@seleccion',
        'as' =>'paquetesLista/item']

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
 *  Rutas para programas
 *
 * */

Route::get('programas',[
    'uses' => 'ProgramasController@index',
    'as' =>'programas'

]);

Route::get('programas/agregar',[
    'uses' => 'ProgramasController@pagAgregar',
    'as' =>'programasAgregar'

]);


Route::post('programas/agregar/crear','ProgramasController@agregarProgramas',array('before' => 'csrf', function()
{
    //
}));


Route::get('programasLista',[
        'uses' =>'ProgramasController@buscador',
        'as' =>'programasLista']

);



Route::get('programasLista/item/{id?}',[
        'uses' =>'ProgramasController@seleccion',
        'as' =>'programasLista/item']

);


Route::get('programas/modificar/item/{id}',[
    'uses' => 'ProgramasController@pagModificar',
    'as' =>'programas/modificar/item'

]);


Route::post('programas/modificar/programas','ProgramasController@modificarProgramas',array('before' => 'csrf', function()
{
    // dd("modificar");
}));



Route::post('programas/eliminar','ProgramasController@eliminarProgramas',array('before' => 'csrf', function()
{

}));





/*
 *
 * Rutas de inicio de sesion
 *
 *
 * */

// Authentication routes...
Route::get('login',[
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'

]);


Route::post('login','Auth\AuthController@postLogin',array('before' => 'csrf', function()
{

}));



Route::get('logout', [

    'uses'=>'Auth\AuthController@getLogout',
    'as'=>'logout'
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

//RUTAS DE REPORTES
Route::get('reportes/funciones',[
    'uses' => 'ReportesController@index',
    'as' =>'reportesFuncion'
]);


Route::get('reporteExcel/{reporte}',[
    'uses' => 'ExcelController@export',
    'as' =>'reporte'
]);


Route::get('reportes/funciones/consultar',[
    'uses' => 'ReportesController@consultarFunciones',
    'as' =>'reportesConsultarFunciones'
]);



Route::get('reportes/paises',[
    'uses' => 'ReportesController@indexPais',
    'as' =>'reportesPais'
]);

Route::get('reportes/paises/consultar',[
    'uses' => 'ReportesController@consultarPaises',
    'as' =>'reportesConsultarPaises'
]);

Route::get('reportes/sedes',[
    'uses' => 'ReportesController@indexSede',
    'as' =>'reportesSede'
]);

Route::get('reportes/sedes/consultar',[
    'uses' => 'ReportesController@consultarSedes',
    'as' =>'reportesConsultarSedes'
]);

Route::get('reportes/programas',[
    'uses' => 'ReportesController@indexPrograma',
    'as' =>'reportesPrograma'
]);

Route::get('reportes/programas/consultar',[
    'uses' => 'ReportesController@consultarProgramas',
    'as' =>'reportesConsultarProgramas'
]);

Route::get('reportes/festivales',[
    'uses' => 'ReportesController@indexFestival',
    'as' =>'reportesFestival'
]);

Route::get('reportes/festivales/consultar',[
    'uses' => 'ReportesController@consultarFestivales',
    'as' =>'reportesConsultarFestivales'
]);





/*
 *
 *  Exportar
 *
 * */

Route::get('patrocinadoresExport/item/{id?}',[
        'uses' =>'PatrocinadoresController@exportarPatrocinadores',
        'as' =>'patrocinadoresExport/item/']

);


Route::get('realizadoresExport/item/{id?}',[
        'uses' =>'RealizadoresController@exportarRealizadores',
        'as' =>'realizadoresExport/item/']

);

Route::get('funcionesExport/item/{id?}',[
        'uses' =>'FuncionesController@exportarFunciones',
        'as' =>'funcionesExport/item/']

);


Route::get('paquetesExport/item/{id?}',[
        'uses' =>'PaquetesController@exportarPaquetes',
        'as' =>'paquetesExport/item/']

);

Route::get('programasExport/item/{id?}',[
        'uses' =>'ProgramasController@exportarProgramas',
        'as' =>'programasExport/item/']);
// Authentication routes...
Route::get('configuracion',[
    'uses' => 'ContrasenaController@index',
    'as' => 'configuracion'

]);

Route::get('integrantesExport/item/{id?}',[
        'uses' =>'IntegrantesController@exportarIntegrantes',
        'as' =>'integrantesExport/item/']
);

Route::get('traficosExport/item/{id?}',[
        'uses' =>'TraficosController@exportarTraficos',
        'as' =>'traficosExport/item/']
);

Route::get('caracteristicasExport/item/{id?}',[
        'uses' =>'CaracteristicasController@exportarCaracteristicas',
        'as' =>'caracteristicasExport/item/']
);




Route::post('configuracion/actualizar','ContrasenaController@cambiarContrasena',array('before' => 'csrf', function()
{
    //
}));



