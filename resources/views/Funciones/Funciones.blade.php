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
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              	  	
                 <li class="sub-menu">
                      <a href="#" >
                         <i class="fa fa-film"></i>
                          <span>Películas</span>
                      </a>
                      <ul class="sub">

                          <li><a href="#" >
                          <i class="fa fa-film"></i>
                          <span>Película</span>
                          </a></li>

                           <li><a href="#" >
                          <i class="fa fa-hand-o-up fa-lg"></i>
                          <span>Realizadores</span>
                          </a></li>

                          <li><a href="#" >
                          <i class="fa fa-envelope"></i>
                          <span>Tráfico</span>
                          </a></li>

                      </ul>
                  </li>

                  <li class="sub-menu active">
                      <a href="#" class="active">
                        <i class="fa fa-video-camera"></i>
                          <span>Función</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-tasks"></i>
                          <span>Programa</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-ticket"></i>
                          <span>Festival</span>
                      </a>
                  </li>
              
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-users"></i>
                          <span>Integrantes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-thumbs-o-up"></i>
                          <span>Patrocinios</span>
                      </a>

                      <ul class="sub">
                          <li><a href="#" >
                          <i class="fa fa-cubes"></i>
                          <span>Paquetes</span>
                          </a></li>
                          
                          <li><a href="javascript:;" >
                          <i class="fa fa-thumbs-o-up"></i>
                          <span>Patrocinadores</span>
                          </a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reportes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-cog"></i>
                          <span>Configuración</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
     
      <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Búsqueda</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Funciones</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('funcionesAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="Agregar"><i class="fa fa-plus"></i></i></button></a>
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
                                                <div class="input-group date tooltips" id="fechaInicioDP" data-placement="top" data-original-title="Fecha inicio">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>

                                                    {!!Form::text('FechaInicio' ,null,['class'=>'form-control','placeholder'=>'Fecha Inicio'])!!}

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <div class="input-group date tooltips" id='fechaFinDP' data-placement="top" data-original-title="Fecha fin">
                                                          <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                          </span>
                                                    {!!Form::text('FechaFinal' ,null,['class'=>'form-control','placeholder'=>'Fecha Final'])!!}

                                                </div>
                                            </div>
                                        </div>
                                                    {!! Form::close() !!}

                                    </div>
                                    </div>
                            </div>
                            <hr>

                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> Título </th>
                                    <th class="hidden-phone"><i class="fa fa-calendar-o"></i> Fecha </th>
                                    <th><i class=" fa fa-edit"></i>Status</th>
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
                                                <a href="{{ route('funcionesLista/item',$funcion->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="Consultar"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                <a href="{{ route('funciones/modificar/item',$funcion->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="Modificar"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td style="width: 5px">
                                                {!! Form::open(['action'=>['FuncionesController@eliminarFunciones'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="Eliminar" onclick='return confirm("¿Seguro que desea eliminar la función?")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="funcionId" value={{$funcion->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                       </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                         @if (isset($Funciones))
                            {!! $Funciones->setPath('')->render()!!}
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
                                  message: 'Ingresa la fecha de inicio'
                              },
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: 'El formato debe ser DD/MM/YYYY'
                              }
                          }
                      },
                      FechaFinal: {
                          validators: {
                              notEmpty: {
                                  message: 'Ingresa la fecha final'
                              },
                              date: {
                                  format: 'DD/MM/YYYY',
                                  message: 'El formato debe ser DD/MM/YYYY'
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