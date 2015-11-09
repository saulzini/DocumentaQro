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
      @include('Programas.ProgramasAside')


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('programas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda') }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">



                    <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.consultarPrograma') }}</h4>


                              @if( isset($ProgramasItem))


                                  <table align="right">
                                      <tr>
                                          <td>
                                              <a href="{{ route('programas/modificar/item',$ProgramasItem->id) }}">
                                                  <button class="btn btn-primary btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.modificar')  }}"><i class="fa fa-pencil"></i></button>
                                              </a> &nbsp
                                          </td>

                                          <td>
                                              {!! Form::open(['action'=>['ProgramasController@eliminarProgramas'],'role'=>'form'] )  !!}
                                              <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarPrograma')  }}")'><i class="fa fa-trash-o "></i></button>
                                              <input type="hidden" name="programaId" value={{$ProgramasItem->id}}>
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
                                                      <img src="{{asset($ProgramasItem->poster)}}" style="height:400px" class="img-thumbnail"/>
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                      <div class="col-md-7">
                                          <dl class="dl-horizontal">

                                              <dt>{{ trans('validation.attributes.Titulo') }}</dt><dd>{{ $ProgramasItem->titulo }}</dd>
                                              <dl>
                                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                      <div class="panel panel-default">
                                                          <div class="panel-heading" role="tab" id="headingOne">
                                                              <h4 class="panel-title">
                                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                      {{ trans('validation.attributes.Festivales') }} <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                              </h4>
                                                          </div>
                                                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                                              @if ( isset( $ProgramasFestivales))
                                                                  @foreach( $ProgramasFestivales as $Festivales)
                                                                      <li class="list-group-item">{{ $Festivales->titulo }}</li>

                                                                  @endforeach
                                                              @else
                                                              <li class="list-group-item"> {{ trans('validation.attributes.Nofestivales') }} </li>
                                                              @endif
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="panel panel-default">
                                                      <div class="panel-heading" role="tab" id="headingTwo">
                                                          <h4 class="panel-title">
                                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                  {{ trans('validation.attributes.Patrocinadores') }} <i class="fa fa-angle-down"></i>
                                                              </a>
                                                          </h4>
                                                      </div>
                                                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                          @if ( isset( $ProgramasPatrocinadores)  )

                                                          @foreach( $ProgramasPatrocinadores as $ProgramasPatrocinadores)

                                                          <li class="list-group-item">{{ $ProgramasPatrocinadores->nombre}}</li>

                                                          @endforeach
                                                          @else
                                                          <li class="list-group-item">{{ trans('validation.attributes.NoPatrocinadoresAsignados') }} </li>
                                                          @endif
                                                      </div>
                                                  </div>
                                               </dl>

                                              <div class="form-group" align="center">
                                                  <a href="{{ route('programasExport/item/',$ProgramasItem->id) }}">  <button type="button"  class="btn btn-success">{{ trans('validation.attributes.exportar') }}</button></a>
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