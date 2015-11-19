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
      @include('Traficos.TraficosAside')
      <!--sidebar end-->


      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.trafico')  }}</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.busqueda')  }}</h4>


                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('traficosAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="{{ trans('validation.attributes.agregar')  }}"><i class="fa fa-plus"></i></button></a>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="col-xs-6">
                                        <div class="input-group col-lg-12">

                                            {!! Form::open(['route' => 'traficosLista' ,'method'=>'GET']) !!}


                                            <div class="col-lg-14">

                                                <div class="input-group">


                                                        <span class="input-group-btn">
                                                                       {!! Form::submit(trans('validation.attributes.buscar') ,['class'=>'btn btn-default']) !!}
                                                                </span>


                                                    {!! Form::text('buscador', null, ['class' => 'form-control','placeholder'=>trans('validation.attributes.buscar')  ]) !!}
                                                </div><!-- /input-group -->
                                                
                                                <div class="form-group">
                                                    <label for="Status" class="col-lg-2 control-label">{{ trans('validation.attributes.status')  }}</label>
                                                    <div class="col-lg-10">
                                                        <select  class="form-control" id="Status" name="Status">
                                                            <option value="">{{ trans('validation.attributes.Selecciona')  }}</option>
                                                            @if( isset($traficosItem))

                                                                @foreach($Status as $statu)
                                                                    @if($traficosItem->status == $statu)
                                                                        <option value="{{ $statu }}" selected > {{ $statu}}  </option>
                                                                    @else
                                                                        <option value="{{ $statu }}" > {{ $statu}}  </option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach($Status as $statu)
                                                                    <option value="{{  $statu }}" > {{ $statu }}  </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                            </div><!-- /.col-lg-6 -->

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
                                    <th><i class="fa fa-thumb-tack"></i>{{ trans('validation.attributes.Título')  }} </th>
                                    <th><i class=" fa fa-edit"></i>{{ trans('validation.attributes.status')  }}</th>
                                    <th><i class="fa fa-archive"></i> {{ trans('validation.attributes.tipo')  }}</th>


                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Traficos) )

                                    @foreach( $Traficos as $trafico)

                                        <tr>
                                            <td><a href="{{ route('traficosLista/item',$trafico->id) }}">{{ $trafico->titulo }}</a></td>

                                            <td><span>{{ $trafico->status}}</span></td>
                                            <td><span>{{ $trafico->tipo }}</span></td>
                                            <td style="width: 5px">
                                                <a href="{{ route('traficosLista/item',$trafico->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('traficos/modificar/item',$trafico->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['TraficosController@eliminarTraficos'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarTrafico')  }}")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="traficosID" value={{$trafico->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                         @if (isset($Traficos))
                            {!! $Traficos->setPath('')->render()!!}
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