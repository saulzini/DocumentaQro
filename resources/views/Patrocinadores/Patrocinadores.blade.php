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
                          <span>Patrocinadores</span>
                          </a></li>

                          <li><a href="#" >
                          <i class="fa fa-envelope"></i>
                          <span>Tráfico</span>
                          </a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
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
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Patrocinadores</h4>

                            @include('Partials.Mensajes.mensajes')

                            <div class="form-group" align="right">
                               <a href="{{route('patrocinadoresAgregar')}}"> <button class="btn agregar tooltips" data-placement="left" data-original-title="Agregar"><i class="fa fa-plus"></i></button></a>
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

                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-thumb-tack"></i> Nombre </th>
                                    <th><i class="fa fa-thumb-tack"></i> Teléfono </th>



                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ( isset( $Patrocinadores) )

                                    @foreach( $Patrocinadores as $patrocinador)

                                        <tr>
                                            <td><a href="{{ route('patrocinadoresLista/item',$patrocinador->id) }}">{{ $patrocinador->nombre }}</a></td>

                                            <td><span>{{ $patrocinador->telefono}}</span></td>

                                            <td>
                                                <a href="{{ route('patrocinadoresLista/item',$patrocinador->id) }}"><button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="Consultar"><i class="fa fa-eye"></i></button></a>
                                            </td>

                                            <td>
                                                <a href="{{ route('patrocinadores/modificar/item',$patrocinador->id) }}"><button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="Modificar"><i class="fa fa-pencil"></i></button></a>
                                            </td>

                                            <td>
                                                {!! Form::open(['action'=>['PatrocinadoresController@eliminarPatrocinadores'],'role'=>'form'] )  !!}
                                                <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="Eliminar" onclick='return confirm("¿Seguro que desea eliminar el patrocinador?")'><i class="fa fa-trash-o "></i></button>

                                                <input type="hidden" name="patrocinadoresID" value={{$patrocinador->id}}>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                            @if (isset($Patrocinadores))
                                {!! $Patrocinadores->setPath('')->render()!!}
                            @endif
                        </div>
                    </div>
                    <!-- FIN CONTENIDO -->

                </div>
            </section>
        </section>
      </section>>




@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')