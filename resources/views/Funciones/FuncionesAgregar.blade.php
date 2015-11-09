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

                            {!! Form::open(['action'=>['FuncionesController@agregarFunciones'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarFuncion'])!!}

                                <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarFuncion')  }}</h4><br>
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

    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
