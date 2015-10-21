<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Pelicula;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function consultarFunciones(Request $request)
    {
       // dd($request);
        if ( $request->FechaFinal != "" && $request->FechaInicio !="") {

            $fecha=$request->FechaInicio." 00:00:00";
            $fechaInf=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            $fecha=$request->FechaFinal." 23:59:59";
            $fechaSup=Carbon::createFromFormat("d/m/Y H:i:s", $fecha);
            //dd($fechaInf,$fechaSup);
            $Funciones = Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
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

            $Funciones = Funcion::whereBetween('fecha', array($fechaInf,$fechaSup))->orderBy('titulo', 'asc')->get();
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
