@include('Partials.ScriptsGenerales.scriptsPartials')



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
                  <h3><a href="{{route('peliculas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Gestión de películas</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4><i class="fa fa-angle-right"></i>Consultar pelicula</h4>




                              @if( isset($peliculaItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('peliculas/modificar/item',$peliculaItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['PeliculasController@eliminarPeliculas'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la función?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="peliculasID" value={{$peliculaItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">
                                      <div class="col-md-5">
                                          <div class="form-group">
                                              <div class="col-lg-12">
                                                  <img src="{{asset($poster)}}" class="img-thumbnail img-responsive">
                                              </div>
                                          </div>

                                      </div>
                                      <br>

                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">


                                              <dt>Título</dt><dd>{{ $titulo }}</dd>
                                              <dt>Director</dt><dd>{{ $director }}</dd>
                                              <dt>Pais</dt><dd>{{ $pais}}</dd>

                                              <dt>Año</dt><dd>{{ $anio}}</dd>

                                              <dt>Duracion</dt><dd>{{ $duracion }}</dd>
                                              <dt>Subtitulos</dt><dd>{{ $subtitulos }}</dd>
                                              <dt>Trailer</dt><dd>{{ $trailer}}</dd>
                                              <dt>Material</dt><dd>{{ $material}}</dd>
                                              <dt>Sinopsis</dt><dd>{{ $sinopsis}}</dd>
                                              <dt>Notas</dt><dd>{{ $notas}}</dd>
                                              <dt>Tipo</dt><dd>{{ $tipo}}</dd>
                                          </dl>


                                      </div>

                                  </div>
                                  <br>

                          </div>
                      </div>
                      <!-- FIN CONSULTAR FUNCIONES -->
                  </div>
              </section>
          </section>
      </section>




@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')