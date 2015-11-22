@include('Partials.ScriptsGenerales.scriptsPartials')

  <body>
  <script type="text/javascript">

      $(document).ready(function() {
          $('#Pais').multiselect({
              enableCaseInsensitiveFiltering: true,
              maxHeight: '300',
              enableFiltering: true,
              buttonWidth: '100%'
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
      @include('Peliculas.PeliculasAside')



      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('peliculas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4  style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.modificarPelicula')  }}</h4>
                               @if( isset($peliculasItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('peliculasLista/item',$peliculasItem->id) }}">
                                          <button class="btn btn-success btn-xs">
                                              <i class="fa fa-eye"></i></button>
                                      </a> &nbsp
                                   </td>

                                    <td>
                                      {!! Form::open(['action'=>['PeliculasController@eliminarPeliculas'],'role'=>'form'] )  !!}
                                      <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarPelicula')  }}")'><i class="fa fa-trash-o "></i></button>
                                      <input type="hidden" name="peliculasID" value={{$peliculasItem->id}}>
                                      {!! Form::close() !!}

                                    </td>
                                  </tr>
                             </table>
                              <br><br>

                              @endif

                              {!! Form::open(['action'=>['PeliculasController@modificarPeliculas'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formModificarPelicula'] )  !!}

                                  <div id="kv-avatar-errors" class="center-block" style="display:none"></div>

                                  @include('Partials.Peliculas.Peliculas')

                                  {!! Form::close() !!}


                          </div>
                      </div>
                      <!-- FIN CONSULTAR FUNCIONES -->
                  </div>
              </section>
          </section>
      </section>



      <script type="text/javascript">
          $(function () {
              $('#fechaDP').datetimepicker({
                  format:'DD/MM/YYYY HH:mm',

              });

          });

          //previene lo del input
          $('#fechaDP').keypress(function(event) {event.preventDefault();});
          ///////////////AGREGAR///////////////////
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
              defaultPreviewContent: '<img src="{{ asset($peliculasItem->poster) }}"  style="height:400px" alt="Imagen de pelicula" class="img-thumbnail"/>',
              layoutTemplates: {main2: '{preview} {remove} {browse}'},
              allowedFileExtensions: ["jpeg","bmp","png","jpg"]
          });
          ////////////////////////////////////////
      </script>

      <script type="text/javascript">

          $(document).ready(function() {

              $('#formModificarPelicula').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {
                      Titulo: {
                          validators: {
                              notEmpty: {
                                  message: 'El título es requerido'
                              },
                              stringLength: {
                                  max: 255,
                                  message: 'El titúto debe tener como máximo 255 caracteres'
                              }
                          }
                      },

                      Director: {
                          validators: {
                              notEmpty: {
                                  message: 'El director es requerido'
                              },
                              stringLength: {
                                  max: 255,
                                  message: 'El nombre debe tener como máximo 255 caracteres'
                              }
                          }
                      },

                      Pais:{
                          validators: {
                              notEmpty: {
                                  message: 'Debe elegir un país'
                              }
                          }
                      },

                      Anio:{
                          validators: {
                              notEmpty: {
                                  message: 'El año es requerido'
                              },
                              stringLength: {
                                  max: 4,
                                  min: 4,
                                  message: 'El año debe tener 4 dígitos'
                              },

                              integer:{
                                  message: 'Ingresa un número'
                              }
                          }
                      },
                      Duracion:{
                          validators: {
                              notEmpty: {
                                  message: 'La duración es requerida'
                              },
                              stringLength: {
                                  max: 3,
                                  message: 'La duración puede tener como máximo 3 digitos'
                              },
                              integer:{
                                  message: 'Ingresa un número'
                              }
                          }
                      },

                      Subtitulos:{
                          validators: {
                              notEmpty: {
                                  message: 'Debe elegir una opción'
                              }
                          }
                      },
                      Trailer: {
                          validators: {
                              stringLength: {
                                  max: 255,
                                  message: 'La URL debe tener como máximo 255 caracteres'
                              },
                              uri:{
                                  message:'Ingrese URL válida, ejemplo: http://a.com'
                              }
                          }
                      },
                      Sinopsis: {
                          validators: {
                              stringLength: {
                                  max: 65535,
                                  message: 'La sinopsis debe tener como máximo 65535 caracteres'
                              }
                          }
                      },
                      Notas: {
                          validators: {
                              stringLength: {
                                  max: 65535,
                                  message: 'Las notas deben tener como máximo 65535 caracteres'
                              }
                          }
                      },
                      material:{
                          validators:{
                              file: {
                                  extension: 'zip',
                                  type: 'application/zip',
                                  message: 'Debes seleccionar un archivo .zip'
                              }
                          }
                      },
                      Tipo:{
                          validators: {
                              notEmpty: {
                                  message: 'Debe elegir una opción'
                              }
                          }
                      }


                  }
              });

              $('#fechaDP')
                      .on('dp.change dp.show', function(e) {
                          $('#formAgregarFuncion').data('bootstrapValidator').revalidateField('Fecha');
                      });

              /*   $('#formAgregarFuncion')
               .find('[name="Sede"]')
               .selectpicker()
               .change(function(e) {
               $('#formAgregarFuncion').bootstrapValidator('revalidateField', 'Sede');
               })
               .end()*/

          });
      </script>

@include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
