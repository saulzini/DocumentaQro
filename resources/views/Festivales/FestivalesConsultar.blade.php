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
      @include('Festivales.FestivalesAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('festivales')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{trans('validation.attributes.busqueda')}}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                                  <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{trans('validation.attributes.consultarFestival')}}</h4>




                              @if( isset($festivalItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('festivales/modificar/item',$festivalItem->id) }}">
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['FestivalesController@eliminarFestivales'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{trans('validation.attributes.mensajeEliminarFestival')}}")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="festivalId" value={{$festivalItem->id}}>
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
                                                  <img src="{{asset($festivalItem->poster)}}" style="height:400px" class="img-thumbnail"/>
                                              </div>
                                          </div>

                                      </div>
                                      <br>

                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">


                                              <dt>{{trans('validation.attributes.Título')}}</dt><dd>{{ $festivalItem->titulo }}</dd>
                                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingOne">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                  {{trans('validation.attributes.Funciones')}} <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                          @if ( isset( $funciones) )

                                                              @foreach( $funciones as $funcion)

                                                                  <li class="list-group-item"><strong>{{trans('validation.attributes.Título')}}:</strong>{{$funcion->titulo}}&nbsp;<strong>{{trans('validation.attributes.Fecha')}}:</strong>{{$funcion->fecha}}</li>

                                                              @endforeach
                                                          @else
                                                              <li class="list-group-item">{{trans('validation.attributes.NoFunciones')}}</li>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>


                                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingOne">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                  {{trans('validation.attributes.Programas')}} <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                          @if ( isset( $programas) )

                                                              @foreach( $programas as $programa)

                                                                  <li class="list-group-item">{{$programa->titulo}}</li>

                                                              @endforeach
                                                          @else
                                                              <li class="list-group-item">{{trans('validation.attributes.NoProgramas')}}</li>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingOne">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                  {{trans('validation.attributes.Patrocinadores')}} <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                          @if ( isset( $patrocinadores) )

                                                              @foreach( $patrocinadores as $patrocinador)

                                                                  <li class="list-group-item">{{$patrocinador->nombre}}</li>

                                                              @endforeach
                                                          @else
                                                              <li class="list-group-item">{{trans('validation.attributes.NoPatrocinadores')}}</li>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="form-group" align="center">
                                                  <a href="{{ route('festivalesExport/item/',$festivalItem->id) }}">  <button type="button"  class="btn btn-success">{{trans('validation.attributes.exportar')}}</button></a>
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