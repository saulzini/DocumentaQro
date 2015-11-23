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
      @include('Caracteristicas.CaracteristicasAside')
      <!--sidebar end-->
      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.caracteristicas')  }}</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.busqueda')  }}</h4>
                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('caracteristicasAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="{{ trans('validation.attributes.agregar')  }}"><i class="fa fa-plus"></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'caracteristicasLista' ,'method'=>'GET']) !!}


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
                                    <th><i class="fa fa-thumb-tack"></i>{{ trans('validation.attributes.caracteristica')  }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Caracteristicas) )

                                    @foreach( $Caracteristicas as $caracteristica)

                                        <tr>
                                            <td><a href="{{ route('caracteristicasLista/item',$caracteristica->id) }}">{{ $caracteristica->nombre }}</a></td>


                                            <td style="width: 5px">
                                                <a href="{{ route('caracteristicasLista/item',$caracteristica->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('caracteristicas/modificar/item',$caracteristica->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['CaracteristicasController@eliminarCaracteristicas'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarCaracteristica')  }}")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="caracteristicasID" value={{$caracteristica->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                            </div>
                         @if (isset($Caracteristicas))
                            {!! $Caracteristicas->setPath('')->render()!!}
                            @endif
                        </div>
                    </div>
                    <!-- FIN CONTENIDO -->

                </div>
            </section>
        </section>
      </section>>







      <script type="text/javascript">

          $(document).ready(function() {

              $('#defaultForm').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {

                      FechaInicio: {
                          validators: {
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: 'El formato debe ser DD/MM/YYYY'
                              }
                          }
                      },
                      FechaFinal: {
                          validators: {
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: 'El formato debe ser DD/MM/YYYY'
                              }
                          }
                      }
                  }
              });

              $('#fechaInicioDP')
                      .on('dp.change dp.show', function(e) {
                          $('#defaultForm').data('bootstrapValidator').revalidateField('FechaInicio');
                      });

              $('#fechaFinDP')
                      .on('dp.change dp.show', function(e) {
                          $('#defaultForm').data('bootstrapValidator').revalidateField('FechaFinal');
                      });
          });
      </script>



@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')