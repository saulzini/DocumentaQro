<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Pelicula;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReportesController extends Controller
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
            if (Auth::user()->can('reportes'))
            {


            }
            else {
                //Si no tiene el permiso entonces cierra la sesion y manda un error 404
                //Auth::logout();
                abort('404');

            }
        }


    }


    public function exportExcel($reporte)
    {
        //
    }

    public function index()
    {
        return view('Reportes/ReporteFuncion')->with([
        ]);
    }

    public function indexPais()
    {
        return view('Reportes/ReportePais')->with([
        ]);
    }

    public function indexSede()
    {
        return view('Reportes/ReporteSede')->with([
        ]);
    }

    public function indexPrograma()
    {
        return view('Reportes/ReportePrograma')->with([
        ]);
    }
    public function indexFestival()
    {
        return view('Reportes/ReporteFestival')->with([
        ]);
    }

    public function consultarFunciones(Request $request)
    {
       // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            $Funciones = Funcion::where('status','Realizada')->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
            $resultado=[];
            $i=0;
            $resultado[0]['Funcion']="";
            $resultado[0]['Asistencia']=0;
            $resultado[0]['Duracion']=0;
            $resultado[0]["      "]="";
            $resultado[0]['Peliculas']=0;
            $resultado[0]['Largometrajes']=0;
            $resultado[0]['Cortometrajes']=0;
            $resultado[0]['Funciones']=0;
            $resultado[0]['Total espectadores']=0;
            $resultado[0]['Total minutos']=0;
            $resultado[0]['Fecha inicial']=$request->FechaInicio;
            $resultado[0]['Fecha final']=$request->FechaFinal;


            foreach ($Funciones as $funcion)
            {
                $resultado[0]['Funciones']++;
                $resultado[$i]['Funcion']=$funcion->titulo;
                $resultado[$i]['Asistencia']=$funcion->asistencia;
                $resultado[0]['Total espectadores']+=$funcion->asistencia;
                $resultado[$i]['Duracion']=0;

                $peliculas=$funcion->peliculas;
               foreach ($peliculas as $pelicula)
               {
                   $resultado[0]['Peliculas']++;
                   if($pelicula->tipo=="Cortometraje")
                       $resultado[0]['Cortometrajes']++;
                   if($pelicula->tipo=="Largometraje")
                       $resultado[0]['Largometrajes']++;

                   $resultado[$i]['Duracion']=$resultado[$i]['Duracion']+$pelicula->duracion;
               }
                $resultado[0]['Total minutos']+= $resultado[$i]['Duracion'];
                $i++;


            }

            $request->session()->put('funciones',$resultado);
            //dd($request->session()->get('funciones'));


        }
        if(!isset($resultado[0]['Funciones']))
            $resultado[0]['Funciones']=0;
        if($resultado[0]['Funciones']>0) {
            return view('Reportes/ReporteFuncion')->with([
                'resultados'=>$resultado,
                'FechaIni'=>$request->FechaInicio,
                'FechaFin'=>$request->FechaFinal
            ]);
        }
        else
        {
            Session::flash('error', 'No se encontraron resultados');
            return redirect('reportes/funciones');
        }


    }

    public function consultarPaises(Request $request)
    {
        // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();

            $Funciones = Funcion::where('status','Realizada')->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
            $resultado=[];
            $i=0;
            $resultado[0]['Pais']="";
            $resultado[0]['Peliculas']="";
            $resultado[0]['Asistencia']=0;
            $resultado[0]['Duracion']=0;
            $resultado[0]["      "]="";
            $resultado[0]['Total Peliculas']=0;
            $resultado[0]['Mexicanas']=0;
            $resultado[0]['Extranjeras']=0;
            $resultado[0]['Paises']=0;
            $resultado[0]['Total espectadores']=0;
            $resultado[0]['Total minutos']=0;
            $resultado[0]['Fecha inicial']=$request->FechaInicio;
            $resultado[0]['Fecha final']=$request->FechaFinal;
            $paises=array();
            $aux=array();
            $j=0;


            foreach ($Funciones as $funcion)
            {

                $resultado[0]['Total espectadores']+=$funcion->asistencia;


                $peliculas=$funcion->peliculas;
                $flagAsistencia=false;
                foreach ($peliculas as $pelicula)
                {
                    $resultado[0]['Total Peliculas']++;

                    if($pelicula->pais=='México')
                    {
                        $resultado[0]['Mexicanas']++;
                    }
                    else
                        $resultado[0]['Extranjeras']++;

                    $resultado[0]['Total minutos']+=$pelicula->duracion;


                    if (isset($aux[$pelicula->pais.'peliculas']))
                        $aux[$pelicula->pais.'peliculas']++;
                    else {
                        $aux[$pelicula->pais.'peliculas']=1;
                    }
                    if (isset($aux[$pelicula->pais.'duracion']))
                        $aux[$pelicula->pais.'duracion']+=$pelicula->duracion;
                    else {
                        $aux[$pelicula->pais.'duracion']=$pelicula->duracion;
                    }


                        if (isset($aux[$pelicula->pais.'asistencia']))
                            $aux[$pelicula->pais.'asistencia']+=$funcion->asistencia;
                        else {
                            $aux[$pelicula->pais.'asistencia']=$funcion->asistencia;
                        }


                    $paises[$j]=$pelicula->pais;

                    $j++;
                }

                $i++;


            }

            $resultadoPaises = array_unique($paises);
            $resultado[0]['Paises']=count($resultadoPaises);
            $i=0;
            foreach($resultadoPaises as $pais)
            {
                $resultado[$i]['Pais']=$pais;
                if (isset($aux[$pais.'peliculas'])){
                    $resultado[$i]['Peliculas']=$aux[$pais.'peliculas'];
                }
                else
                    $resultado[$i]['Peliculas']=0;

                if (isset($aux[$pais.'asistencia'])){
                    $resultado[$i]['Asistencia']=$aux[$pais.'asistencia'];
                }
                else
                    $resultado[$i]['Asistencia']=0;

                if (isset($aux[$pais.'duracion'])){
                    $resultado[$i]['Duracion']=$aux[$pais.'duracion'];
                }
                else
                    $resultado[$i]['Duracion']=0;
                $i++;

            }

            $request->session()->put('paises',$resultado);
            //dd($request->session()->get('funciones'));


        }
        if(!isset($resultado[0]['Paises']))
            $resultado[0]['Paises']=0;
        if($resultado[0]['Paises']>0) {
            return view('Reportes/ReportePais')->with([
                'resultados'=>$resultado,
                'FechaIni'=>$request->FechaInicio,
                'FechaFin'=>$request->FechaFinal
            ]);
        }
        else
        {
            Session::flash('error', 'No se encontraron resultados');
            return redirect('reportes/paises');
        }


    }


    public function consultarSedes(Request $request)
    {
        // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();

            $Funciones = Funcion::where('status','Realizada')->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
            $resultado=[];
            $i=0;
            $resultado[0]['Sede']="";
            $resultado[0]['Peliculas']="";
            $resultado[0]['Asistencia']=0;
            $resultado[0]['Duracion']=0;
            $resultado[0]["      "]="";
            $resultado[0]['Total Peliculas']=0;
            $resultado[0]['Largometrajes']=0;
            $resultado[0]['Cortometrajes']=0;
            $resultado[0]['Sedes']=0;
            $resultado[0]['Total espectadores']=0;
            $resultado[0]['Total minutos']=0;
            $resultado[0]['Fecha inicial']=$request->FechaInicio;
            $resultado[0]['Fecha final']=$request->FechaFinal;
            $sedes=array();
            $aux=array();
            $j=0;


            foreach ($Funciones as $funcion)
            {

                $resultado[0]['Total espectadores']+=$funcion->asistencia;


                $peliculas=$funcion->peliculas;
                $sede=$funcion->sedes->descripcion;

                if (isset($aux[$sede.'asistencia']))
                    $aux[$sede.'asistencia']+=$funcion->asistencia;
                else {
                    $aux[$sede.'asistencia']=$funcion->asistencia;
                }
                foreach ($peliculas as $pelicula)
                {

                    $resultado[0]['Total Peliculas']++;

                    if($pelicula->tipo=='Largometraje')
                    {
                        $resultado[0]['Largometrajes']++;
                    }
                    if($pelicula->tipo=='Cortometraje')
                    {
                        $resultado[0]['Cortometrajes']++;
                    }

                    $resultado[0]['Total minutos']+=$pelicula->duracion;


                    if (isset($aux[$sede.'peliculas']))
                        $aux[$sede.'peliculas']++;
                    else {
                        $aux[$sede.'peliculas']=1;
                    }
                    if (isset($aux[$sede.'duracion']))
                        $aux[$sede.'duracion']+=$pelicula->duracion;
                    else {
                        $aux[$sede.'duracion']=$pelicula->duracion;
                    }





                    $sedes[$j]=$sede;

                    $j++;
                }

                $i++;


            }


            $resultadoSedes= array_unique($sedes);
            $resultado[0]['Sedes']=count($resultadoSedes);
            $i=0;

            foreach($resultadoSedes as $sede)
            {
                $resultado[$i]['Sede']=$sede;
                if (isset($aux[$sede.'peliculas'])){
                    $resultado[$i]['Peliculas']=$aux[$sede.'peliculas'];
                }
                else
                    $resultado[$i]['Peliculas']=0;

                if (isset($aux[$sede.'asistencia'])){
                    $resultado[$i]['Asistencia']=$aux[$sede.'asistencia'];
                }
                else
                    $resultado[$i]['Asistencia']=0;

                if (isset($aux[$sede.'duracion'])){
                    $resultado[$i]['Duracion']=$aux[$sede.'duracion'];
                }
                else
                    $resultado[$i]['Duracion']=0;
                $i++;

            }
           // dd($resultado,$sedes,$resultadoSedes);
            $request->session()->put('sedes',$resultado);
            //dd($request->session()->get('funciones'));


        }
        if(!isset($resultado[0]['Sedes']))
            $resultado[0]['Sedes']=0;

        if($resultado[0]['Sedes']>0) {
            return view('Reportes/ReporteSede')->with([
                'resultados'=>$resultado,
                'FechaIni'=>$request->FechaInicio,
                'FechaFin'=>$request->FechaFinal
            ]);
        }
        else
        {
            Session::flash('error', 'No se encontraron resultados');
            return redirect('reportes/sedes');
        }


    }


    public function consultarProgramas(Request $request)
    {
        // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();

            $Funciones = Funcion::where('status','Realizada')->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
            $resultado=[];
            $i=0;
            $resultado[0]['Programa']="";
            $resultado[0]['Peliculas']="";
            $resultado[0]['Asistencia']=0;
            $resultado[0]['Duracion']=0;
            $resultado[0]["      "]="";
            $resultado[0]['Total Peliculas']=0;
            $resultado[0]['Largometrajes']=0;
            $resultado[0]['Cortometrajes']=0;
            $resultado[0]['Programas']=0;
            $resultado[0]['Total espectadores']=0;
            $resultado[0]['Total minutos']=0;
            $resultado[0]['Fecha inicial']=$request->FechaInicio;
            $resultado[0]['Fecha final']=$request->FechaFinal;
            $programas=array();
            $aux=array();
            $j=0;


            foreach ($Funciones as $funcion)
            {

                $resultado[0]['Total espectadores']+=$funcion->asistencia;


                $peliculas=$funcion->peliculas;
                $programa=$funcion->programas->titulo;

                if (isset($aux[$programa.'asistencia']))
                    $aux[$programa.'asistencia']+=$funcion->asistencia;
                else {
                    $aux[$programa.'asistencia']=$funcion->asistencia;
                }
                foreach ($peliculas as $pelicula)
                {

                    $resultado[0]['Total Peliculas']++;

                    if($pelicula->tipo=='Largometraje')
                    {
                        $resultado[0]['Largometrajes']++;
                    }
                    if($pelicula->tipo=='Cortometraje')
                    {
                        $resultado[0]['Cortometrajes']++;
                    }

                    $resultado[0]['Total minutos']+=$pelicula->duracion;


                    if (isset($aux[$programa.'peliculas']))
                        $aux[$programa.'peliculas']++;
                    else {
                        $aux[$programa.'peliculas']=1;
                    }
                    if (isset($aux[$programa.'duracion']))
                        $aux[$programa.'duracion']+=$pelicula->duracion;
                    else {
                        $aux[$programa.'duracion']=$pelicula->duracion;
                    }





                    $programas[$j]=$programa;

                    $j++;
                }

                $i++;


            }


            $resultadoProgramas= array_unique($programas);
            $resultado[0]['Programas']=count($resultadoProgramas);
            $i=0;

            foreach($resultadoProgramas as $programa)
            {
                $resultado[$i]['Programa']=$programa;
                if (isset($aux[$programa.'peliculas'])){
                    $resultado[$i]['Peliculas']=$aux[$programa.'peliculas'];
                }
                else
                    $resultado[$i]['Peliculas']=0;

                if (isset($aux[$programa.'asistencia'])){
                    $resultado[$i]['Asistencia']=$aux[$programa.'asistencia'];
                }
                else
                    $resultado[$i]['Asistencia']=0;

                if (isset($aux[$programa.'duracion'])){
                    $resultado[$i]['Duracion']=$aux[$programa.'duracion'];
                }
                else
                    $resultado[$i]['Duracion']=0;
                $i++;

            }
            //dd($resultado,$aux,$programas,$resultadoProgramas);
            $request->session()->put('programas',$resultado);



        }
        if(!isset($resultado[0]['Programas']))
            $resultado[0]['Programas']=0;
        if($resultado[0]['Programas']>0) {
            return view('Reportes/ReportePrograma')->with([
                'resultados'=>$resultado,
                'FechaIni'=>$request->FechaInicio,
                'FechaFin'=>$request->FechaFinal
            ]);
        }
        else
        {
            Session::flash('error', 'No se encontraron resultados');
            return redirect('reportes/programas');
        }


    }


    public function consultarFestivales(Request $request)
    {
        // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();

            $Funciones = Funcion::where('status','Realizada')->whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
            $resultado=[];
            $i=0;
            $resultado[0]['Festival']="";
            $resultado[0]['Peliculas']="";
            $resultado[0]['Asistencia']=0;
            $resultado[0]['Duracion']=0;
            $resultado[0]["      "]="";
            $resultado[0]['Total Peliculas']=0;
            $resultado[0]['Largometrajes']=0;
            $resultado[0]['Cortometrajes']=0;
            $resultado[0]['Festivales']=0;
            $resultado[0]['Total espectadores']=0;
            $resultado[0]['Total minutos']=0;
            $resultado[0]['Fecha inicial']=$request->FechaInicio;
            $resultado[0]['Fecha final']=$request->FechaFinal;
            $festivales=array();
            $aux=array();
            $j=0;


            foreach ($Funciones as $funcion)
            {

                $resultado[0]['Total espectadores']+=$funcion->asistencia;


                $peliculas=$funcion->peliculas;
                $festival=$funcion->festivales->titulo;

                if (isset($aux[$festival.'asistencia']))
                    $aux[$festival.'asistencia']+=$funcion->asistencia;
                else {
                    $aux[$festival.'asistencia']=$funcion->asistencia;
                }
                foreach ($peliculas as $pelicula)
                {

                    $resultado[0]['Total Peliculas']++;

                    if($pelicula->tipo=='Largometraje')
                    {
                        $resultado[0]['Largometrajes']++;
                    }
                    if($pelicula->tipo=='Cortometraje')
                    {
                        $resultado[0]['Cortometrajes']++;
                    }

                    $resultado[0]['Total minutos']+=$pelicula->duracion;


                    if (isset($aux[$festival.'peliculas']))
                        $aux[$festival.'peliculas']++;
                    else {
                        $aux[$festival.'peliculas']=1;
                    }
                    if (isset($aux[$festival.'duracion']))
                        $aux[$festival.'duracion']+=$pelicula->duracion;
                    else {
                        $aux[$festival.'duracion']=$pelicula->duracion;
                    }





                    $festivales[$j]=$festival;

                    $j++;
                }

                $i++;


            }


            $resultadoFestivales= array_unique($festivales);
            $resultado[0]['Festivales']=count($resultadoFestivales);
            $i=0;

            foreach($resultadoFestivales as $festival)
            {
                $resultado[$i]['Festival']=$festival;
                if (isset($aux[$festival.'peliculas'])){
                    $resultado[$i]['Peliculas']=$aux[$festival.'peliculas'];
                }
                else
                    $resultado[$i]['Peliculas']=0;

                if (isset($aux[$festival.'asistencia'])){
                    $resultado[$i]['Asistencia']=$aux[$festival.'asistencia'];
                }
                else
                    $resultado[$i]['Asistencia']=0;

                if (isset($aux[$festival.'duracion'])){
                    $resultado[$i]['Duracion']=$aux[$festival.'duracion'];
                }
                else
                    $resultado[$i]['Duracion']=0;
                $i++;

            }
          //  dd($resultado,$aux,$festivales,$resultadoFestivales);
            $request->session()->put('festivales',$resultado);



        }

        if(!isset($resultado[0]['Festivales']))
            $resultado[0]['Festivales']=0;

        if($resultado[0]['Festivales']>0) {
            return view('Reportes/ReporteFestival')->with([
                'resultados'=>$resultado,
                'FechaIni'=>$request->FechaInicio,
                'FechaFin'=>$request->FechaFinal
            ]);
        }
        else
        {
            Session::flash('error', 'No se encontraron resultados');
            return redirect('reportes/festivales');
        }


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
