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
      @include('Traficos.TraficosAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('traficos')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR TRAFICOS -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar tráfico</h4>




                              @if( isset($traficoItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('traficos/modificar/item',$traficoItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['TraficosController@eliminarTraficos'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar el tráfico?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="traficosID" value={{$traficoItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">
                                      <br>
                                      <div class="col-md-4">

                                      </div>
                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">


                                              <dt>Título</dt><dd>{{ $titulo }}</dd>
                                              <dt>Ubicación</dt><dd>{{ $ubicacion }}</dd>
                                              <dt>Status</dt><dd>{{ $status}}</dd>

                                              <dt>Formato material</dt><dd>{{ $formato_material}}</dd>

                                              <dt>Costo</dt><dd>{{ $costo }}</dd>
                                              <dt>Tipo</dt><dd>{{ $tipo }}</dd>
                                              <dt>Integrante</dt><dd>{{ $integrante->nombre }}</dd>
                                              <dt>Realizador</dt><dd>{{ $realizador->nombre }}</dd>
                                          </dl>


                                      </div>

                                  </div>
                              <div class="form-group" align="center">
                                  <a href="{{ route('traficosExport/item/',$traficoItem->id) }}">  <button type="button"  class="btn btn-success">Exportar</button></a>
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