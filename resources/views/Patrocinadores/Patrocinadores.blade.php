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
     @include('Patrocinadores.PatrocinadoresAside')
      
     
      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.Patrocinadores')  }}</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.busqueda')  }}</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('patrocinadoresAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="{{ trans('validation.attributes.agregar')  }}"><i class="fa fa-plus"></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'patrocinadoresLista' ,'method'=>'GET']) !!}


                                                @include('Partials.Buscador.buscador')



                                        </div>
                                    </div>

                                    <div id="defaultForm">


                                                    {!! Form::close() !!}

                                    </div>
                                    </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> {{ trans('validation.attributes.nombre')  }} </th>
                                    <th><i class="fa fa-phone"></i> {{ trans('validation.attributes.telefono')  }} </th>



                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Patrocinadores) )

                                    @foreach( $Patrocinadores as $patrocinador)

                                        <tr>
                                            <td><a href="{{ route('patrocinadoresLista/item',$patrocinador->id) }}">{{ $patrocinador->nombre }}</a></td>

                                            <td><span>{{ $patrocinador->telefono}}</span></td>

                                            <td style="width: 5px">
                                                <a href="{{ route('patrocinadoresLista/item',$patrocinador->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('patrocinadores/modificar/item',$patrocinador->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['PatrocinadoresController@eliminarPatrocinadores'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarPatrocinador')  }}")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="patrocinadoresID" value={{$patrocinador->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                            </div>
                            @if (isset($Patrocinadores))

                                {!! $Patrocinadores->setPath('')->appends(Input::query())->render()!!}
                            @endif
                        </div>
                    </div>
                    <!-- FIN CONTENIDO -->

                </div>
            </section>
        </section>
      </section>>

@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')