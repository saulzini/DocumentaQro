<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Pelicula;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export($report)
    {
        $data=null;
        $title=null;

        if($report=='1')
        {
            $data=session()->get('funciones');
            $title='Funciones';
        }

        if($report=='2')
        {
            $data=session()->get('paises');
            $title='Paises';
        }
        $fechaIni=$data[0]['Fecha inicial'];
        $fechaFin=$data[0]['Fecha final'];

        Excel::create('Reporte DocumentaQro '.$title.' de '.$fechaIni.' hasta '.$fechaFin, function($excel) use($data) {

            $excel->sheet('Export', function($sheet) use($data) {

                $sheet->fromArray($data);


            });
        })->export('xls');
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
