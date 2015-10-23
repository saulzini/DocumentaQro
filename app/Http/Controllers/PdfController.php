<?php

namespace App\Http\Controllers;
use App\Funcion;
use App\Patrocinador;
use App\Realizador;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
  public function exportar($id){
      $funcionesItem = Funcion::find($id);

      $funcionesPeliculas = $funcionesItem->peliculas;

      $funcionesProgramas = $funcionesItem->programas;
      $funcionesFestivales = $funcionesItem->festivales;
      $funcionesPatrocinadores = $funcionesItem->patrocinadores;

      $view =  \View::make('Reportes',compact('funcionesItem','funcionesPeliculas','funcionesProgramas','funcionesFestivales','funcionesPatrocinadores'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice.pdf');


  }

    public function exportarPatrocinadores($id){
        $patrocinadorItem = Patrocinador::findOrFail($id);

        //dd($patrocinadorItem->paquetes);
        $view =  \View::make('Patrocinadores.PDFPatrocinadores',compact('patrocinadorItem'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');


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
