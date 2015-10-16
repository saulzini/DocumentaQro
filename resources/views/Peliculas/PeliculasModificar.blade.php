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
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-film"></i>
                          <span>Películas</span>
                      </a>
                      <ul class="sub">

                          <li><a href="#" >
                                  <i class="fa fa-film"></i>
                                  <span>Película</span>
                              </a></li>

                          <li><a href="#" >
                                  <i class="fa fa-hand-o-up fa-lg"></i>
                                  <span>Realizadores</span>
                              </a></li>

                          <li><a href="#" >
                                  <i class="fa fa-envelope"></i>
                                  <span>Tráfico</span>
                              </a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-video-camera"></i>
                          <span>Función</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-tasks"></i>
                          <span>Programa</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-ticket"></i>
                          <span>Festival</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-users"></i>
                          <span>Integrantes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-thumbs-o-up"></i>
                          <span>Patrocinios</span>
                      </a>

                      <ul class="sub">
                          <li><a href="#" >
                                  <i class="fa fa-cubes"></i>
                                  <span>Paquetes</span>
                              </a></li>

                          <li><a href="javascript:;" >
                                  <i class="fa fa-thumbs-o-up"></i>
                                  <span>Patrocinadores</span>
                              </a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reportes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-cog"></i>
                          <span>Configuración</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->


      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('peliculas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Gestión de películas</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4><i class="fa fa-angle-right"></i>Modificar pelicula</h4>
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
                                      <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la pelicula?")'><i class="fa fa-trash-o "></i></button>
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
              maxFileSize: 1500,
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
              allowedFileExtensions: ["jpg", "png", "gif"]
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
