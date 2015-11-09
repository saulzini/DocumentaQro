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
                            <h4 style="color:#F10687"><i class="fa fa-angle-right"></i>{{ trans('validation.attributes.modificarPrograma')  }}</h4>

                            @if( isset($ProgramasItem))

                            <table align="right">
                                <tr>
                                    <td>
                                        <a href="{{ route('programasLista/item',$ProgramasItem->id) }}">
                                            <button class="btn btn-success btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.consultar')  }}">
                                                <i class="fa fa-eye"></i></button>
                                        </a> &nbsp
                                    </td>

                                    <td>
                                        {!! Form::open(['action'=>['ProgramasController@eliminarProgramas'],'role'=>'form'] )  !!}
                                        <button class="btn btn-danger btn-xs tooltips" data-placement="top" data-original-title="{{ trans('validation.attributes.eliminar')  }}" onclick='return confirm("{{ trans('validation.attributes.mensajeEliminarPrograma')  }}")'><i class="fa fa-trash-o "></i></button>
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
    @include('Partials.ScriptsGenerales.scriptsPartialsAbajo')
