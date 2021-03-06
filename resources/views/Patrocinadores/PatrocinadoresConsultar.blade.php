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
      @include('Patrocinadores.PatrocinadoresAside')


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('patrocinadores')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{trans('validation.attributes.busqueda')}}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{trans('validation.attributes.consultarPatrocinador')}} </h4>




                              @if( isset($patrocinadoresItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('patrocinadores/modificar/item',$patrocinadoresItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['PatrocinadoresController@eliminarPatrocinadores'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{trans('validation.attributes.mensajeEliminarPatrocinador')}}")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="patrocinadoresID" value={{$patrocinadoresItem->id}}>
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


                                              <dt>{{trans('validation.attributes.nombre')}}</dt><dd>{{ $patrocinadoresItem->nombre}}</dd>
                                              <dt>{{trans('validation.attributes.puesto')}}</dt><dd>{{ $patrocinadoresItem->puesto }}</dd>
                                              <dt>E-mail</dt><dd>{{ $patrocinadoresItem->email }}</dd>

                                              <dt>{{trans('validation.attributes.telefono')}}</dt><dd>{{ $patrocinadoresItem->telefono}}</dd>
                                              <dt>{{trans('validation.attributes.tipo')}}</dt><dd>{{ $patrocinadoresItem->tipo}}</dd>

                                              @if(isset($patrocinadoresItem->paquetes->descripcion))
                                                <dt>{{trans('validation.attributes.paquete')}}</dt><dd>{{ $patrocinadoresItem->paquetes->descripcion}}</dd>
                                              @else
                                                  <dt>{{trans('validation.attributes.paquete')}}</dt><dd>{{trans('validation.attributes.mensajePaquete')}}</dd>
                                              @endif

                                              <dt>{{trans('validation.attributes.notas')}}</dt><dd>{{ $patrocinadoresItem->notas}}</dd>
                                              <br><br>
                                              <div class="form-group" align="center">
                                                  <a href="{{ route('patrocinadoresExport/item/',$patrocinadoresItem->id) }}">  <button type="button"  class="btn btn-success">{{trans('validation.attributes.exportar')}}</button></a>
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