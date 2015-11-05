@include('Partials.ScriptsGenerales.scriptsPartials')

  <body>
    <script type="text/javascript">

    $(document).ready(function() {
        $('#Pelicula').multiselect({
            enableFiltering: true,
            buttonWidth: '100%',
        });

        $('#Patrocinador').multiselect({
            enableFiltering: true,
            buttonWidth: '100%',
        });


    });
   </script>

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
                  <h3><a href="{{route('realizadores')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{trans('validation.attributes.modificarRealizador')}}</h4>
                               @if( isset($realizadoresItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('realizadoresLista/item',$realizadoresItem->id) }}">
                                          <button class="btn btn-success btn-xs">
                                              <i class="fa fa-eye"></i></button>
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

                              {!! Form::open(['action'=>['RealizadoresController@modificarRealizadores'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formModificarRealizadores'] )  !!}

                                  <div id="kv-avatar-errors" class="center-block" style="display:none"></div>

                              @include('Partials.Realizadores.Realizadores')


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

              $('#formModificarRealizadores').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {
                      Nombre: {
                          validators: {
                              notEmpty: {
                                  message:'{{trans("validation.attributes.validatorRealizadorNombre")}}'
                              },
                              stringLength: {
                                  max: 255,
                                  message: '{{trans("validation.attributes.validatorLongitudNombre")}}'
                              }
                          }
                      },

                      Vinculo: {
                          validators: {

                              stringLength: {
                                  max: 255,
                                  message: '{{trans("validation.attributes.validatorLongitudVinculo")}}'
                              }
                          }
                      },

                      Email:{
                          validators: {
                              emailAddress: {
                                  message: '{{trans("validation.attributes.validatorEmail")}}'
                              }
                          }
                      },

                      Telefono:{
                          validators: {
                              numeric:{
                                  message: '{{trans("validation.attributes.validatorNumeroTelefono")}}'
                              }
                          }
                      }
                  }
              });


          });
      </script>


@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
