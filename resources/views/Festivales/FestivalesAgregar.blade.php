@include('Partials.ScriptsGenerales.scriptsPartials')
<body>
<script type="text/javascript">

    $(document).ready(function() {


        $('#Patrocinador').multiselect({
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
    <!--sidebar start-->
    @include('Festivales.FestivalesAside')
    <!--sidebar end-->

    <section id="container">

        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><a href="{{route('festivales')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR FUNCIONES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')


                            {!! Form::open(['action'=>['FestivalesController@agregarFestivales'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarFestival'])!!}

                                <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarFestival')  }}</h4><br>
                            <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Festivales.Festivales')

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
            maxFileSize: 50000,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="{{ asset('assets/img/default.png') }}" alt="Imagen de festival" style="height:400px" class="img-thumbnail"/>',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpeg","bmp","png","jpg"]
        });
        ////////////////////////////////////////
    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#formAgregarFestival').bootstrapValidator({
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
