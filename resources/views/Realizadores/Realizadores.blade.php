@include('Partials.ScriptsGenerales.scriptsPartials')
  <body>
  <script type="text/javascript">

      $(function () {

          //previene lo del input
          $('#fechaFinDP').keypress(function(event) {event.preventDefault();});
          //previene lo del input
          $('#fechaInicioDP').keypress(function(event) {event.preventDefault();});


          //VALIDAR FECHAS EN BUSQUEDA

          $('#fechaFinDP').datetimepicker({
              format: 'DD/MM/YYYY'
          });

          $('#fechaInicioDP').datetimepicker({
              format: 'DD/MM/YYYY'
          });

          $('#fechaInicioDP').datetimepicker();
          $('#fechaFinDP').datetimepicker({
              useCurrent: false //Important! See issue  #1075
          });
          $("#fechaInicioDP").on("dp.change", function (e) {
              $('#fechaFinDP').data("DateTimePicker").minDate(e.date);
          });
          $("#fechaFinDP").on("dp.change", function (e) {
              $('#fechaInicioDP').data("DateTimePicker").maxDate(e.date);
          });
      });
  </script>

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
      <!--sidebar start-->
      @include('Realizadores.RealizadoresAside')
      <!--sidebar end-->
      
     
      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i> {{ trans('validation.attributes.buscar')  }} </h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.realizadores')  }}</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('realizadoresAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="{{ trans('validation.attributes.agregar')  }}"><i class="fa fa-plus"></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'realizadoresLista' ,'method'=>'GET']) !!}


                                                @include('Partials.Buscador.buscador')



                                        </div>
                                    </div>

                                    <div id="defaultForm">


                                                    {!! Form::close() !!}

                                    </div>
                                    </div>
                            </div>
                            <hr>

                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> {{ trans('validation.attributes.nombre')  }} </th>
                                    <th><i class="fa fa-thumb-tack"></i> {{ trans('validation.attributes.vinculo')  }} </th>



                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Realizadores) )

                                    @foreach( $Realizadores as $realizador)

                                        <tr>
                                            <td><a href="{{ route('realizadoresLista/item',$realizador->id) }}">{{ $realizador->nombre }}</a></td>

                                            <td><span>{{ $realizador->vinculo}}</span></td>

                                            <td style="width: 5px">
                                                <a href="{{ route('realizadoresLista/item',$realizador->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('realizadores/modificar/item',$realizador->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['RealizadoresController@eliminarRealizadores'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarRealizador')  }}")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="realizadoresID" value={{$realizador->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                            @if (isset($Realizadores))
                                {!! $Realizadores->setPath('')->render()!!}
                            @endif
                        </div>
                    </div>
                    <!-- FIN CONTENIDO -->

                </div>
            </section>
        </section>
      </section>>




@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')