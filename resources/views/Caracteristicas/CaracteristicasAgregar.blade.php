@include('Partials.ScriptsGenerales.scriptsPartials')
<body>
<script type="text/javascript">

    $(document).ready(function() {
        $('#Integrante').multiselect({
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
    @include('Caracteristicas.CaracteristicasAside')
    <!--sidebar end-->

    <section id="container">

        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><a href="{{route('caracteristicas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i>{{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR FUNCIONES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')


                            {!! Form::open(['action'=>['CaracteristicasController@agregarCaracteristicas'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarCaracteristica'])!!}

                                <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarCaracteristica')  }}</h4>
                            <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Caracteristicas.Caracteristicas')

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

        ////////////////////////////////////////
    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#formAgregarCaracteristica').bootstrapValidator({
                message: 'Los valores no son válidos',
                feedbackIcons: {
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {

                    Nombre: {
                        validators: {
                            notEmpty: {
                                message: 'La caracteristica es requerido'
                            },
                        }
                    },
                }
            });

            $('#fechaDP')
                    .on('dp.change dp.show', function(e) {
                        $('#formAgregarCaracteristica').data('bootstrapValidator').revalidateField('Fecha');
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
