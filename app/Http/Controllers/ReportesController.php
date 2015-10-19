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
