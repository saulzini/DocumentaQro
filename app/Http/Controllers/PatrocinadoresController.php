<?php

namespace App\Http\Controllers;

use App\Http\Requests\Eliminar;
use App\Http\Requests\PatrocinadoresRequest;
use App\Paquete;
use App\Patrocinador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PatrocinadoresController extends Controller
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

        $Patrocinadores= Patrocinador::whereBetween('updated_at',[ $now2,$now])->orderBy('nombre', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);



        return view ('Patrocinadores/Patrocinadores')->with([
            'Patrocinadores' => $Patrocinadores,
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

    public  function buscador(Request $request){

        $Patrocinadores= Patrocinador::nombre($request->get('buscador'))->orderBy('nombre', 'asc')->paginate(15);

        return view ('Patrocinadores/Patrocinadores')->with([
            'Patrocinadores' => $Patrocinadores,

        ]);
    }

    public function pagAgregar()
    {
        //

        //
        $tipos = ['Apoyo','Paquete'];
        $Paquetes= Paquete::get();



        return view('Patrocinadores/PatrocinadoresAgregar')->with([

            'Tipos'=>$tipos,
            'Paquetes' => $Paquetes
        ]);


    }

    public function agregarPatrocinadores(PatrocinadoresRequest $request){


        //Llamar adaptarPelicula para pasar los valores correctos
        $patrocinador= $this->adaptarPatrocinador($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($patrocinador)
        {
            $patrocinador->save();
            //$trafico->peliculas()->sync($request->Pelicula);

        });
        //El registro se ha agregado
        Session::flash('message', $patrocinador->nombre. ' ha sido agregado');
        return redirect('patrocinadores/agregar');


    }

    public function adaptarPatrocinador($request)
    {

        //dd($request);

        $patrocinador = new Patrocinador();

        if(isset($request->patrocinadorID))
            $patrocinador= Patrocinador::findOrFail($request->patrocinadorID);

        $patrocinador ->nombre=$request->Nombre;
        $patrocinador ->puesto=$request->Puesto;
        $patrocinador ->email=$request->Email;
        $patrocinador ->telefono=$request->Telefono;
        $patrocinador ->tipo=$request->Tipo;
        $patrocinador ->id_paquete=$request->Paquete;

        return $patrocinador;

    }
    public function pagModificar($id)
    {

        $patrocinadoresItem = Patrocinador::findOrFail($id);
        $tipos = ['Apoyo','Paquete'];
        $paqueteSeleccion=$patrocinadoresItem->paquetes->id;
        $Paquetes= Paquete::get();
      //  dd($Paquetes);

   // dd($patrocinadoresItem->paquetes->descripcion);

        return view('Patrocinadores/PatrocinadoresModificar')->with([

            'patrocinadoresItem'=>$patrocinadoresItem ,
            'Tipos' => $tipos,
            'Paquetes' => $Paquetes,
            'paqueteSeleccion' =>$paqueteSeleccion,




        ]);


    }
    public function seleccion($id)
    {
        //obtener funcion


        $Patrocinadores = Patrocinador::findOrFail($id);



        return view('Patrocinadores/PatrocinadoresConsultar')->with([

            'patrocinadoresItem'=>$Patrocinadores,
        ]);
    }


    public function eliminarPatrocinadores(Eliminar $request){

        $patrocinador= Patrocinador::findOrFail($request->patrocinadoresID);


        DB::transaction(function() use ($patrocinador,$request)
        {

            $patrocinador->delete();


        });
        //El registro se ha eliminado
        Session::flash('message', $patrocinador->nombre. ' ha sido eliminado');
        return redirect('patrocinadores');
    }

    public function modificarPatrocinadores(PatrocinadoresRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $patrocinador= $this->adaptarPatrocinador($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($patrocinador,$request)
        {

            //Guardar Registro
            $patrocinador->save();

        });

        //El registro se ha agregado
        Session::flash('message', $patrocinador->nombre. ' ha sido modificado');

        return redirect('patrocinadores/modificar/item/'.$patrocinador->id);
    }

}
