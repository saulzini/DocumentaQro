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
                <h3><a href="{{route('programas')}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Búsqueda</button></a></h3>
                <div class="row mt">

                    <!-- INICIO CONSULTAR PAQUETES -->
                    <div class="col-lg-12">
                        <div class="form-panel">

                            @include('Partials.Mensajes.mensajes')
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>Modificar programa</h4>

                            @if( isset($ProgramasItem))

                            <table align="right">
                                <tr>
                                    <td>
                                        <a href="{{ route('programasLista/item',$ProgramasItem->id) }}">
                                            <button class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"></i></button>
                                        </a> &nbsp
                                    </td>

                                    <td>
                                        {!! Form::open(['action'=>['ProgramasController@eliminarProgramas'],'role'=>'form'] )  !!}
                                        <button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("¿Seguro que desea eliminar la función?")'><i class="fa fa-trash-o "></i></button>
                                        <input type="hidden" name="programaId" value={{$ProgramasItem->id}}>
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            </table>
                            <br><br>

                            @endif

                            {!! Form::open(['action'=>['ProgramasController@modificarProgramas'],'class'=>'form-horizontal','role'=>'form','files'=>true,'id'=>'formModificarProgramas'])!!}

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
            defaultPreviewContent: '<img src="{{ asset($ProgramasItem->poster) }}" alt="Imagen de función" style="height:400px" class="img-thumbnail"/>',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg","png","bmp","jpeg"]
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('#formModificarProgramas').bootstrapValidator({
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
                                message: 'El título debe tener como máximo 255 caracteres'
                            }
                        }
                    }
                }
            });
        });
    </script>
    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
