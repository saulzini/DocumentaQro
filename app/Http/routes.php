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



Route::resource('excel','ExcelController');

/* PARA DEBUGEAR QUERIES
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
*/
