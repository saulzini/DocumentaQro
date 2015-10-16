@include('Partials.ScriptsGenerales.scriptsPartials')
<body>
<script type="text/javascript">

    $(document).ready(function() {
        $('#Pelicula').multiselect({
            enableFiltering: true,
            buttonWidth: '100%'
        });

        $('#Patrocinador').multiselect({
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
                <h3><a href="{{route('funciones')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR FUNCIONES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')


                            {!! Form::open(['action'=>['FuncionesController@agregarFunciones'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarFuncion'])!!}

                                <h4><i class="fa fa-angle-right"></i>Agregar función</h4>
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
                format:'DD/MM/YYYY HH:mm'

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
            defaultPreviewContent: '<img src="{{ asset('assets/img/default.png') }}" alt="Imagen de función" style="height:400px" class="img-thumbnail"/>',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg","png","bmp","jpeg"]
        });
        ////////////////////////////////////////
    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#formAgregarFuncion').bootstrapValidator({
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
