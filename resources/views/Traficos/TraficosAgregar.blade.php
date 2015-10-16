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
                <h3><a href="{{route('peliculas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Gestión de películas</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR FUNCIONES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')


                            {!! Form::open(['action'=>['TraficosController@agregarTraficos'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarTrafico'])!!}

                                <h4><i class="fa fa-angle-right"></i>Agregar trafico</h4>
                            <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Traficos.Traficos')

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
            defaultPreviewContent: '<img src="{{ asset('assets/img/default.png') }}" alt="Imagen de pelicula" style="height:400px" class="img-thumbnail"/>',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg","png","bmp","jpeg"]
        });
        ////////////////////////////////////////
    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#formAgregarTrafico').bootstrapValidator({
                message: 'Los valores no son válidos',
                feedbackIcons: {
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    Pelicula: {
                        validators: {
                            notEmpty: {
                                message: 'Selecciona una pelicula'
                            }
                        }
                    },

                    Formato: {
                        validators: {
                            notEmpty: {
                                message: 'El formato es requerido'
                            },
                            stringLength: {
                                max: 255,
                                message: 'El formato debe tener como máximo 255 caracteres'
                            }
                        }
                    },

                    Status:{
                        validators: {
                            notEmpty: {
                                message: 'Selecciona un status'
                            }
                        }
                    },

                    Costo:{
                        validators: {
                            notEmpty: {
                                message: 'El costo es requerido'
                            },
                            stringLength: {
                                max: 255,
                                message: 'El costo debe tener como máximo 255 caracteres'
                            },

                            integer:{
                                message: 'Ingresa un número'
                            }
                        }
                    },

                    Tipo:{
                        validators: {
                            notEmpty: {
                                message: 'Selecciona un tipo'
                            }
                        }
                    },

                    Integrante:{
                        validators: {
                            notEmpty: {
                                message: 'Selecciona un integrante'
                            }
                        }
                    },

                    Realizador:{
                        validators: {
                            notEmpty: {
                                message: 'Selecciona un realizador'
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
