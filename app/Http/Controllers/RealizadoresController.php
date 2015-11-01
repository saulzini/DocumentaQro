<?php

namespace App\Http\Controllers;

use App\Http\Requests\Eliminar;
use App\Http\Requests\RealizadoresRequest;
use App\Realizador;
use App\Trafico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RealizadoresController extends Controller
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

        $Realizadores= Realizador::whereBetween('updated_at',[ $now2,$now])->orderBy('nombre', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);



        return view ('Realizadores/Realizadores')->with([
            'Realizadores' => $Realizadores,
        ]);
    }

    public function eliminarRealizadores(Eliminar $request){

        $realizador= Realizador::findOrFail($request->realizadoresID);


        DB::transaction(function() use ($realizador,$request)
        {
            Trafico::where('id_realizador','=',$request->realizadoresID)->update(['id_realizador'=>'']);
            $realizador->delete();


        });
        //El registro se ha eliminado
        Session::flash('message', $realizador->nombre. ' ha sido eliminado');
        return redirect('realizadores');
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
    public  function buscador(Request $request){

        $Realizadores= Realizador::nombre($request->get('buscador'))->orderBy('nombre', 'asc')->paginate(15);

        return view ('Realizadores/Realizadores')->with([
            'Realizadores' => $Realizadores,

        ]);
    }

    public function pagAgregar()
    {
        //

        //
        return view('Realizadores/RealizadoresAgregar')->with([

        ]);


    }

    public function agregarRealizadores(RealizadoresRequest $request){


        //Llamar adaptarPelicula para pasar los valores correctos
        $realizador= $this->adaptarRealizador($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($realizador)
        {
            $realizador->save();
            //$trafico->peliculas()->sync($request->Pelicula);

        });
        //El registro se ha agregado
        Session::flash('message', $realizador->nombre. ' ha sido agregado');
        return redirect('realizadores/agregar');

    }

    public function adaptarRealizador($request)
    {

        $realizador = new Realizador();

        if(isset($request->realizadorID))
            $realizador= Realizador::findOrFail($request->realizadorID);



        $realizador ->nombre=$request->Nombre;
        $realizador ->vinculo=$request->Vinculo;
        $realizador ->email=$request->Email;
        $realizador ->telefono=$request->Telefono;

        return $realizador;

    }

    public function seleccion($id)
    {
        //obtener funcion


        $Realizadores = Realizador::findOrFail($id);



        return view('Realizadores/RealizadoresConsultar')->with([

            'realizadoresItem'=>$Realizadores,
        ]);
    }

    public function pagModificar($id)
    {

        $realizadoresItem = Realizador::findOrFail($id);

        return view('Realizadores/RealizadoresModificar')->with([

            'realizadoresItem'=>$realizadoresItem ,


        ]);


    }

    public function modificarRealizadores(RealizadoresRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $realizador= $this->adaptarRealizador($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($realizador,$request)
        {

            //Guardar Registro
            $realizador->save();

        });

        //El registro se ha agregado
        Session::flash('message', $realizador->nombre. ' ha sido modificado');

        return redirect('realizadores/modificar/item/'.$realizador->id);
    }

    public function exportarRealizadores($id){
        $realizadoresItem = Realizador::findOrFail($id);

        //dd($patrocinadorItem->paquetes);
        $view =  \View::make('Realizadores.PDFRealizadores',compact('realizadoresItem'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');


    }

}
