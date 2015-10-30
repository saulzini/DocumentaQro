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
      @include('Peliculas.PeliculasAside')


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('peliculas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4  style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar película</h4>




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
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la película?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="peliculasID" value={{$peliculaItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">
                                      <div class="col-md-4">
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
                                              <dt>País</dt><dd>{{ $pais}}</dd>

                                              <dt>Año</dt><dd>{{ $anio}}</dd>

                                              <dt>Duración</dt><dd>{{ $duracion }}</dd>

                                              <dt>Tipo</dt><dd>{{ $tipo}}</dd>
                                              <dt>Subtítulos</dt><dd>{{ $subtitulos }}</dd>
                                              <dt>Trailer</dt><dd>@if($trailer!=""){{ $trailer}}@else No tiene @endif</dd>
                                              <dt>Material</dt><dd>@if($material!="")<a href="{{ asset($material)}}">Click para descargar</a>@else No tiene @endif</dd>
                                              <br>
                                              <dt>Sinopsis</dt><dd>@if($sinopsis!=""){{ $sinopsis}}@else No tiene @endif</dd>
                                              <br>
                                              <dt>Notas</dt><dd>@if($notas!=""){{ $notas}}@else No tiene @endif</dd>

                                              <div class="form-group" align="center">
                                                  <a href="{{ route('peliculasExport/item/',$peliculaItem->id) }}">  <button type="button"  class="btn btn-success">Exportar</button></a>
                                              </div>

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