
<div class="row">
    <div class="col-md-5">

        <div class="form-group">
            <div class="col-lg-12">
                @if( isset($funcionesItem))
                    <input type="hidden" name="funcionId" value={{$funcionesItem->id}}>
                {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @else
                    {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Titulo</label>
            <div class="col-lg-10">

                @if( isset($funcionesItem))

                 {!!Form::text('Titulo' ,$funcionesItem->titulo,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Titulo de la pelicula'])!!}
                @else
                    {!!Form::text('Titulo' ,null,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Título de la función'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Fecha</label>
            <div class="col-lg-10">
                <div class="input-group date" id="fechaDP">
                                                 <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                  </span>
                    @if( isset($funcionesItem))
                    {!!Form::text('Fecha' ,$funcionesItem->fecha,['class'=>'form-control','placeholder'=>'dd/mm/yyyy'])!!}
                    @else
                        {!!Form::text('Fecha' ,null,['class'=>'form-control','placeholder'=>'dd/mm/yyyy'])!!}
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="SedeS" class="col-lg-2 control-label">Sede</label>
            <div class="col-lg-10">

                <select  class="form-control" id="Sede" name="Sede">
                    <option value="">Selecciona</option>

                    @if( isset($funcionesItem)&&($funcionesItem->id_sede!=0))

                        @foreach($Sedes as $sede)
                            @if($funcionesItem->sedes->id == $sede->id)
                            <option value="{{  $sede->id  }}" selected > {{ $sede->descripcion}}  </option>
                            @else
                            <option value="{{  $sede->id  }}" > {{ $sede->descripcion}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Sedes as $sede)
                            <option value="{{  $sede->id  }}" > {{ $sede->descripcion}}  </option>
                        @endforeach
                    @endif
                    </select>
            </div>
        </div>


        <div class="form-group">
            <label for="AsistenciasS" class="col-lg-2 control-label">Asistencia</label>
            <div class="col-lg-10">
                @if( isset($funcionesItem))
                {!!Form::text('Asistencia' ,$funcionesItem->asistencia,['class'=>'form-control','id'=>'AsistenciasS','placeholder'=>'Número de personas que asistieron'])!!}
                @else
                    {!!Form::text('Asistencia' ,null,['class'=>'form-control','id'=>'AsistenciasS','placeholder'=>'Numero de personas que asistieron'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="StatusS" class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">

                <select  class="form-control" id="StatusS" name="Status">
                    <option value="">Selecciona</option>

                    @if( isset($funcionesItem))

                        @foreach($status as $statu)
                            @if($funcionesItem->status== $statu)
                                <option value="{{  $statu  }}" selected> {{ $statu}}  </option>
                                @else
                                <option value="{{  $statu  }}" > {{ $statu}}  </option>
                            @endif
                        @endforeach

                    @else
                        @foreach($status as $statu)
                        <option value="{{  $statu  }}" > {{ $statu}}  </option>
                        @endforeach

                     @endif
                    </select>


            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Peliculas</label>
            <div class="col-lg-10">
                <select class="form-control" id="Pelicula" name="Pelicula[]" multiple="multiple">
                    @if(isset($funcionesPeliculas) && !$funcionesPeliculas->isEmpty())

                        @foreach($Peliculas as $Pelicula)
                            @foreach($funcionesPeliculas as $funcionPelicula)
                                @if ($funcionPelicula->id== $Pelicula->id  )
                                    <option value="{{  $Pelicula->id }}" selected> {{ $Pelicula->titulo}} {{ $Pelicula->anio }}  </option>
                                    @break;
                                @elseif ($funcionPelicula == $ultimaPeli)
                                    <option value="{{  $Pelicula->id }}" > {{ $Pelicula->titulo}} {{ $Pelicula->anio }}  </option>
                                @endif
                            @endforeach
                        @endforeach

                    @else
                            @foreach($Peliculas as $Pelicula)
                            <option value="{{  $Pelicula->id }}" > {{ $Pelicula->titulo}} {{ $Pelicula->anio }}  </option>
                            @endforeach
                    @endif

                    </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Programas</label>
            <div class="col-lg-10">


                <select class="form-control" id="Programa" name="Programa">
                    <option value="">Selecciona</option>
                    @if( isset($funcionesProgramas))
                        @foreach($Programas as $Programa)
                            @if($funcionesProgramas->id== $Programa->id )
                            <option value="{{  $Programa->id }}" selected> {{ $Programa->titulo}}</option>
                            @else
                            <option value="{{  $Programa->id }}" > {{ $Programa->titulo}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Programas as $Programa)
                            <option value="{{  $Programa->id }}" > {{ $Programa->titulo}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2 control-label">Festival</label>
            <div class="col-lg-10">
                <select class="form-control" id="Festival" name="Festival">
                    <option value="">Selecciona</option>
                    @if( isset($funcionesFestivales))
                        @foreach($Festivales as $Festival)
                            @if($funcionesFestivales->id== $Festival->id )
                            <option value="{{  $Festival->id }}" selected > {{ $Festival->titulo}}</option>
                            @else
                            <option value="{{  $Festival->id }}" > {{ $Festival->titulo}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Festivales as $Festival)
                            <option value="{{  $Festival->id }}" > {{ $Festival->titulo}}</option>
                        @endforeach
                    @endif



                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Patrocinadores</label>
            <div class="col-lg-10">
                <select class="form-control" id="Patrocinador" name="Patrocinadores[]" multiple="multiple">
                    @if(isset($funcionesPatrocinadores) && !$funcionesPatrocinadores->isEmpty())

                        @foreach($Patrocinadores  as $Patrocinador)
                            @foreach($funcionesPatrocinadores as $funcionPatrocinadores )
                                @if($funcionPatrocinadores->id== $Patrocinador->id )
                                    <option value="{{  $Patrocinador->id }}" selected> {{ $Patrocinador->nombre}}</option>
                                    @break;
                                @elseif ( $funcionPatrocinadores == $ultimoPatrocinador )
                                    <option value="{{  $Patrocinador->id }}" > {{ $Patrocinador->nombre}} </option>
                                @endif
                            @endforeach
                        @endforeach

                        @else
                            @foreach($Patrocinadores as $Patrocinador)
                                <option value="{{  $Patrocinador->id }}" > {{ $Patrocinador->nombre}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2 control-label">Programado por</label>
            <div class="col-lg-10">
                @if (isset($funcionesItem))
                 {!!Form::text('Programado' ,$funcionesItem->programadopor,['class'=>'form-control','placeholder'=>'Programado por'])!!}
                @else
                    {!!Form::text('Programado' ,null,['class'=>'form-control','placeholder'=>'Programado por'])!!}
                @endif

            </div>
        </div>

        <div class="form-group" align="center">
            @if( isset($funcionesItem))

            {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar la función?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>

    </div>

</div>