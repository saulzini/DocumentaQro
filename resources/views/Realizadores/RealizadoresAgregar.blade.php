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


                            {!! Form::open(['action'=>['RealizadoresController@agregarRealizadores'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarRealizadores'])!!}

                                <h4><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarRealizador')  }}</h4>
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

            $('#formAgregarRealizadores').bootstrapValidator({
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

                    Vinculo: {
                        validators: {

                            stringLength: {
                                max: 255,
                                message: 'El vinculo debe tener como máximo 255 caracteres'
                            }
                        }
                    },

                    Email:{
                        validators: {
                            emailAddress: {
                                message: 'El email no es válido'
                            }
                        }
                    },

                    Telefono:{
                        validators: {
                            numeric:{
                                message: 'El télefono solo debe tener números'
                            }
                        }
                    }
                }
            });


        });
    </script>

    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
