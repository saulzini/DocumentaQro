<?php

namespace App\Http\Controllers;

use App\Caracteristica;
use App\Http\Requests\CaracteristicasRequest;
use App\Http\Requests\Eliminar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct()
    {
        //se valida que no este logueado
        if(!Auth::check() ){

            $this->middleware('auth');
        }
        else {
            //Si esta logueado entonces se revisa el permiso
            if (Auth::user()->can('caracteristicas'))
            {


            }
            else {
                //Si no tiene el permiso entonces cierra la sesion y manda un error 404
                //Auth::logout();
                abort('404');

            }
        }


    }

    public function index()
    {
        $now= Carbon::now()->toDateTimeString();
        $now2 =Carbon::now()->subMonth(6)->toDateTimeString();

        $Caracteristicas= Caracteristica::whereBetween('updated_at',[ $now2,$now])->orderBy('nombre', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);


        return view ('Caracteristicas/Caracteristicas')->with([
            'Caracteristicas' => $Caracteristicas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pagAgregar()
    {
        return view('Caracteristicas/CaracteristicasAgregar')->with([

        ]);
    }

    public function pagModificar($id)
    {
        $caracteristicasItem = Caracteristica::findOrFail($id);

        return view('Caracteristicas/CaracteristicasModificar')->with([
            'caracteristicasItem'=>$caracteristicasItem,
        ]);
    }

    public function agregarCaracteristicas(CaracteristicasRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $caracteristica= $this->adaptarCaracteristica($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($caracteristica,$request)
        {
            $caracteristica->save();
        });
        //El registro se ha agregado
        Session::flash('message', $caracteristica->nombre. ' ha sido agregado');
        return redirect('caracteristicas/agregar');
    }

    public function adaptarCaracteristica($request)
    {

        $caracteristica =new Caracteristica();

        if(isset($request->caracteristicasID))
            $caracteristica= Caracteristica::findOrFail($request->caracteristicasID);
        $caracteristica->nombre=$request->Nombre;
        return $caracteristica;
    }

    public function eliminarCaracteristicas (Eliminar $request){

        $caracteristicas= Caracteristica::findOrFail($request->caracteristicasID);

        DB::transaction(function() use ($caracteristicas)
        {
            $caracteristicas->delete();

        });
        //El registro se ha eliminado
        Session::flash('message', $caracteristicas->nombre. ' ha sido eliminado');
        return redirect('caracteristicas');
    }

    public  function buscador(Request $request){

        $Caracteristicas= Caracteristica::nombre($request->get('buscador'))->orderBy('nombre', 'asc')->paginate(15);
        return view ('Caracteristicas/Caracteristicas')->with([
            'Caracteristicas' => $Caracteristicas,

        ]);
    }

    public function modificarCaracteristicas(CaracteristicasRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $caracteristica= $this->adaptarCaracteristica($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($caracteristica,$request)
        {

            //Guardar Registro

            $caracteristica->save();
            $caracteristica->push();

        });

        //El registro se ha agregado
        Session::flash('message', $caracteristica->nombre. ' ha sido modificado');

        return redirect('caracteristicas/modificar/item/'.$caracteristica->id);
    }

    public function seleccion($id)
    {
        //obtener funcion
        //CAMBIAR EL FIND

        $caracteristicaItem = Caracteristica::find($id);
        $nombre = $caracteristicaItem->nombre;


        return view('Caracteristicas/CaracteristicasConsultar')->with([

            'caracteristicaItem'=>$caracteristicaItem,
            'nombre' => $nombre,
        ]);
    }

    public function exportarCaracteristicas($id){

        $caracteristicaItem = Caracteristica::findOrFail($id);


        $view =  \View::make('Caracteristicas.PDFCaracteristicas',compact('caracteristicaItem'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');
    }


}
