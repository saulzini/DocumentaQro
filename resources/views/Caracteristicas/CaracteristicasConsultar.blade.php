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
      @include('Caracteristicas.CaracteristicasAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('caracteristicas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR TRAFICOS -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.consultarCaracteristica')  }}</h4>




                              @if( isset($caracteristicaItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('caracteristicas/modificar/item',$caracteristicaItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['CaracteristicasController@eliminarCaracteristicas'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarCaracteristica')  }}")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="caracteristicasID" value={{$caracteristicaItem->id}}>
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


                                              <dt>{{ trans('validation.attributes.caracteristica')}}</dt><dd>{{ $nombre }}</dd>

                                          </dl>
                                          <div class="form-group" align="center">
                                              <a href="{{ route('caracteristicasExport/item/',$caracteristicaItem->id) }}">  <button type="button"  class="btn btn-success">{{ trans('validation.attributes.exportar')}}</button></a>
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