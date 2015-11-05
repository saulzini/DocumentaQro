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
                  <h3><a href="{{route('sedes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4 style="color:#F10687"><i class="fa fa-angle-right"></i> {{ trans('validation.attributes.modificarSede')  }}</h4>
                               @if( isset($sedesItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('sedesLista/item',$sedesItem->id) }}">
                                          <button class="btn btn-success btn-xs">
                                              <i class="fa fa-eye"></i></button>
                                      </a> &nbsp
                                   </td>

                                    <td>
                                      {!! Form::open(['action'=>['SedesController@eliminarSedes'],'role'=>'form'] )  !!}
                                      <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarSede')  }}")'><i class="fa fa-trash-o "></i></button>
                                      <input type="hidden" name="sedeID" value={{$sedesItem->id}}>
                                      {!! Form::close() !!}

                                    </td>
                                  </tr>
                             </table>
                              <br><br>

                              @endif

                              {!! Form::open(['action'=>['SedesController@modificarSedes'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formModificarSede'] )  !!}

                                  <div id="kv-avatar-errors" class="center-block" style="display:none"></div>

                                  @include('Partials.Sedes.Sedes')

                                  {!! Form::close() !!}


                          </div>
                      </div>
                      <!-- FIN CONSULTAR FUNCIONES -->
                  </div>
              </section>
          </section>
      </section>


      <script type="text/javascript">

          $(document).ready(function() {

              $('#formModificarSede').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {
                      Descripcion: {
                          validators: {
                              notEmpty: {
                                  message: '{{trans("validation.attributes.validatorSedeRequerido")}}'
                              },
                              stringLength: {
                                  max: 255,
                                  message: '{{trans("validation.attributes.validatorLongitudNombre")}}'
                              }
                          }
                      }
                  }
              });

          });
      </script>

@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
