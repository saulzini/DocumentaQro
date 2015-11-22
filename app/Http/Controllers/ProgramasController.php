<?php

namespace App\Http\Controllers;

use App\Caracteristica;
use App\Festival;
use App\Funcion;
use App\Funcion_Pelicula;
use App\Http\Requests\Eliminar;
use App\Http\Requests\PaquetesRequest;
use App\Http\Requests\ProgramasRequest;
use App\Integrante;
use App\Paquete;
use App\Patrocinador;
use App\Patrocinador_Programa;
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
use Illuminate\Support\Facades\Auth;


class ProgramasController extends Controller
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
            if (Auth::user()->can('programas'))
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
        $now= Carbon::now()->toDateTimeString();
        $now2 =Carbon::now()->subMonth(6)->toDateTimeString();

        $Programas = Programa::whereBetween('updated_at',[ $now2,$now])->orderBy('titulo', 'asc')->paginate(15);

        return view ('Programas/Programas')->with([
            'Programas' => $Programas
        ]);
    }

    public function eliminarProgramas(Eliminar $request){

        $Programas = Programa::findOrFail($request->programaId);
        $ProgramasFestivales = $Programas->festivales;
        $ProgramasPatrocinadores = $Programas->patrocinadores;

        DB::transaction(function() use ($Programas, $ProgramasFestivales, $ProgramasPatrocinadores)
        {
            $Programas->festivales()->sync([]);
            $Programas->patrocinadores()->sync([]);
            $Programas->delete();
        });

        if($Programas->poster!="assets/img/default.png")
            unlink($Programas->poster);

        Session::flash('message', $Programas->titulo. ' ha sido eliminado');
        return redirect('programas');
    }


    public  function buscador(Request $request){
        $Programas = Programa::titulo($request->get('buscador'))->orderBy('titulo', 'asc')->paginate(15);

        return view ('Programas/Programas')->with([
            'Programas' => $Programas,
        ]);
    }

    public function pagAgregar()
    {
        $Festivales = Festival::select('id','titulo')->orderBy('titulo','asc')->get();
        $Patrocinadores = Patrocinador::select('id','nombre')->orderBy('nombre','asc')->get();
        return view('Programas/ProgramasAgregar')->with([
            'Festivales' => $Festivales,
            'Patrocinadores'=> $Patrocinadores
        ]);
    }


    public function agregarProgramas(ProgramasRequest $request){
        $Programas = $this->adaptarPrograma($request);
        $Festivales = $request->Festivales;
        $Patrocinadores = $request->Patrocinadores;

        DB::transaction(function() use ($Programas, $Festivales, $Patrocinadores, $request)
        {
            if($Programas->poster==null&&!$request->hasFile('image'));
            {
                $Programas->poster="assets/img/default.png";
            }
            $Programas->save();

            if( !empty($Patrocinadores)) {
                $Programas->patrocinadores()->sync($Patrocinadores);

            }
            
            if( !empty($Festivales) ) {

                $Programas->festivales()->sync($Festivales);

            }

            if($request->hasFile('image')){
                $name = "programas-".$Programas->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgProgramas";
                $request->file('image')->move(public_path()."/".$path,$name);
                $Programas->poster = $path."/".$name;
                $Programas->save();
            }

        });

        Session::flash('message', $Programas->titulo. ' ha sido agregado');
        return redirect('programas/agregar');
    }

    public  function adaptarPrograma(ProgramasRequest $request){
        $Programas = new Programa();
        $Programas->titulo = $request->Titulo;
        return $Programas;
    }

    public function seleccion($id)
    {
        $ProgramasItem = Programa::findOrFail($id);
        $ProgramasFestivales = $ProgramasItem->festivales;
        $ProgramasPatrocinadores = $ProgramasItem->patrocinadores;

        if( $ProgramasFestivales->isEmpty())
            $ProgramasFestivales = null;

        if( $ProgramasPatrocinadores->isEmpty())
            $ProgramasPatrocinadores = null;

        return view('Programas/ProgramasConsultar')->with([
            'ProgramasItem'=>$ProgramasItem,
            'ProgramasFestivales'=>$ProgramasFestivales,
            'ProgramasPatrocinadores'=>$ProgramasPatrocinadores
        ]);
    }

    public function pagModificar($id)
    {
        $ProgramasItem = Programa::findOrFail($id);
        $ProgramasFestivales = $ProgramasItem->festivales;
        $ProgramasPatrocinadores = $ProgramasItem->patrocinadores;

        $Festivales = Festival::select('id','titulo')->orderBy('titulo', 'asc')->get();
        $Patrocinadores = Patrocinador::select('id','nombre')->orderBy('nombre', 'asc')->get();

        $aux = end($ProgramasFestivales);
        $ultimoFestival = end($aux);
        $aux = end($ProgramasPatrocinadores);
        $ultimoPatrocinador = end($aux);

        return view('Programas/ProgramasModificar')->with([

            'ProgramasItem'=>$ProgramasItem,
            'ProgramasFestivales'=>$ProgramasFestivales,
            'Festivales'=>$Festivales,
            'ultimoFestival'=>$ultimoFestival,
            'ProgramasPatrocinadores'=>$ProgramasPatrocinadores,
            'Patrocinadores'=>$Patrocinadores,
            'ultimoPatrocinador'=>$ultimoPatrocinador
        ]);
    }

    public function pagConsultar()
    {
       return view('Programas/ProgramasConsultar');
    }


    public function adaptarProgramasModificar(ProgramasRequest $request){
        $Programas = Programa::findOrFail($request->programaId);
        $Programas->titulo = $request->Titulo;
        return $Programas;
    }

    public function modificarProgramas(ProgramasRequest $request){

        $Programas = $this->adaptarProgramasModificar($request);
        $Festivales = $request->Festivales;
        $Patrocinadores = $request->Patrocinadores;


        DB::transaction(function() use ($Programas, $Festivales,$Patrocinadores,$request)
        {
            $Programas->save();

            if( !empty($Patrocinadores)) {
                $Programas->patrocinadores()->sync($Patrocinadores);

            }else{
                $Programas->patrocinadores()->sync([]);
            }

            if( !empty($Festivales) ) {

                $Programas->festivales()->sync($Festivales);

            }else{
                $Programas->festivales()->sync([]);
            }

            if($request->hasFile('image')){
                $name = "programas-".$Programas->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgProgramas";
                $request->file('image')->move(public_path()."/".$path,$name);
                $Programas->poster = $path."/".$name;
                $Programas->save();
            }

            $Programas->push();
        });

        //El registro se ha agregado
        Session::flash('message', $Programas->titulo. ' ha sido modificado');

        return redirect('programas/modificar/item/'.$Programas->id);
    }


    public function exportarProgramas($id){

        $ProgramaItem = Programa::findOrFail($id);
        $Festivales = $ProgramaItem->festivales;
        $Patrocinadores = $ProgramaItem->patrocinadores;

        if($Festivales->isEmpty())
            $Festivales=null;

        if($Patrocinadores->isEmpty())
            $Patrocinadores=null;

        $view =  \View::make('Programas.PDFProgramas',compact('ProgramaItem', 'Festivales','Patrocinadores'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');
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
