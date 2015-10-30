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
      @include('Funciones.FuncionesAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('funciones')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar función</h4>




                              @if( isset($funcionesItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('funciones/modificar/item',$funcionesItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['FuncionesController@eliminarFunciones'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la función?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="funcionId" value={{$funcionesItem->id}}>
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
                                                  <img src="{{asset($funcionesItem->poster)}}" class="img-thumbnail img-responsive">
                                              </div>
                                          </div>

                                      </div>
                                      <br>

                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">


                                              <dt>Título</dt><dd>{{ $funcionesItem->titulo }}</dd>
                                              <dt>Fecha</dt><dd>{{ $funcionesItem->fecha }}</dd>
                                              <dt>Sede</dt><dd>{{ $funcionesItem->sedes->descripcion }}</dd>

                                              <dt>Asistencia</dt><dd>{{ $funcionesItem->asistencia }}</dd>

                                              <dt>Status</dt><dd>{{ $funcionesItem->status }}</dd>
                                              <dl>

                                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                      <div class="panel panel-default">
                                                          <div class="panel-heading" role="tab" id="headingOne">
                                                              <h4 class="panel-title">
                                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                      Películas <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                              </h4>
                                                          </div>
                                                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                              @if ( isset( $funcionesPeliculas) )

                                                                  @foreach( $funcionesPeliculas as $funcionPeliculas)

                                                                      <li class="list-group-item">{{ $funcionPeliculas->titulo  }}</li>

                                                                  @endforeach
                                                              @endif
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <dl class="dl-horizontal">
                                                      <dt>Programa</dt><dd>
                                                          @if ( isset( $funcionesProgramas) )
                                                              {{ $funcionesProgramas->titulo  }}
                                                          @else
                                                              No hay programa asignado
                                                          @endif
                                                                    </dd>

                                                      <dt>Festival</dt><dd>
                                                          @if ( isset( $funcionesFestivales) )
                                                              {{ $funcionesFestivales->titulo  }}
                                                          @endif</dd>
                                                  </dl>

                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingTwo">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                  Patrocinadores <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                          @if ( isset( $funcionesPatrocinadores)  )

                                                              @foreach( $funcionesPatrocinadores as $funcionPatrocinadores)

                                                                  <li class="list-group-item">{{ $funcionPatrocinadores->nombre}}</li>

                                                              @endforeach
                                                            @else
                                                              <li class="list-group-item">No hay patrocinadores</li>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <dl class="dl-horizontal">
                                                      <dt>Programado por</dt>
                                                        @if(isset($funcionesItem->programadopor)&&$funcionesItem->programadopor!="")
                                                          <dd>{{$funcionesItem->programadopor}}</dd>
                                                        @else
                                                          <dd>No se ha registrado</dd>
                                                        @endif

                                                      <br><br>
                                                      <div class="form-group" align="center">
                                                        <a href="{{ route('funcionesExport/item/',$funcionesItem->id) }}">  <button type="button"  class="btn btn-success">Exportar</button></a>
                                                      </div>

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