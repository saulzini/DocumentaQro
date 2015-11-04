<?php

namespace App\Http\Controllers;

use App\Caracteristica;
use App\Festival;
use App\Funcion;
use App\Funcion_Pelicula;
use App\Http\Requests\Eliminar;
use App\Http\Requests\PaquetesRequest;
use App\Integrante;
use App\Paquete;
use App\Patrocinador;
use App\Pelicula;
use App\Programa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FuncionesRequest;
use App\Sede;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PaquetesController extends Controller
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

        $Paquetes= Paquete::whereBetween('updated_at',[ $now2,$now])->orderBy('descripcion', 'asc')->paginate(15);

        return view ('Paquetes/Paquetes')->with([
            'Paquetes' => $Paquetes,
        ]);
    }

    public function eliminarPaquetes(Eliminar $request){
        $Paquetes= Paquete::findOrFail($request->paqueteId);
        $PaquetesCaracteristicas = $Paquetes->caracteristicas;

        DB::transaction(function() use ($Paquetes)
        {
            $Paquetes->caracteristicas()->sync([]);
            $Paquetes->delete();
        });

        Session::flash('message', $Paquetes->descripcion. ' ha sido eliminado');
        return redirect('paquetes');
    }


    public  function buscador(Request $request){
        $Paquetes = Paquete::descripcion($request->get('buscador'))->orderBy('descripcion', 'asc')->paginate(15);

        return view ('Paquetes/Paquetes')->with([
            'Paquetes' => $Paquetes,
        ]);
    }

    public function pagAgregar()
    {
        $Paquetes = Paquete::select('descripcion','costo')->orderBy('descripcion','asc')->get();
        $Caracteristicas = Caracteristica::select('id','nombre')->orderBy('nombre','asc')->get();
        return view('Paquetes/PaquetesAgregar')->with([

            'Paquetes' => $Paquetes,
            'Caracteristicas'=> $Caracteristicas
        ]);
    }


    public function agregarPaquetes(PaquetesRequest $request){
        $Paquetes = $this->adaptarPaquete($request);
        $Caracteristicas = $request->Caracteristicas;

        DB::transaction(function() use ($Paquetes, $Caracteristicas, $request)
        {

            $Paquetes->save();

            if( !empty($Caracteristicas) ) {

                $Paquetes->caracteristicas()->sync($Caracteristicas);
            }

        });
        Session::flash('message', $Paquetes->descripcion. ' ha sido agregado');
        return redirect('paquetes/agregar');
    }

    public  function adaptarPaquete(PaquetesRequest $request){
        $Paquetes = new Paquete();
        $Paquetes->descripcion = $request->Nombre;
        $Paquetes->costo = $request->Costo;
        return $Paquetes;
    }

    public function seleccion($id)
    {
        $PaqueteItem = Paquete::findOrFail($id);
        $PaquetesCaracteristicas = $PaqueteItem->caracteristicas;
        return view('Paquetes/PaquetesConsultar')->with([
            'PaqueteItem'=>$PaqueteItem,
            'PaquetesCaracteristicas'=>$PaquetesCaracteristicas
        ]);
    }

    public function pagModificar($id)
    {
        $PaquetesItem = Paquete::findOrFail($id);
        $PaquetesCaracteristicas = $PaquetesItem->Caracteristicas;
        $Caracteristicas = Caracteristica::select('id','nombre')->orderBy('nombre', 'asc')->get();

        $aux = end($PaquetesCaracteristicas);
        $ultimaCaracteristica = end($aux);

        return view('Paquetes/PaquetesModificar')->with([

            'PaquetesItem'=>$PaquetesItem,
            'PaquetesCaracteristicas'=>$PaquetesCaracteristicas,
            'Caracteristicas'=>$Caracteristicas,
            'ultimaCaracteristica'=>$ultimaCaracteristica

        ]);
    }

    public function pagConsultar()
    {
       return view('Paquetes/PaquetesConsultar');
    }


    public  function adaptarPaqueteModificar(PaquetesRequest $request){
        $Paquetes = Paquete::findOrFail($request->paquetes_id);
        $Paquetes->descripcion = $request->Nombre;
        $Paquetes->costo = $request->Costo;
        return $Paquetes;
    }


    public function modificarPaquetes(PaquetesRequest $request){
        $Paquetes= $this->adaptarPaqueteModificar($request);
        $Caracteristicas = $request->Caracteristicas;

        DB::transaction(function() use ($Paquetes,$Caracteristicas,$request)
        {
            $Paquetes->save();

            if ( !empty($Caracteristicas) ) {
                $Paquetes->caracteristicas()->sync($Caracteristicas);
            }else{
                $Paquetes->caracteristicas()->sync([]);
            }
            $Paquetes->push();
        });

        //El registro se ha agregado
        Session::flash('message', $Paquetes->descripcion. ' ha sido modificado');

        return redirect('paquetes/modificar/item/'.$Paquetes->id);
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

}
