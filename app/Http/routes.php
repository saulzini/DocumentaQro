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


Route::post('festivales/agregar/crear','FestivalesController@agregarFestivales',array('before' => 'csrf', function()
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


Route::resource('excel','ExcelController');

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
