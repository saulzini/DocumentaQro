@include('Partials.ScriptsGenerales.scriptsPartials')

  <body>

    <script type="text/javascript">

    $(document).ready(function() {
        $('#Pelicula').multiselect({
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
                  <h3><a href="{{route('integrantes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                  <div class="row mt">

                      <!-- INICIO CONSULTAR FUNCIONES -->
                      <div class="col-lg-12">
                          <div class="form-panel">
                              @include('Partials.Mensajes.mensajes')
                              <h4><i class="fa fa-angle-right"></i>Modificar integrante</h4>
                               @if( isset($integrantesItem))


                            <table align="right">
                                <tr>
                                  <td>
                                      <a href="{{ route('integrantesLista/item',$integrantesItem->id) }}">
                                          <button class="btn btn-success btn-xs">
                                              <i class="fa fa-eye"></i></button>
                                      </a> &nbsp
                                   </td>

                                    <td>
                                      {!! Form::open(['action'=>['IntegrantesController@eliminarIntegrantes'],'role'=>'form'] )  !!}
                                      <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar el integrante")'><i class="fa fa-trash-o "></i></button>
                                      <input type="hidden" name="integrantesID" value={{$integrantesItem->id}}>
                                      {!! Form::close() !!}

                                    </td>
                                  </tr>
                             </table>
                              <br><br>

                              @endif

                              {!! Form::open(['action'=>['IntegrantesController@modificarIntegrantes'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formModificarIntegrante'] )  !!}

                                  <div id="kv-avatar-errors" class="center-block" style="display:none"></div>

                                  @include('Partials.Integrantes.Integrantes')

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

          ////////////////////////////////////////
      </script>

      <script type="text/javascript">

          $(document).ready(function() {

              $('#formModificarIntegrante').bootstrapValidator({
                  message: 'Los valores no son válidos',
                  feedbackIcons: {
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {
                      Nombre: {
                          validators: {
                              notEmpty: {
                                  message: 'El nombre es requerido'
                              },
                              stringLength: {
                                  max: 255,
                                  message: 'El nombre debe tener como máximo 255 caracteres'
                              }
                          }
                      },

                      Telefono:{
                          validators: {
                              integer:{
                                  message: 'Ingresa un número'
                              }
                          }
                      },

                      Puesto: {
                          validators: {
                              stringLength: {
                                  max: 255,
                                  message: 'El puesto debe tener como máximo 255 caracteres'
                              }
                          }
                      },

                      Email: {
                          validators: {
                              stringLength: {
                                  max: 255,
                                  message: 'El email debe tener como máximo 255 caracteres'
                              },

                              emailAddress:{
                                  message: 'Ingresa un correo'
                              }
                          }
                      },

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
