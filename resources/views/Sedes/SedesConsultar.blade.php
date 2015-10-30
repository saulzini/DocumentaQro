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
      @include('Sedes.SedesAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('sedes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar sede</h4>




                              @if( isset($sedeItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('sedes/modificar/item',$sedeItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['SedesController@eliminarSedes'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la sede?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="sedeID" value={{$sedeItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">

                                      <div class="col-md-3" >
                                          </div>
                                      <div class="col-md-5" >
                                          <dl class="dl-horizontal">


                                              <dt>Nombre</dt><dd>{{ $sedeItem->descripcion}}</dd>

                                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingOne">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                  Funciones <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                          @if ( isset( $funciones) )

                                                              @foreach( $funciones as $funcion)

                                                                  <li class="list-group-item"><strong>Titulo:</strong>{{$funcion->titulo}}&nbsp;<strong>Fecha:</strong>{{$funcion->fecha}}</li>

                                                              @endforeach
                                                          @else
                                                              <li class="list-group-item">No tiene funciones</li>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="form-group" align="center">
                                                  <a href="{{ route('sedesExport/item/',$sedeItem->id) }}">  <button type="button"  class="btn btn-success">Exportar</button></a>
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