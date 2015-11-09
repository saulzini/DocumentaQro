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
      @include('Funciones.FuncionesAside')
      <!--sidebar end-->
     
      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.Funciones')  }}</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.busqueda')  }}</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('funcionesAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="{{ trans('validation.attributes.agregar')  }}"><i class="fa fa-plus"></i></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'funcionesLista' ,'method'=>'GET']) !!}


                                                @include('Partials.Buscador.buscador')



                                        </div>
                                    </div>

                                    <div id="defaultForm">
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <div class="input-group date tooltips" id="fechaInicioDP" data-placement="top" data-original-title="{{ trans('validation.attributes.fechaInicio')  }}">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>

                                                    {!!Form::text('FechaInicio' ,null,['class'=>'form-control','placeholder'=>trans('validation.attributes.fechaInicio')])!!}

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <div class="input-group date tooltips" id='fechaFinDP' data-placement="top" data-original-title="{{ trans('validation.attributes.fechaFin')  }}">
                                                          <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                          </span>
                                                    {!!Form::text('FechaFinal' ,null,['class'=>'form-control','placeholder'=>trans('validation.attributes.fechaFin')])!!}

                                                </div>
                                            </div>
                                        </div>
                                                    {!! Form::close() !!}

                                    </div>
                                    </div>
                            </div>
                            <hr>

                        <div class="table-responsive">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> {{ trans('validation.attributes.Titulo')  }} </th>
                                    <th class="hidden-phone"><i class="fa fa-calendar-o"></i> {{ trans('validation.attributes.Fecha')  }} </th>
                                    <th><i class=" fa fa-edit"></i>{{ trans('validation.attributes.status')  }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Funciones) )

                                    @foreach( $Funciones as $funcion )

                                        <tr>
                                            <td><a href="{{ route('funcionesLista/item',$funcion->id) }}">{{ $funcion->titulo }}</a></td>
                                            <td class="hidden-phone">{{ $funcion->fecha }}</td>
                                            <td><span >{{ $funcion->status }}</span></td>

                                            <td style="width: 5px">
                                                <a href="{{ route('funcionesLista/item',$funcion->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('funciones/modificar/item',$funcion->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['FuncionesController@eliminarFunciones'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarFuncion')  }}")'><i class="fa fa-trash-o "></i></button>
                                                <input type="hidden" name="funcionId" value={{$funcion->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                       </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                          </div>
                         @if (isset($Funciones))
                            {!! $Funciones->setPath('')->appends(Input::query())->render()!!}
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
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFechaInicio")  }}'
                              },
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: '{{ trans("validation.attributes.validatorDateFormat")  }}'
                              }
                          }
                      },
                      FechaFinal: {
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFechaFin")  }}'
                              },
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: '{{ trans("validation.attributes.validatorDateFormat")  }}'
                              }
                          }
                      }
                  }
              });

              $('#fechaInicioDP').on('dp.change dp.show', function(e) {
                  if ( $('#defaultForm').data('bootstrapValidator').revalidateField('FechaInicio') && ! $('#defaultForm').data('bootstrapValidator').revalidateField('FechaFinal')) {
                      $('#defaultForm').data('bootstrapValidator').revalidateField('FechaFinal');
                  }
              });

              $('#fechaFinDP').on('dp.change dp.show', function(e) {
                  if ( $('#defaultForm').data('bootstrapValidator').revalidateField('FechaFinal') && ! $('#defaultForm').data('bootstrapValidator').revalidateField('FechaInicio')) {
                      $('#defaultForm').data('bootstrapValidator').revalidateField('FechaInicio');
                  }
              });
          });
      </script>



@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')