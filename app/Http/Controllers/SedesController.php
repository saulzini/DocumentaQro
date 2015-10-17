<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Http\Requests\Eliminar;
use App\Http\Requests\SedesRequest;
use App\Sede;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now= Carbon::now()->toDateTimeString();
        $now2 =Carbon::now()->subMonth(6)->toDateTimeString();

        $Sedes= Sede::whereBetween('updated_at',[ $now2,$now])->orderBy('descripcion', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);


        return view ('Sedes/Sedes')->with([
            'Sedes' => $Sedes,
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
        return view('Sedes/SedesAgregar')->with([

        ]);
    }

    public function adaptarSede($request)
    {

        $sede=new Sede();

        if(isset($request->sedeID))
            $sede= Sede::findOrFail($request->sedeID);

        $sede->descripcion=$request->Descripcion;

        return $sede;
    }

    public function agregarSedes(SedesRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $sede= $this->adaptarSede($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($sede,$request)
        {
            $sede->save();
        });
        //El registro se ha agregado
        Session::flash('message', $sede->descripcion. ' ha sido agregado');
        return redirect('sedes/agregar');
    }

    public function pagModificar($id)
    {

        $sedesItem = Sede::findOrFail($id);

        return view('Sedes/SedesModificar')->with([

            'sedesItem'=>$sedesItem,

        ]);


    }

    public function modificarSedes(SedesRequest $request)
    {
        //dd($request);
        //Llamar adaptarPelicula para pasar los valores correctos
        $sede= $this->adaptarSede($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($sede,$request)
        {
            $sede->save();
            $sede->push();
        });
        //El registro se ha agregado
        Session::flash('message', $sede->descripcion. ' ha sido modificado');
        return redirect('sedes/modificar/item/'.$sede->id);
    }

    public function eliminarSedes(Eliminar $request){
        $error=false;
        $sede=Sede::findOrFail($request->sedeID);
            try
            {
                $sede->delete();
            }
            catch(PDOException  $e)
            {
                Session::flash('error', $sede->descripcion. ' no pudo ser eliminado, integridad de la base de datos');
                return redirect('sedes');
            }

            //Funcion::where('id_sede',$sede->id)->update(['id_sede'=>""]);



            Session::flash('message', $sede->descripcion. ' ha sido eliminado');

        //El registro se ha eliminado

        return redirect('sedes');
    }

    public  function buscador(Request $request){

        $Sedes= Sede::titulo($request->get('buscador'))->orderBy('descripcion', 'asc')->paginate(15);

        return view ('Sedes/Sedes')->with([
            'Sedes' => $Sedes,

        ]);
    }

    public function castFunctionsDate($Funciones)
    {
        foreach ($Funciones as $funcion)
        {
            $fecha=$funcion->fecha;
            $funcion->fecha=Carbon::createFromFormat("Y-m-d H:i:s", $fecha);
            $funcion->fecha=$funcion->fecha->format('d/m/Y H:i');
        }

    }

    public function seleccion($id)
    {
        //obtener funcion


        $sedeItem = Sede::findOrFail($id);
        $funciones=$sedeItem->funciones;
        $this->castFunctionsDate($funciones);
        if($funciones->isEmpty())
            $funciones=null;


        return view('Sedes/SedesConsultar')->with([

            'sedeItem'=>$sedeItem,
            'funciones'=>$funciones,



        ]);
    }

    public function exportar($id){
        $sedeItem = Sede::findOrFail($id);
        $funciones=$sedeItem->funciones;
        $this->castFunctionsDate($funciones);
        if($funciones->isEmpty())
            $funciones=null;

        $view =  \View::make('Sedes/Reporte',compact('sedeItem','funciones'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Sede '.$sedeItem->descripcion.'.pdf');


    }


}
