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
      @include('Integrantes.IntegrantesAside')
      <!--sidebar end-->


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('integrantes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR TRAFICOS -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Consultar integrante</h4>




                              @if( isset($integranteItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('integrantes/modificar/item',$integranteItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['IntegrantesController@eliminarIntegrantes'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar el integrante?")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="integrantesID" value={{$integranteItem->id}}>
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


                                              <dt>Nombre</dt><dd>{{ $nombre }}</dd>
                                              <dt>Teléfono</dt><dd>{{ $telefono }}</dd>
                                              <dt>Puesto</dt><dd>{{ $puesto}}</dd>

                                              <dt>E-mail</dt><dd>{{ $email}}</dd>
                                          </dl>

                                          <div class="form-group" align="center">
                                              <a href="{{ route('integrantesExport/item/',$integranteItem->id) }}">  <button type="button"  class="btn btn-success">Exportar</button></a>
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