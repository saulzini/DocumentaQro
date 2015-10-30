@include('Partials.ScriptsGenerales.scriptsPartials')

  <body>
<script type="text/javascript">

    $(document).ready(function() {
        $('#Pelicula').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
        });

        $('#Patrocinador').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
        });

        $('#Sede').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
        });

        $('#Programa').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
        });

        $('#Festival').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
        });

        $('#ProgramadoPor').change(function() {
           //Para obtener de que grupo es
            var selected = $(':selected', this);
           // alert(selected.parent().attr('label'));
            $('#Tipo').val(selected.parent().attr('label'));
         //   alert($('#Tipo').val());
         //   alert(selected.closest('optgroup').attr('label'));
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
      @include('Funciones.FuncionesAside')
      <!--sidebar end-->

      <section id="container">
          <section id="main-content">
              <section class="wrapper site-min-height">
                  <h3><a href="{{route('funciones')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Modificar función</h4>
                               @if( isset($funcionesItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('funcionesLista/item',$funcionesItem->id) }}">
                                          <button class="btn btn-success btn-xs">
                                              <i class="fa fa-eye"></i></button>
                                      </a> &nbsp
                                   </td>

                                    <td>
                                      {!! Form::open(['action'=>['FuncionesController@eliminarFunciones'],'role'=>'form'] )  !!}
                                      <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la función?")'><i class="fa fa-trash-o "></i></button>
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
              defaultPreviewContent: '<img src="{{ asset($funcionesItem->poster) }}"  style="height:400px" alt="Imagen de función" class="img-thumbnail"/>',
              layoutTemplates: {main2: '{preview} {remove} {browse}'},
              allowedFileExtensions: ["jpg", "png", "gif"]
          });
          ////////////////////////////////////////
      </script>

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
                                  message: 'El título es requerido'
                              },
                              stringLength: {
                                  max: 255,
                                  message: 'El titúto debe tener como máximo 255 caracteres'
                              }
                          }
                      },

                      Fecha:{
                          validators: {
                              notEmpty: {
                                  message: 'La fecha es requerida'
                              },
                              date: {
                                  format: 'DD/MM/YYYY HH:mm',
                                  message: 'El formato debe ser DD/MM/YYYY HH:mm'
                              }
                          }
                      },

                      Sede:{
                          validators: {
                              notEmpty: {
                                  message: 'La sede es requerida'
                              }
                          }
                      },

                      Asistencia:{
                          validators: {
                              stringLength: {
                                  max: 11,
                                  message: 'La asistencia debe de tener como máximo 11 dígitos'
                              },
                              integer:{
                                  message: 'Ingresa un número'
                              }
                          }
                      },

                      Status:{
                          validators: {
                              notEmpty: {
                                  message: 'El status es requerido'
                              }
                          }
                      },
                      Festival:{
                          validators: {
                              notEmpty: {
                                  message: 'Seleccione un festival'
                              }
                          }
                      },
                      Programado:{
                          validators: {

                          }
                      }


                  }
              });

              $('#fechaDP')
                  .on('dp.change dp.show', function(e) {
                      $('#formModificarFuncion').data('bootstrapValidator').revalidateField('Fecha');
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
