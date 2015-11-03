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
      @include('Realizadores.RealizadoresAside')
      <!--sidebar end-->


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('realizadores')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.buscar')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.consultarRealizador')  }} </h4>




                              @if( isset($realizadoresItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('realizadores/modificar/item',$realizadoresItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['RealizadoresController@eliminarRealizadores'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarRealizador')  }}")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="realizadoresID" value={{$realizadoresItem->id}}>
                                              {!! Form::close() !!}

                                          </td>
                                      </tr>
                                  </table>
                                  <br><br>

                              @endif

                                  <div class="row">
                                    <div class="col-md-4"></div>
                                      <div class="col-md-8">
                                          <dl class="dl-horizontal">


                                              <dt>{{ trans('validation.attributes.nombre')  }}</dt><dd>{{ $realizadoresItem->nombre}}</dd>
                                              <dt>{{ trans('validation.attributes.vinculo')  }}</dt><dd>{{ $realizadoresItem->vinculo }}</dd>
                                              <dt>E-mail</dt><dd>{{ $realizadoresItem->email }}</dd>

                                              <dt>{{ trans('validation.attributes.telefono')  }}</dt><dd>{{ $realizadoresItem->telefono}}</dd>

                                          </dl>


                                      </div>

                                  </div>
                              <br><br>
                                  <div class="form-group" align="center">
                                      <a href="{{ route('realizadoresExport/item/',$realizadoresItem->id) }}">  <button type="button"  class="btn btn-success">{{ trans('validation.attributes.exportar')  }}</button></a>
                                  </div>

                          </div>
                      </div>
                      <!-- FIN CONSULTAR FUNCIONES -->
                  </div>
              </section>
          </section>
      </section>




@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')