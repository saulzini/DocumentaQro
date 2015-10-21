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
                <h3><i class="fa fa-angle-right"></i>Reportes</h3>
                <div class="row mt">


                    <!-- INICIO CONTENIDO -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Funciones</h4>
                            @include('Partials.Mensajes.mensajes')
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    {!! Form::open(['route' => 'reportesConsultarFunciones' ,'method'=>'GET','role'=>'form','id'=>'defaultForm']) !!}

                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <div class="input-group date tooltips" id="fechaInicioDP" data-placement="top" data-original-title="Fecha inicio">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>

                                                    @if(isset($FechaIni))
                                                    {!!Form::text('FechaInicio' ,$FechaIni,['class'=>'form-control','placeholder'=>'Fecha Inicio'])!!}
                                                    @else
                                                        {!!Form::text('FechaInicio' ,null,['class'=>'form-control','placeholder'=>'Fecha Inicio'])!!}

                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <div class="input-group date tooltips" id='fechaFinDP' data-placement="top" data-original-title="Fecha fin">
                                                          <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                          </span>
                                                    @if(isset($FechaFin))
                                                    {!!Form::text('FechaFinal' ,$FechaFin,['class'=>'form-control','placeholder'=>'Fecha Final'])!!}
                                                   @else
                                                        {!!Form::text('FechaFinal' ,null,['class'=>'form-control','placeholder'=>'Fecha Final'])!!}
                                                   @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                {!! Form::submit('Buscar',['class'=>'btn btn-default'])!!}
                                            </div>
                                        </div>

                                           {!! Form::close() !!}
                                    </div>
                                    </div>

                            <hr>
                    @if(isset($resultados))

                            <h5><i class="fa fa-angle-right"></i>Historial</h5>
                           <div align="center">
                            <table  class="table table-striped table-advance table-hover table_sort"  >
                                <thead >
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> Función </th>
                                    <th class="hidden-phone"><i class="fa fa-calendar-o"></i> Asistentes </th>
                                    <th><i class=" fa fa-edit"></i>Minutos</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($resultados as $resultado)

                                        <tr>
                                            <td style="width: 50%">{{$resultado['Funcion']}}</td>
                                            <td style="width: 25%">{{$resultado['Asistencia']}}</td>
                                            <td style="width: 25%">{{$resultado['Duracion']}}</td>
                                       </tr>
                                @endforeach
                                </tbody>
                            </table>
                               </div>



                        <hr>

                        <h5><i class="fa fa-angle-right"></i>Datos generales</h5>
                        <br>
                            <div class="row">
                                <div class="col-xs-12" align="center">

                                    <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                   <dl class="dl-horizontal">
                                        <dt>Peliculas</dt><dd>{{$resultados[0]['Peliculas']}}</dd><br>
                                        <dt>Largometrajes</dt><dd>{{$resultados[0]['Largometrajes']}}</dd><br>
                                        <dt>Cortometrajes</dt><dd>{{$resultados[0]['Cortometrajes']}}</dd><br>
                                    </dl>
                                         </div>
                                     </div>
                                </div>


                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <dl class="dl-horizontal">
                                                <dt>Funciones</dt><dd>{{$resultados[0]['Funciones']}}</dd><br>
                                                <dt>Total espectadores</dt><dd>{{$resultados[0]['Total espectadores']}}</dd><br>
                                                <dt>Total minutos</dt><dd>{{$resultados[0]['Total minutos']}}</dd><br>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                   </div>
                             </div>
                        <div clas="row">

                        <div class="col-xs-12" align="center">
                            <a href="{{route('reporte',"1")}}">
                            <button class="btn btn-success">Exportar a excel</button>
                            </a>
                        </div>

                    @endif
                            <br>
                            <br>
                    </div>


                    <!-- FIN CONTENIDO -->

                </div>
                    </div>
            </section>
        </section>
      </section>


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

      <script>
          $(function(){
              $("table.table_sort").sort_table({
                  "action" : "init"
              });
          });
      </script>



@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')