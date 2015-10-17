<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Funcion;
use App\Http\Requests\Eliminar;
use App\Http\Requests\FestivalesRequest;
use App\Patrocinador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FestivalesController extends Controller
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

        $Festivales= Festival::whereBetween('updated_at',[ $now2,$now])->orderBy('titulo', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
        // dd($Funciones);


        return view ('Festivales/Festivales')->with([
            'Festivales' => $Festivales,
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
        $Patrocinadores = Patrocinador::select('id','nombre')->orderBy('nombre', 'asc')->get();


        return view('Festivales/FestivalesAgregar')->with([
            'Patrocinadores'=>$Patrocinadores,
        ]);


    }

    public function adaptarFestival($request)
    {

        $festival=new Festival();

        if(isset($request->festivalId))
            $festival= Festival::findOrFail($request->festivalId);

        $festival->titulo=$request->Titulo;

        return $festival;
    }

    public function agregarFestivales(FestivalesRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $festival= $this->adaptarFestival($request);
        //guardar el arreglo de peliculas

        //transaccion
        $patrocinadores = $request->Patrocinadores;
        DB::transaction(function() use ($festival,$request,$patrocinadores)
        {
            if($festival->poster==null&&!$request->hasFile('image'))
            {
                $festival->poster="assets/img/default.png";
            }
            //Guardar Registro
            $festival->save();

            if($request->hasFile('image')){
                $name = "festivales-".$festival->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgFestivales";
                $request->file('image')->move(public_path()."/".$path,$name);
                $festival->poster = $path."/".$name;
                $festival->save();
            }
            if( !empty($patrocinadores) ) {
                $festival->patrocinadores()->sync($patrocinadores);
            }


        });
        //El registro se ha agregado
        Session::flash('message', $festival->titulo. ' ha sido agregado');
        return redirect('festivales/agregar');
    }


    public function pagModificar($id)
    {

        $festivalesItem = Festival::findorFail($id);
        $Patrocinadores = Patrocinador::select('id','nombre')->orderBy('nombre', 'asc')->get();
        $festivalesPatrocinadores = $festivalesItem->patrocinadores;
        $aux=end($festivalesPatrocinadores);
        $ultimoPatrocinador=end($aux);
        if($festivalesPatrocinadores->isEmpty())
            $festivalesPatrocinadores=null;
        return view('Festivales/festivalesModificar')->with([

            'festivalesItem'=>$festivalesItem,
            'Patrocinadores'=>$Patrocinadores,
            'ultimoPatrocinador'=>$ultimoPatrocinador,
            'festivalesPatrocinadores'=>$festivalesPatrocinadores,

        ]);


    }

    public function modificarFestivales(FestivalesRequest $request)
    {

        //Llamar adaptarPelicula para pasar los valores correctos
        $festival= $this->adaptarFestival($request);
        //guardar el arreglo de peliculas
        $patrocinadores = $request->Patrocinadores;
        //transaccion
        DB::transaction(function() use ($festival,$request,$patrocinadores)
        {
            if($festival->poster==null&&!$request->hasFile('image'))
            {
                $festival->poster="assets/img/default.png";
            }
            //Guardar Registro
            $festival->save();

            if($request->hasFile('image')){
                $name = "festivales-".$festival->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgFestivales";
                $request->file('image')->move(public_path()."/".$path,$name);
                $festival->poster = $path."/".$name;
                $festival->save();
            }
            if( !empty($patrocinadores) ) {
                $festival->patrocinadores()->sync($patrocinadores);
            }
            else{

                $festival->patrocinadores()->delete();
            }
           $festival->push();
        });
        //El registro se ha agregado
        Session::flash('message', $festival->titulo. ' ha sido modificado');
        return redirect('festivales/modificar/item/'.$festival->id);
    }

    public function eliminarFestivales(Eliminar $request){

        $festival= Festival::findOrFail($request->festivalId);

        DB::transaction(function() use ($festival)
        {
            $festival->delete();
            Funcion::where('id_festival',$festival->id)->update(['id_festival'=>""]);

        });
        //El registro se ha eliminado

        Session::flash('message', $festival->titulo. ' ha sido eliminado');
        return redirect('festivales');
    }

    public  function buscador(Request $request){

        $Festivales= Festival::titulo($request->get('buscador'))->orderBy('titulo', 'asc')->paginate(15);

        return view ('Festivales/Festivales')->with([
            'Festivales' => $Festivales,

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


        $festivalItem = Festival::findOrFail($id);

        $funciones=$festivalItem->funciones;
        $this->castFunctionsDate($funciones);
        $programas=$festivalItem->programas;
        $patrocinadores=$festivalItem->patrocinadores;

        if($funciones->isEmpty())
            $funciones=null;

        if($programas->isEmpty())
            $programas=null;
        if($patrocinadores->isEmpty())
            $patrocinadores=null;




        return view('Festivales/FestivalesConsultar')->with([

            'festivalItem'=>$festivalItem,
            'funciones'=>$funciones,
            'programas'=>$programas,
            'patrocinadores'=>$patrocinadores,


        ]);
    }


}
