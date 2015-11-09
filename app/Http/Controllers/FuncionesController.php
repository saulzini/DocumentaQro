<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Funcion;
use App\Funcion_Pelicula;
use App\Http\Requests\Eliminar;
use App\Integrante;
use App\Patrocinador;
use App\Pelicula;
use App\Programa;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FuncionesRequest;
use App\Sede;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class FuncionesController extends Controller
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
            if (Auth::user()->can('funciones'))
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
        $now= Carbon::now()->format('Y/m/d');
        $now2 =Carbon::now()->subMonth(6)->format('Y/m/d');
        $Funciones = Funcion::whereBetween('fecha', array($now2,$now))->orderBy('titulo', 'asc')->paginate(15);
        $this->castFunctionsDate($Funciones);
        return view ('Funciones/Funciones')->with([
            'Funciones' => $Funciones,
        ]);

    }

    public function pagAgregar()
    {
        //
        $Sedes= Sede::select('id','descripcion')->orderBy('descripcion', 'asc')->get();
        $Peliculas = Pelicula::select('id','titulo','anio')->orderBy('titulo', 'asc')->get();
        $Programas = Programa::select('id','titulo')->orderBy('titulo', 'asc')->get();
        $Festivales = Festival::select('id','titulo')->orderBy('titulo', 'asc')->get();
        $Patrocinador = Patrocinador::select('id','nombre')->orderBy('nombre', 'asc')->get();
        $Integrantes = Integrante::select('id','nombre')->orderBy('nombre', 'asc')->get();
        $status = ['Programada','Confirmada','Cancelada','Realizada'];

        //dd($Sedes);

        return view('Funciones/FuncionesAgregar')->with([

            'Sedes' => $Sedes,
            'status' =>$status,
            'Peliculas' => $Peliculas,
            'Programas' => $Programas,
            'Festivales'=> $Festivales,
            'Patrocinadores' => $Patrocinador,
            'Integrantes' =>$Integrantes,

        ]);

    }

    public function pagModificar($id)
    {
        //
        //obtener funcion

        $funcionesItem = Funcion::findOrFail($id);

        $fecha=Carbon::createFromFormat('Y-m-d H:i:s', $funcionesItem->fecha);
        $funcionesItem->fecha=$fecha->format('d-m-Y H:i');




        $funcionesPeliculas = $funcionesItem->peliculas;
        //dd($funcionesItem->tipo);


        $funcionesProgramas = $funcionesItem->programas;
        $funcionesFestivales = $funcionesItem->festivales;
        $funcionesPatrocinadores = $funcionesItem->patrocinadores;

        $Sedes= Sede::select('id','descripcion')->orderBy('descripcion', 'asc')->get();
        $status = ['Programada','Confirmada','Cancelada','Realizada'];
        $Peliculas = Pelicula::select('id','titulo','anio')->orderBy('titulo', 'asc')->get();
        $Programas = Programa::select('id','titulo')->orderBy('titulo', 'asc')->get();
        $Festivales = Festival::select('id','titulo')->orderBy('titulo', 'asc')->get();
        $Patrocinador = Patrocinador::select('id','nombre')->orderBy('nombre', 'asc')->get();
        $Integrantes = Integrante::select('id','nombre')->orderBy('nombre', 'asc')->get();


        $aux=end($funcionesPeliculas);
        $ultimaPeli=end($aux);


        $aux=end($funcionesPatrocinadores);
        $ultimoPatrocinador=end($aux);

        return view('Funciones/FuncionesModificar')->with([

            'funcionesItem'=>$funcionesItem,
            'funcionesPeliculas' => $funcionesPeliculas,
            'funcionesProgramas' => $funcionesProgramas,
            'funcionesFestivales' => $funcionesFestivales,
            'funcionesPatrocinadores' => $funcionesPatrocinadores,
            'Sedes' =>  $Sedes,
            'status'=> $status,
            'Peliculas'=> $Peliculas,
            'Programas' => $Programas,
            'Festivales'=> $Festivales,
            'Patrocinadores' => $Patrocinador,
            'Integrantes' =>$Integrantes,
            'ultimaPeli'=> $ultimaPeli,
            'ultimoPatrocinador'=> $ultimoPatrocinador,


        ]);


    }

    public function pagConsultar()
    {
        //
        return view('Funciones/FuncionesConsultar');

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

    public function agregarFunciones(FuncionesRequest $request){


        //Llamar adaptarFuncion para pasar los valores correctos
        $funciones= $this->adaptarFuncion($request);
        //guardar el arreglo de peliculas
        $peliculas = $request->Pelicula;
        //guardar el arreglo de patrocinadores
        $patrocinadores = $request->Patrocinadores;
        // dd($request);
        //transaccion
        DB::transaction(function() use ($funciones,$peliculas,$patrocinadores,$request)
        {
            if($funciones->poster==null&&!$request->hasFile('image'))
            {
                $funciones->poster="assets/img/default.png";
            }
            //Guardar Registro
            $funciones->save();
            if ( !empty($peliculas) ) {
                //Ya se tiene elid entonces se realiza el guardado en la tabla N a N
                // se usa sync para borrar todos los registros anteriores y mete todos los arreglos
                $funciones->peliculas()->sync($peliculas);
                //Guardar patrocinadores en la tabla n a n
            }
            if( !empty($patrocinadores) ) {
                $funciones->patrocinadores()->sync($patrocinadores);
            }
            if($request->hasFile('image')){
                $name = "funciones-".$funciones->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgFunciones";
                $request->file('image')->move(public_path()."/".$path,$name);
                $funciones->poster = $path."/".$name;
                $funciones->save();
            }
        });
        //El registro se ha agregado
        Session::flash('message', $funciones->titulo. ' ha sido agregado');
        return redirect('funciones/agregar');
    }

    public function eliminarFunciones(Eliminar $request){

        $funciones= Funcion::findOrFail($request->funcionId);

        DB::transaction(function() use ($funciones)
        {

            $funciones->delete();




        });


        //El registro se ha eliminado
        Session::flash('message', $funciones->titulo. ' ha sido eliminado');
        return redirect('funciones');


    }

    public  function adaptarFuncion(FuncionesRequest $request){


        $funciones=new Funcion($request->all());
        $funciones->titulo= $request->Titulo;
        $funciones->id_sede= $request->Sede;
        $funciones->asistencia= $request->Asistencia;
        $funciones->status= $request->Status;
        $funciones->programadopor= $request->Programado;



        $date = str_replace('/', '-', $request->Fecha);

        $funciones->fecha=Carbon::createFromFormat('d-m-Y H:i', $date)->toDateTimeString();


        $funciones->id_programa= $request->Programa;
        $funciones->id_festival= $request->Festival;



        return $funciones;
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

    public  function buscador(Request $request){
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);

            $Funciones = Funcion::titulo($request->get('buscador'))->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->paginate(15);
        }
        else {
            $Funciones = Funcion::titulo($request->get('buscador'))->orderBy('titulo', 'asc')->paginate(15);

        }

        $this->castFunctionsDate($Funciones);

        return view ('Funciones/Funciones')->with([
            'Funciones' => $Funciones,

        ]);
    }



    public  function adaptarFuncionModificar(FuncionesRequest $request){


        $funciones= Funcion::findOrFail($request->funcionId);
        //$funciones->id = $request->funcionId;
        $funciones->titulo= $request->Titulo;
        $funciones->id_sede= $request->Sede;
        $funciones->asistencia= $request->Asistencia;
        $funciones->status= $request->Status;
        $funciones->programadopor= $request->Programado;


        $date = str_replace('/', '-', $request->Fecha);

        $funciones->fecha=Carbon::createFromFormat('d-m-Y H:i', $date)->toDateTimeString();


        $funciones->id_programa= $request->Programa;
        $funciones->id_festival= $request->Festival;



        return $funciones;
    }


    public function modificarFunciones(FuncionesRequest $request){

        //Llamar adaptarFuncion para pasar los valores correctos
        $funciones= $this->adaptarFuncionModificar($request);

        //guardar el arreglo de peliculas
        $peliculas = $request->Pelicula;

        //guardar el arreglo de patrocinadores
        $patrocinadores = $request->Patrocinadores;

        //dd($request);
        //transaccion
        DB::transaction(function() use ($funciones,$peliculas,$patrocinadores,$request)
        {

            //Guardar Registro
            $funciones->save();


            if ( !empty($peliculas) ) {
                //Ya se tiene elid entonces se realiza el guardado en la tabla N a N
                // se usa sync para borrar todos los registros anteriores y mete todos los arreglos
                $funciones->peliculas()->sync($peliculas);
                //Guardar patrocinadores en la tabla n a n
            }
            if( !empty($patrocinadores) ) {
                $funciones->patrocinadores()->sync($patrocinadores);
            }
            else{
                $funciones->patrocinadores()->delete();
            }

            if($request->hasFile('image')){
                $name = "funciones-".$funciones->id.".".$request->file('image')->getClientOriginalExtension();

                $path = "assets/imgFunciones";

                $request->file('image')->move(public_path()."/".$path,$name);

                $funciones->poster = $path."/".$name;

                $funciones->save();

            }
            $funciones->push();

        });

        //El registro se ha agregado
        Session::flash('message', $funciones->titulo. ' ha sido modificado');

        return redirect('funciones/modificar/item/'.$funciones->id);

    }


    public function seleccion($id)
    {
       //obtener funcion


        $funcionesItem = Funcion::findOrFail($id);

        $funcionesPeliculas = $funcionesItem->peliculas;

        $funcionesProgramas = $funcionesItem->programas;
        $funcionesFestivales = $funcionesItem->festivales;
        $funcionesPatrocinadores = $funcionesItem->patrocinadores;

        if($funcionesPatrocinadores->isEmpty())
            $funcionesPatrocinadores = null;


        return view('Funciones/FuncionesConsultar')->with([

            'funcionesItem'=>$funcionesItem,
            'funcionesPeliculas' => $funcionesPeliculas,
            'funcionesProgramas' => $funcionesProgramas,
            'funcionesFestivales' => $funcionesFestivales,
            'funcionesPatrocinadores' => $funcionesPatrocinadores,


        ]);
    }

    public function exportarFunciones($id){

        $funcionesItem = Funcion::findOrFail($id);
        $peliculas = $funcionesItem->peliculas;
        $programas = $funcionesItem->programas;
        $festivales = $funcionesItem->festivales;
        $patrocinadores = $funcionesItem->patrocinadores;

        if($peliculas->isEmpty())
            $peliculas=null;

        if($patrocinadores->isEmpty())
            $patrocinadores=null;

        $view =  \View::make('Funciones.PDFFunciones',compact('funcionesItem', 'peliculas','programas','festivales','patrocinadores'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');
    }
}
