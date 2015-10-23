
<div class="row">
    <div class="col-md-5">

        <div class="form-group">
            <div class="col-lg-12">
                @if( isset($peliculasItem))
                    <input type="hidden" name="peliculaId" value={{$peliculasItem->id}}>
                {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @else
                    {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label"><strong>*</strong>Titulo</label>
            <div class="col-lg-10">

                @if( isset($peliculasItem))

                 {!!Form::text('Titulo' ,$peliculasItem->titulo,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Titulo de la pelicula'])!!}
                @else
                    {!!Form::text('Titulo' ,null,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Título de la pelicula'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label"><strong>*</strong>Director</label>
            <div class="col-lg-10">

                @if( isset($peliculasItem))

                    {!!Form::text('Director' ,$peliculasItem->director,['class'=>'form-control','id'=>'Director','placeholder'=>'Nombre del director'])!!}
                @else
                    {!!Form::text('Director' ,null,['class'=>'form-control','id'=>'Director','placeholder'=>'Nombre del director'])!!}
                @endif
            </div>
        </div>



        <div class="form-group">
            <label for="SedeS" class="col-lg-2 control-label"><strong>*</strong>País</label>
            <div class="col-lg-10">

                <select  class="form-control" id="Pais" name="Pais">
                    <option value="">Selecciona</option>

                    @if( isset($peliculasItem))

                        @foreach($Paises as $Pais)
                            @if($peliculasItem->pais == $Pais)
                            <option value="{{  $Pais  }}" selected > {{ $Pais}}  </option>
                            @else
                            <option value="{{  $Pais  }}" > {{ $Pais}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Paises as $Pais)
                            <option value="{{  $Pais }}" > {{ $Pais}}  </option>
                        @endforeach
                    @endif
                    </select>
            </div>
        </div>




        <div class="form-group">
            <label for="AsistenciasS" class="col-lg-2 control-label"><strong>*</strong>Año</label>
            <div class="col-lg-10">
                @if( isset($peliculasItem))
                {!!Form::text('Anio' ,$peliculasItem->anio,['class'=>'form-control','id'=>'Anio','placeholder'=>'Año de la pelicula'])!!}
                @else
                    {!!Form::text('Anio' ,null,['class'=>'form-control','id'=>'Anio','placeholder'=>'Año de la pelicula'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="AsistenciasS" class="col-lg-2 control-label"><strong>*</strong>Duración</label>
            <div class="col-lg-10">
                @if( isset($peliculasItem))
                    {!!Form::text('Duracion' ,$peliculasItem->duracion,['class'=>'form-control','id'=>'Duracion','placeholder'=>'Duración en minutos'])!!}
                @else
                    {!!Form::text('Duracion' ,null,['class'=>'form-control','id'=>'Duracion','placeholder'=>'Duración en minutos'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Subtitulos" class="col-lg-2 control-label"><strong>*</strong>Subtitulos</label>
            <div class="col-lg-10">

                <select  class="form-control" id="subtitulos" name="Subtitulos">
                    <option value="">Selecciona</option>

                    @if( isset($peliculasItem))

                        @foreach($Subtitulos as $subtitulo)
                            @if($peliculasItem->subtitulos == $subtitulo)
                                <option value="{{  $subtitulo }}" selected > {{ $subtitulo}}  </option>
                            @else
                                <option value="{{  $subtitulo  }}" > {{ $subtitulo}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Subtitulos as $subtitulo)
                            <option value="{{  $subtitulo }}" > {{ $subtitulo}}  </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Subtitulos" class="col-lg-2 control-label"><strong>*</strong>Tipo</label>
            <div class="col-lg-10">

                <select  class="form-control" id="Tipo" name="Tipo">
                    <option value="">Selecciona</option>

                    @if( isset($peliculasItem))

                        @foreach($Tipos as $tipo)
                            @if($peliculasItem->tipo == $tipo)
                                <option value="{{  $tipo }}" selected > {{ $tipo}}  </option>
                            @else
                                <option value="{{  $tipo  }}" > {{ $tipo}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Tipos as $tipo)
                            <option value="{{  $tipo }}" > {{ $tipo}}  </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Trailer</label>
            <div class="col-lg-10">

                @if( isset($peliculasItem))

                    {!!Form::text('Trailer' ,$peliculasItem->trailer,['class'=>'form-control','id'=>'Trailer','placeholder'=>'URL del trailer'])!!}
                @else
                    {!!Form::text('Trailer' ,null,['class'=>'form-control','id'=>'Trailer','placeholder'=>'URL del trailer'])!!}
                @endif
            </div>
        </div>
        @if( isset($peliculasItem)&&$peliculasItem->material!="")
            <div class="form-group">
                <label for="Titulo" class="col-lg-2 control-label">Material actual</label>
                <div class="col-lg-10">
                    <br>

                        <a height="20px" href="{{asset($peliculasItem->material)}}"><strong>Click aquí para descargar</strong></a>

                </div>
            </div>

        @endif

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">  @if( isset($peliculasItem)&&$peliculasItem->material!="")Remplazar @endif Material</label>
            <div class="col-lg-10">

                    {!!  Form::file('material',['id'=>'material','align'=>'center','type'=>'file'] )  !!}
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Sinopsis</label>
            <div class="col-lg-10">

                @if( isset($peliculasItem))

                    {!!Form::textArea('Sinopsis' ,$peliculasItem->sinopsis,['class'=>'form-control','id'=>'Trailer','placeholder'=>'Ingrese sinopsis'])!!}
                @else
                    {!!Form::textArea('Sinopsis' ,null,['class'=>'form-control','id'=>'Trailer','placeholder'=>'Ingrese sinopsis'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Notas</label>
            <div class="col-lg-10">

                @if( isset($peliculasItem))

                    {!!Form::textArea('Notas' ,$peliculasItem->notas,['class'=>'form-control','id'=>'Notas','placeholder'=>'Aquí puede añadir sus notas'])!!}
                @else
                    {!!Form::textArea('Notas' ,null,['class'=>'form-control','id'=>'Notas','placeholder'=>'Aquí puede añadir sus notas'])!!}
                @endif
            </div>
        </div>



        <div class="form-group" align="center">
            @if( isset($peliculasItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar la pelicula?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>




    </div>

