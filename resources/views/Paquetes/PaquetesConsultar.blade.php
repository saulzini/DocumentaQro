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
      @include('Paquetes.PaquetesAside')
      <!--sidebar end-->


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('paquetes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                    <h4  style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar paquete</h4>


                              @if( isset($PaqueteItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('paquetes/modificar/item',$PaqueteItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['PaquetesController@eliminarPaquetes'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar el paquete?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="paqueteId" value={{$PaqueteItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">

                                    <div class="col-md-2"></div>

                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">

                                              <dt>Nombre</dt><dd>{{ $PaqueteItem->descripcion }}</dd>
                                              <dt>Costo</dt><dd>$ {{ $PaqueteItem->costo }}</dd>

                                              <dl>
                                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                      <div class="panel panel-default">
                                                          <div class="panel-heading" role="tab" id="headingOne">
                                                              <h4 class="panel-title">
                                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                      Características <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                              </h4>
                                                          </div>
                                                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                              @if ( isset( $PaquetesCaracteristicas))
                                                                  @foreach( $PaquetesCaracteristicas as $Caracteristica)
                                                                      <li class="list-group-item">{{ $Caracteristica->nombre }}</li>

                                                                  @endforeach
                                                              @endif
                                                          </div>
                                                      </div>
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