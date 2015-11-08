<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegrantesRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Eliminar;

use App\Integrante;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IntegrantesController extends Controller
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

        $Integrantes= Integrante::whereBetween('updated_at',[ $now2,$now])->orderBy('nombre', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);


        return view ('Integrantes/Integrantes')->with([
            'Integrantes' => $Integrantes,
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
        return view('Integrantes/IntegrantesAgregar')->with([

        ]);


    }

    public function pagModificar($id)
    {
        $integrantesItem = Integrante::findOrFail($id);

        return view('Integrantes/IntegrantesModificar')->with([
            'integrantesItem'=>$integrantesItem,
        ]);
    }

    public function agregarIntegrantes(IntegrantesRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $integrante= $this->adaptarIntegrante($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($integrante,$request)
        {
            $integrante->save();
        });
        //El registro se ha agregado
        Session::flash('message', $integrante->nombre. ' ha sido agregado');
        return redirect('integrantes/agregar');
    }

    public function adaptarIntegrante($request)
    {

        $integrante =new Integrante();

        if(isset($request->integrantesID))
            $integrante= Integrante::findOrFail($request->integrantesID);
        $integrante->nombre=$request->Nombre;
        $integrante->telefono=$request->Telefono;
        $integrante->puesto=$request->Puesto;
        $integrante->email=$request->Email;
        return $integrante;
    }

    public function eliminarIntegrantes (Eliminar $request){

        $integrantes= Integrante::findOrFail($request->integrantesID);

        DB::transaction(function() use ($integrantes)
        {
            $integrantes->delete();

        });
        //El registro se ha eliminado
        Session::flash('message', $integrantes->nombre. ' ha sido eliminado');
        return redirect('integrantes');
    }

    public  function buscador(Request $request){

        $Integrantes= Integrante::nombre($request->get('buscador'))->orderBy('nombre', 'asc')->paginate(15);
        return view ('Integrantes/Integrantes')->with([
            'Integrantes' => $Integrantes,

        ]);
    }

    public function modificarIntegrantes(IntegrantesRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $integrante= $this->adaptarIntegrante($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($integrante,$request)
        {

            //Guardar Registro

            $integrante->save();
            $integrante->push();

        });

        //El registro se ha agregado
        Session::flash('message', $integrante->nombre. ' ha sido modificado');

        return redirect('integrantes/modificar/item/'.$integrante->id);
    }

    public function seleccion($id)
    {
        //obtener funcion
        //CAMBIAR EL FIND

        $integranteItem = Integrante::find($id);
        $nombre = $integranteItem->nombre;

        $telefono = $integranteItem->telefono;
        $puesto = $integranteItem->puesto;
        $email= $integranteItem->email;

        return view('Integrantes/IntegrantesConsultar')->with([

            'integranteItem'=>$integranteItem,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'puesto' => $puesto,
            'email' => $email,
        ]);
    }

    public function exportarIntegrantes($id){

        $integranteItem = Integrante::findOrFail($id);


        $view =  \View::make('Integrantes.PDFIntegrantes',compact('integranteItem'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');
    }

}
