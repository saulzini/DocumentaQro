@include('Partials.ScriptsGenerales.scriptsPartials')
  <body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      @include('Partials.ScriptsGenerales.headerPartials')
      <!--header end-->

<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
      @include('Programas.ProgramasAside')



      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3 style="color:#F10687"><i class="fa fa-angle-right"></i>Programas</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i>Búsqueda</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('programasAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="Agregar"><i class="fa fa-plus"></i></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'programasLista' ,'method'=>'GET']) !!}
                                                @include('Partials.Buscador.buscador')
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <hr>

                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i>Nombre</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Programas) )

                                    @foreach( $Programas as $programa)

                                        <tr>
                                            <td><a href="{{ route('programasLista/item',$programa->id) }}">{{ $programa->titulo }}</a></td>

                                            <td style="width: 5px">
                                                <a href="{{ route('programasLista/item',$programa->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="Consultar"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('programas/modificar/item',$programa->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="Modificar"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['ProgramasController@eliminarProgramas'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar el programa?")'><i class="fa fa-trash-o "></i></button>
                                                <input type="hidden" name="programaId" value={{$programa->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                       </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                         @if (isset($Programas))
                            {!! $Programas->setPath('')->render()!!}
                            @endif
                        </div>
                    </div>
                    <!-- FIN CONTENIDO -->

                </div>
            </section>
        </section>
      </section>


@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')