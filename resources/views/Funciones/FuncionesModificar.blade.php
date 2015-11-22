@include('Partials.ScriptsGenerales.scriptsPartials')

  <body>

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
      @include('Funciones.FuncionesAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('funciones')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.modificarFuncion')  }}</h4>
                               @if( isset($funcionesItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('funcionesLista/item',$funcionesItem->id) }}">
                                          <button  class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}">
                                              <i class="fa fa-eye"></i></button>
                                      </a> &nbsp
                                   </td>

                                    <td>
                                      {!! Form::open(['action'=>['FuncionesController@eliminarFunciones'],'role'=>'form'] )  !!}
                                       <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarFuncion')  }}")'><i class="fa fa-trash-o "></i></button>
                                      <input type="hidden" name="funcionId" value={{$funcionesItem->id}}>
                                      {!! Form::close() !!}

                                    </td>
                                  </tr>
                             </table>
                              <br><br>

                              @endif

                              {!! Form::open(['action'=>['FuncionesController@modificarFunciones'],'class'=>'form-horizontal','role'=>'form','files'=>true, 'id' =>'formModificarFuncion'] )  !!}

                                  <div id="kv-avatar-errors" class="center-block" style="display:none"></div>

                                  @include('Partials.Funciones.Funciones')

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

              $('#formModificarFuncion').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {
                      Titulo: {
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFuncionTitulo")  }}'
                              },
                              stringLength: {
                                  max: 255,
                                  message: '{{trans("validation.attributes.validatorFuncionTituloLenght") }}'
                              }
                          }
                      },

                      Fecha:{
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFuncionFecha")  }}'
                              },
                              date: {
                                  format: 'DD/MM/YYYY HH:mm',
                                  message: '{{ trans("validation.attributes.validatorFuncionFechaDate")  }}'
                              }
                          }
                      },

                      Sede:{
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFuncionSede")  }}'
                              }
                          }
                      },

                      Asistencia:{
                          validators: {
                              stringLength: {
                                  max: 11,
                                  message: '{{ trans("validation.attributes.validatorFuncionAsistencia")  }}'
                              },
                              integer:{
                                  message: '{{ trans("validation.attributes.validatorFuncionAsistenciaInteger")  }}'
                              }
                          }
                      },

                      Status:{
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFuncionStatus")  }}'
                              }
                          }
                      },
                      Festival:{
                          validators: {
                              notEmpty: {
                                  message: '{{ trans("validation.attributes.validatorFuncionFestival")  }}'
                              }
                          }
                      }
                  }
              });

              $('#fechaDP')
                  .on('dp.change dp.show', function(e) {
                      $('#formAgregarFuncion').data('bootstrapValidator').revalidateField('Fecha');
                  });
          });
      </script>



      <script type="text/javascript">
          $(function () {
              $('#fechaDP').datetimepicker({
                  format:'DD/MM/YYYY HH:mm'

              });

          });

          $('#fechaDP').keypress(function(event) {event.preventDefault();});

          $("#imagenDocumentaQro").fileinput({
              overwriteInitial: true,
              maxFileSize: 50000,
              showClose: false,
              showCaption: false,
              browseLabel: '',
              removeLabel: '',
              browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
              removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
              removeTitle: 'Cancel or reset changes',
              elErrorContainer: '#kv-avatar-errors',
              msgErrorClass: 'alert alert-block alert-danger',
              defaultPreviewContent: '<img src="{{ asset('assets/img/default.png') }}" alt="{{ trans("validation.attributes.imagenFuncion")  }}" style="height:400px" class="img-thumbnail"/>',
              layoutTemplates: {main2: '{preview} {remove} {browse}'},
          allowedFileExtensions: ["jpg","png","bmp","jpeg"]
          });

      </script>

      @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
