
<div class="row">
    <div class="col-md-2">
        @if( isset($traficosItem))
        <input type="hidden" name="traficosID" value={{$traficosItem->id}}>
            @endif
    </div>

    <div class="col-md-7">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label"><strong>*</strong>Película</label>
            <div class="col-lg-10">
                <select class="form-control" id="Pelicula" name="Pelicula">
                    <option value="">Selecciona</option>
                        @if( isset($traficosItem))

                            @foreach($Peliculas as $Pelicula)
                                @if($traficosItem->titulo == $Pelicula->titulo)
                                    <option value="{{  $Pelicula->id  }}" selected > {{ $Pelicula -> titulo}}  </option>
                                @else
                                    <option value="{{  $Pelicula->id  }}" > {{ $Pelicula -> titulo}}  </option>
                                @endif
                            @endforeach
                        @else
                            @foreach($Peliculas as $Pelicula)
                                <option value="{{  $Pelicula -> id }}" > {{ $Pelicula -> titulo}}  </option>
                            @endforeach
                        @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Ubicación</label>
            <div class="col-lg-10">

                @if( isset($traficosItem))

                    {!!Form::text('Ubicacion' ,$traficosItem->ubicacion,['class'=>'form-control','id'=>'Ubicacion','placeholder'=>'Lugar de ubicación'])!!}
                @else
                    {!!Form::text('Ubicacion' ,null,['class'=>'form-control','id'=>'Ubicacion','placeholder'=>'Lugar de ubicación'])!!}
                @endif
            </div>
        </div>


        <div class="form-group">
            <label for="Status" class="col-lg-2 control-label"><strong>*</strong>Status</label>
            <div class="col-lg-10">
                <select  class="form-control" id="Status" name="Status">
                    <option value="">Selecciona</option>
                    @if( isset($traficosItem))

                        @foreach($Status as $statu)
                            @if($traficosItem->status == $statu)
                                <option value="{{ $statu }}" selected > {{ $statu}}  </option>
                            @else
                                <option value="{{ $statu }}" > {{ $statu}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Status as $statu)
                            <option value="{{  $statu }}" > {{ $statu }}  </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Formato" class="col-lg-2 control-label"><strong>*</strong>Formato material</label>
            <div class="col-lg-10">
                @if( isset($traficosItem))
                    {!!Form::text('Formato' ,$traficosItem->formato_material,['class'=>'form-control','id'=>'Formato','placeholder'=>'Formato del material'])!!}
                @else
                    {!!Form::text('Formato' ,null,['class'=>'form-control','id'=>'Formato','placeholder'=>'Formato el material'])!!}
                @endif
            </div>
        </div>


        <div class="form-group">
            <label for="Costo" class="col-lg-2 control-label"><strong>*</strong>Costo</label>
            <div class="col-lg-10">
                <div class="input-group">
                    <div class="input-group-addon">$</div>

                @if( isset($traficosItem))

                    {!!Form::text('Costo' ,$traficosItem->costo,['class'=>'form-control','id'=>'Costo','placeholder'=>'Costo del material'])!!}
                @else
                    {!!Form::text('Costo' ,null,['class'=>'form-control','id'=>'Costo','placeholder'=>'Costo del material'])!!}
                @endif
                    </div>
            </div>
        </div>

        <div class="form-group">
            <label for="Tipo" class="col-lg-2 control-label"><strong>*</strong>Tipo</label>
            <div class="col-lg-10">
                <select  class="form-control" id="Tipo" name="Tipo">
                    <option value="">Selecciona</option>
                    @if( isset($traficosItem))

                        @foreach($Tipos as $tipo)
                            @if($traficosItem->tipo == $tipo)
                                <option value="{{ $tipo }}" selected > {{ $tipo}}  </option>
                            @else
                                <option value="{{ $tipo}}" > {{ $tipo}}  </option>
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
            <label for="Status" class="col-lg-2 control-label">Integrante</label>
            <div class="col-lg-10">
                <select  class="form-control" id="Integrante" name="Integrante">
                    <option value="">Selecciona</option>
                    @if( isset($traficosItem))

                        @foreach($Integrantes as $integrante)
                            @if($traficosItem->integrantes->id == $integrante-> id)
                                <option value="{{ $integrante -> id }}" selected > {{ $integrante -> nombre}}  </option>
                            @else
                                <option value="{{ $integrante -> id }}" > {{ $integrante -> nombre}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Integrantes as $integrante)
                            <option value="{{  $integrante -> id }}" > {{ $integrante -> nombre}}  </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Status" class="col-lg-2 control-label">Realizador</label>
            <div class="col-lg-10">
                <select  class="form-control" id="Realizador" name="Realizador">
                    <option value="">Selecciona</option>
                    @if( isset($traficosItem))

                        @foreach($Realizadores as $realizador)
                            @if($traficosItem->realizadores->id == $realizador-> id)
                                <option value="{{ $realizador -> id }}" selected > {{ $realizador -> nombre}}  </option>
                            @else
                                <option value="{{ $realizador -> id }}" > {{ $realizador -> nombre}}  </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($Realizadores as $realizador)
                            <option value="{{  $realizador -> id }}" > {{ $realizador -> nombre}}  </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>




        <div class="form-group" align="center">
            @if( isset($traficosItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar el tráfico?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>




    </div>

