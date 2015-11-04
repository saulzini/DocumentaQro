@include('Partials.ScriptsGenerales.scriptsPartials')
<body>
<script type="text/javascript">

    $(document).ready(function() {


        $('#Paquete').multiselect({
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
    @include('Patrocinadores.PatrocinadoresAside')


    <section id="container">

        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><a href="{{route('patrocinadores')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR FUNCIONES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')


                            {!! Form::open(['action'=>['PatrocinadoresController@agregarPatrocinadores'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarPatrocinadores'])!!}

                                <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarPatrocinador')  }}</h4>
                            <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Patrocinadores.Patrocinadores')

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

            $('#formAgregarPatrocinadores').bootstrapValidator({
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

                    Puesto: {
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
                            },
                            stringLength: {
                                max: 255,
                                message: 'El vinculo debe tener como máximo 255 caracteres'
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
