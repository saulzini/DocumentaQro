<?php

namespace App\Http\Controllers;

use App\Http\Requests\Eliminar;
use App\Http\Requests\TraficosRequest;
use App\Integrante;
use App\Realizador;
use App\Trafico;
use App\Pelicula;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $now= Carbon::now()->toDateTimeString();
        $now2 =Carbon::now()->subMonth(6)->toDateTimeString();

        $Traficos= Trafico::whereBetween('updated_at',[ $now2,$now])->orderBy('titulo', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);


        return view ('Traficos/Traficos')->with([
            'Traficos' => $Traficos,
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
        //

        //

        $tipo = ['Entrante','Saliente'];
        $status = ['Buscando contacto','Por enviar correo','Mail enviado','Mail respondido',
            'Ya con permiso','Ya con material','Por pagar','Pagado','En revision','Revisado'];

        $Peliculas = Pelicula::select('id','titulo','anio')->orderBy('titulo', 'asc')->get();

        $idIntegrante = Integrante::select('id', 'nombre')->get();

        $idRealizador = Realizador::select('id', 'nombre') ->get();

        //dd($Sedes);

        return view('Traficos/TraficosAgregar')->with([

            'Tipos'=>$tipo,
            'Status'=>$status,
            'Peliculas' => $Peliculas,
            'Integrantes' => $idIntegrante,
            'Realizadores' => $idRealizador,

        ]);


    }

    public function agregarTraficos(TraficosRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $trafico= $this->adaptarTrafico($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($trafico,$request)
        {
            $trafico->save();
            $trafico->peliculas()->sync([$request->Pelicula]);

        });
        //El registro se ha agregado
        Session::flash('message', $trafico->titulo. ' ha sido agregado');
        return redirect('traficos/agregar');
    }

    public function adaptarTrafico($request)
    {

        $trafico =new Trafico();

        if(isset($request->traficosID))
            $trafico= Trafico::findOrFail($request->traficosID);
        $trafico->titulo=Pelicula::findOrFail($request->Pelicula)->titulo;
        $trafico->ubicacion=$request->Ubicacion;
        $trafico->status=$request->Status;
        $trafico->formato_material=$request->Formato;
        $trafico->costo=$request->Costo;
        $trafico->tipo=$request->Tipo;
        $trafico->id_integrante=$request->Integrante;
        $trafico->id_realizador=$request->Realizador;
        return $trafico;
    }

    public function eliminarTraficos(Eliminar $request){

        $traficos= Trafico::findOrFail($request->traficosID);
        DB::transaction(function() use ($traficos)

        {
            $traficos->delete();
        });
        //El registro se ha eliminado
        Session::flash('message', $traficos->titulo. ' ha sido eliminado');
        return redirect('traficos');
    }

    public  function buscador(Request $request){

        $Traficos= Trafico::titulo($request->get('buscador'))->orderBy('titulo', 'asc')->paginate(15);

        return view ('Traficos/Traficos')->with([
            'Traficos' => $Traficos,

        ]);
    }

    public function pagModificar($id)
    {

        $traficosItem = Trafico::find($id);
        $tipo = ['Entrante','Saliente'];
        $status = ['Buscando contacto','Por enviar correo','Mail enviado','Mail respondido',
            'Ya con permiso','Ya con material','Por pagar','Pagado','En revision','Revisado'];

        $Peliculas = Pelicula::select('id','titulo','anio')->orderBy('titulo', 'asc')->get();

        $idIntegrante = Integrante::select('id', 'nombre')->get();

        $idRealizador = Realizador::select('id', 'nombre') ->get();

        //dd($Sedes);
        return view('Traficos/TraficosModificar')->with([

            'Tipos'=>$tipo,
            'Status'=>$status,
            'Peliculas' => $Peliculas,
            'Integrantes' => $idIntegrante,
            'Realizadores' => $idRealizador,
            'traficosItem' => $traficosItem,
        ]);
    }

    public function modificarTraficos(TraficosRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $trafico= $this->adaptarTrafico($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($trafico,$request)
        {

            //Guardar Registro

            $trafico->save();
            $trafico->peliculas()->sync([$request->Pelicula]);
            $trafico->push();

        });

        //El registro se ha agregado
        Session::flash('message', $trafico->titulo. ' ha sido modificado');

        return redirect('traficos/modificar/item/'.$trafico->id);
    }

    public function seleccion($id)
    {
        //obtener funcion
        //CAMBIAR EL FIND

        $traficoItem = Trafico::find($id);
        $titulo = $traficoItem->titulo;

        $ubicacion = $traficoItem->ubicacion;
        $status = $traficoItem->status;
        $formato_material= $traficoItem->formato_material;
        $costo= $traficoItem->costo;
        $tipo= $traficoItem->tipo;
        $integrante= $traficoItem->integrantes;
        $realizador= $traficoItem->realizadores;

        return view('Traficos/TraficosConsultar')->with([

            'traficoItem'=>$traficoItem,
            'titulo' => $titulo,
            'ubicacion' => $ubicacion,
            'status' => $status,
            'formato_material' => $formato_material,
            'costo' => $costo,
            'tipo' => $tipo,
            'integrante' => $integrante,
            'realizador' => $realizador,

        ]);
    }
}
