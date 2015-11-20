<?php

namespace App\Http\Controllers;

use App\Funcion;
use App\Http\Requests\Eliminar;
use App\Http\Requests\PeliculasRequest;
use App\Pelicula;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class PeliculasController extends Controller
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
            if (Auth::user()->can('peliculas'))
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
        //

        $now= Carbon::now()->toDateTimeString();
        $now2 =Carbon::now()->subMonth(6)->toDateTimeString();

        $Peliculas= Pelicula::whereBetween('updated_at',[ $now2,$now])->orderBy('titulo', 'asc')->paginate(15);
        //$this->castFunctionsDate($Funciones);
       // dd($Funciones);


        return view ('Peliculas/Peliculas')->with([
            'Peliculas' => $Peliculas,
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
        //

        //

        $Subtitulos = ['Si','No','En proceso'];
        $Paises=array("Afganistán", "Akrotiri", "Albania", "Alemania", "Andorra", "Angola", "Anguila", "Antártida", "Antigua y Barbuda", "Antillas Neerlandesas", "Arabia Saudí", "Arctic Ocean", "Argelia", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Islands", "Atlantic Ocean", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bahráin", "Bangladesh", "Barbados", "Bélgica", "Belice", "Benín", "Bermudas", "Bielorrusia", "Birmania Myanmar", "Bolivia", "Bosnia y Hercegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Chad", "Chile", "China", "Chipre", "Clipperton Island", "Colombia", "Comoras", "Congo", "Coral Sea Islands", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dhekelia", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "El Vaticano", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Gaza Strip", "Georgia", "Ghana", "Gibraltar", "Granada", "Grecia", "Groenlandia", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Ecuatorial", "Guinea-Bissau", "Guyana", "Haití", "Honduras", "Hong Kong", "Hungría", "India", "Indian Ocean", "Indonesia", "Irán", "Iraq", "Irlanda", "Isla Bouvet", "Isla Christmas", "Isla Norfolk", "Islandia", "Islas Caimán", "Islas Cocos", "Islas Cook", "Islas Feroe", "Islas Georgia del Sur y Sandwich del Sur", "Islas Heard y McDonald", "Islas Malvinas", "Islas Marianas del Norte", "IslasMarshall", "Islas Pitcairn", "Islas Salomón", "Islas Turcas y Caicos", "Islas Vírgenes Americanas", "Islas Vírgenes Británicas", "Israel", "Italia", "Jamaica", "Jan Mayen", "Japón", "Jersey", "Jordania", "Kazajistán", "Kenia", "Kirguizistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Macao", "Macedonia", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Man, Isle of", "Marruecos", "Mauricio", "Mauritania", "Mayotte", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montserrat", "Mozambique", "Namibia", "Nauru", "Navassa Island", "Nepal", "Nicaragua", "Níger", "Nigeria", "Niue", "Noruega", "Nueva Caledonia", "Nueva Zelanda", "Omán", "Pacific Ocean", "Países Bajos", "Pakistán", "Palaos", "Panamá", "Papúa-Nueva Guinea", "Paracel Islands", "Paraguay", "Perú", "Polinesia Francesa", "Polonia", "Portugal", "Puerto Rico", "Qatar", "Reino Unido", "República Centroafricana", "República Checa", "República Democrática del Congo", "República Dominicana", "Ruanda", "Rumania", "Rusia", "Sáhara Occidental", "Samoa", "Samoa Americana", "San Cristóbal y Nieves", "San Marino", "San Pedro y Miquelón", "San Vicente y las Granadinas", "Santa Helena", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Southern Ocean", "Spratly Islands", "Sri Lanka", "Suazilandia", "Sudáfrica", "Sudán", "Suecia", "Suiza", "Surinam", "Svalbard y Jan Mayen", "Tailandia", "Taiwán", "Tanzania", "Tayikistán", "TerritorioBritánicodel Océano Indico", "Territorios Australes Franceses", "Timor Oriental", "Togo", "Tokelau", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Unión Europea", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Wake Island", "Wallis y Futuna", "West Bank", "World", "Yemen", "Yibuti", "Zambia", "Zimbabue");
        $Tipos=['Cortometraje','Largometraje'];
        //dd($Sedes);

        return view('Peliculas/PeliculasAgregar')->with([

            'Paises'=>$Paises,
            'Subtitulos'=>$Subtitulos,
            'Tipos'=>$Tipos,

        ]);


    }

    public function adaptarPelicula($request)
    {

        $pelicula=new Pelicula();

        if(isset($request->peliculaId))
            $pelicula= Pelicula::findOrFail($request->peliculaId);

        $pelicula->titulo=$request->Titulo;
        $pelicula->director=$request->Director;
        $pelicula->pais=$request->Pais;
        $pelicula->anio=$request->Anio;
        $pelicula->duracion=$request->Duracion;
        $pelicula->subtitulos=$request->Subtitulos;
        $pelicula->trailer=$request->Trailer;
        $pelicula->sinopsis=$request->Sinopsis;
        $pelicula->notas=$request->Notas;
        $pelicula->tipo=$request->Tipo;

        return $pelicula;
    }

    public function agregarPeliculas(PeliculasRequest $request){

        //Llamar adaptarPelicula para pasar los valores correctos
        $pelicula= $this->adaptarPelicula($request);
        //guardar el arreglo de peliculas

        //transaccion
        DB::transaction(function() use ($pelicula,$request)
        {
            if($pelicula->poster==null&&!$request->hasFile('image'))
            {
                $pelicula->poster="assets/img/default.png";
            }
            //Guardar Registro
            $pelicula->save();

            if($request->hasFile('image')){
                $name = "peliculas-".$pelicula->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgPeliculas";
                $request->file('image')->move(public_path()."/".$path,$name);
                $pelicula->poster = $path."/".$name;
                $pelicula->save();
            }
            if($request->hasFile('material')){
                $name = "peliculas-".$pelicula->id.".".$request->file('material')->getClientOriginalExtension();
                $path = "assets/materialPeliculas";
                $request->file('material')->move(public_path()."/".$path,$name);
                $pelicula->material = $path."/".$name;
                $pelicula->save();
            }
        });
        //El registro se ha agregado
        Session::flash('message', $pelicula->titulo. ' ha sido agregado');
        return redirect('peliculas/agregar');
    }

    public function pagModificar($id)
    {

        $peliculasItem = Pelicula::find($id);
        $Subtitulos = ['Si','No','En proceso'];
        $Paises=array("Afganistán", "Akrotiri", "Albania", "Alemania", "Andorra", "Angola", "Anguila", "Antártida", "Antigua y Barbuda", "Antillas Neerlandesas", "Arabia Saudí", "Arctic Ocean", "Argelia", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Islands", "Atlantic Ocean", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bahráin", "Bangladesh", "Barbados", "Bélgica", "Belice", "Benín", "Bermudas", "Bielorrusia", "Birmania Myanmar", "Bolivia", "Bosnia y Hercegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Chad", "Chile", "China", "Chipre", "Clipperton Island", "Colombia", "Comoras", "Congo", "Coral Sea Islands", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dhekelia", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "El Vaticano", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Gaza Strip", "Georgia", "Ghana", "Gibraltar", "Granada", "Grecia", "Groenlandia", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Ecuatorial", "Guinea-Bissau", "Guyana", "Haití", "Honduras", "Hong Kong", "Hungría", "India", "Indian Ocean", "Indonesia", "Irán", "Iraq", "Irlanda", "Isla Bouvet", "Isla Christmas", "Isla Norfolk", "Islandia", "Islas Caimán", "Islas Cocos", "Islas Cook", "Islas Feroe", "Islas Georgia del Sur y Sandwich del Sur", "Islas Heard y McDonald", "Islas Malvinas", "Islas Marianas del Norte", "IslasMarshall", "Islas Pitcairn", "Islas Salomón", "Islas Turcas y Caicos", "Islas Vírgenes Americanas", "Islas Vírgenes Británicas", "Israel", "Italia", "Jamaica", "Jan Mayen", "Japón", "Jersey", "Jordania", "Kazajistán", "Kenia", "Kirguizistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Macao", "Macedonia", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Man, Isle of", "Marruecos", "Mauricio", "Mauritania", "Mayotte", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montserrat", "Mozambique", "Namibia", "Nauru", "Navassa Island", "Nepal", "Nicaragua", "Níger", "Nigeria", "Niue", "Noruega", "Nueva Caledonia", "Nueva Zelanda", "Omán", "Pacific Ocean", "Países Bajos", "Pakistán", "Palaos", "Panamá", "Papúa-Nueva Guinea", "Paracel Islands", "Paraguay", "Perú", "Polinesia Francesa", "Polonia", "Portugal", "Puerto Rico", "Qatar", "Reino Unido", "República Centroafricana", "República Checa", "República Democrática del Congo", "República Dominicana", "Ruanda", "Rumania", "Rusia", "Sáhara Occidental", "Samoa", "Samoa Americana", "San Cristóbal y Nieves", "San Marino", "San Pedro y Miquelón", "San Vicente y las Granadinas", "Santa Helena", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Southern Ocean", "Spratly Islands", "Sri Lanka", "Suazilandia", "Sudáfrica", "Sudán", "Suecia", "Suiza", "Surinam", "Svalbard y Jan Mayen", "Tailandia", "Taiwán", "Tanzania", "Tayikistán", "TerritorioBritánicodel Océano Indico", "Territorios Australes Franceses", "Timor Oriental", "Togo", "Tokelau", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Unión Europea", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Wake Island", "Wallis y Futuna", "West Bank", "World", "Yemen", "Yibuti", "Zambia", "Zimbabue");
        $Tipos=['Cortometraje','Largometraje'];
        return view('Peliculas/PeliculasModificar')->with([

            'peliculasItem'=>$peliculasItem,
            'Subtitulos' => $Subtitulos,
            'Paises'=>$Paises,
            'Tipos'=>$Tipos,

        ]);


    }



    public function modificarPeliculas(PeliculasRequest $request)
    {

        //Llamar adaptarFuncion para pasar los valores correctos
        $pelicula= $this->adaptarPelicula($request);


        //dd($request);
        //transaccion
        DB::transaction(function() use ($pelicula,$request)
        {

            //Guardar Registro
            $pelicula->save();

            if($request->hasFile('image')){
                $name = "peliculas-".$pelicula->id.".".$request->file('image')->getClientOriginalExtension();
                $path = "assets/imgPeliculas";
                $request->file('image')->move(public_path()."/".$path,$name);
                $pelicula->poster = $path."/".$name;
                $pelicula->save();
            }
            if($request->hasFile('material')){
                $name = "peliculas-".$pelicula->id.".".$request->file('material')->getClientOriginalExtension();
                $path = "assets/materialPeliculas";
                $request->file('material')->move(public_path()."/".$path,$name);
                $pelicula->material = $path."/".$name;
                $pelicula->save();
            }
            $pelicula->push();

        });

        //El registro se ha agregado
        Session::flash('message', $pelicula->titulo. ' ha sido modificado');

        return redirect('peliculas/modificar/item/'.$pelicula->id);
    }

    public  function buscador(Request $request){

            $Peliculas= Pelicula::titulo($request->get('buscador'))->orderBy('titulo', 'asc')->paginate(15);

        return view ('Peliculas/Peliculas')->with([
            'Peliculas' => $Peliculas,

        ]);
    }

    public function eliminarPeliculas(Eliminar $request){

        $peliculas= Pelicula::findOrFail($request->peliculasID);

        try
        {
            $peliculas->delete();

        }
        catch(PDOException  $e)
        {
            Session::flash('error', $peliculas->titulo. ' no pudo ser eliminado, una función o tráfico está relacionado a él');
            return redirect('peliculas');
        }
        if($peliculas->material!="")
            unlink($peliculas->material);
        if($peliculas->poster!="assets/img/default.png")
           unlink($peliculas->poster);
        //El registro se ha eliminado
        Session::flash('message', $peliculas->titulo. ' ha sido eliminado');
        return redirect('peliculas');
    }

    public function seleccion($id)
    {
        //obtener funcion


        $peliculaItem = Pelicula::findOrFail($id);

        $titulo = $peliculaItem->titulo;

        $director = $peliculaItem->director;
        $pais = $peliculaItem->pais;
        $anio= $peliculaItem->anio;
        $duracion= $peliculaItem->duracion;
        $subtitulos= $peliculaItem->subtitulos;
        $trailer= $peliculaItem->trailer;
        $material= $peliculaItem->material;
        $sinopsis= $peliculaItem->sinopsis;
        $notas= $peliculaItem->notas;
         $poster=$peliculaItem->poster;
         $tipo=$peliculaItem->tipo;


        return view('Peliculas/PeliculasConsultar')->with([

            'peliculaItem'=>$peliculaItem,
            'titulo' => $titulo,
            'director' => $director,
            'pais' => $pais,
            'anio' => $anio,
            'duracion' => $duracion,
            'subtitulos' => $subtitulos,
            'trailer' => $trailer,
            'material' => $material,
            'sinopsis' => $sinopsis,
            'notas' => $notas,
            'poster' => $poster,
            'tipo' => $tipo,


        ]);
    }


    public function exportar($id){
        $peliculaItem = Pelicula::findOrFail($id);

        $view =  \View::make('Peliculas/Reporte',compact('peliculaItem'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pelicula.pdf');


    }

}
