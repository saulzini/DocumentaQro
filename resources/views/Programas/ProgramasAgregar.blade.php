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
    @include('Programas.ProgramasAside')

    <section id="container">
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><a href="{{route('programas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> {{ trans('validation.attributes.busqueda')  }}</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR PAQUETES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')

                            {!! Form::open(['action'=>['ProgramasController@agregarProgramas'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formAgregarProgramas'])!!}

                             <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.agregarPrograma')  }}</h4><br>
                               <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                                @include('Partials.Programas.Programas')

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

            $('#formAgregarProgramas').bootstrapValidator({
                message: 'Los valores no son válidos',
                feedbackIcons: {
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    Titulo: {
                        validators: {
                            notEmpty: {
                                message: '{{ trans("validation.attributes.validatorProgramaTitulo")  }}'
                            },
                            stringLength: {
                                max: 255,
                                message: '{{ trans("validation.attributes.validatorProgramaTituloLenght")  }}'
                            }
                        }
                    }
                }
            });
        });
    </script>


    <script type="text/javascript">

        $(document).ready(function() {
            $('#Festivales').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
            });

            $('#Patrocinadores').multiselect({
                enableCaseInsensitiveFiltering: true,
                maxHeight: '300',
                enableFiltering: true,
                buttonWidth: '100%'
            });
        });
    </script>


    <script type="text/javascript">
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
            defaultPreviewContent: '<img src="{{ asset('assets/img/default.png') }}" alt="{{ trans("validation.attributes.imagenPrograma")  }}" style="height:400px" class="img-thumbnail"/>',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg","png","bmp","jpeg"]
        });
    </script>

    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
