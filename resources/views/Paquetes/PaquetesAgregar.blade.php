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
    @include('Paquetes.PaquetesAside')
    <!--sidebar end-->


    <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><a href="{{route('paquetes')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR PAQUETES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')

                            {!! Form::open(['action'=>['PaquetesController@agregarPaquetes'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarPaquetes'])!!}

                             <h4  style="color:#F10687"><i class="fa fa-angle-right"></i>Agregar paquete</h4>
                               <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Paquetes.Paquetes')

                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- FIN CONSULTAR PAQUETES -->
                </div>
            </section>
        </section>
    </section>


    <script type="text/javascript">

        $(document).ready(function() {

            $('#formAgregarPaquetes').bootstrapValidator({
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
                     Costo: {
                            validators: {
                                numeric: {
                                    message: 'El costo debe ser numérico'
                                }
                            }
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#Caracteristica').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
            });
        });
    </script>
    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
